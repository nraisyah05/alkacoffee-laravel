@extends('layouts.admin.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div>
        <h2 class="h4">Kasir Pembayaran</h2>
        <p>Klik produk untuk menambahkan ke keranjang</p>
    </div>
</div>

<div class="row">

    {{-- PRODUK --}}
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-body">

                <h5 class="mb-3">🍛 Makanan</h5>
                <div class="row">
                    @foreach ($makanan as $item)
                        <div class="col-md-3 mb-3"> {{-- 4 per baris --}}
                            <div class="card text-center h-100">
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     style="height:80px; object-fit:cover">
                                <div class="card-body p-2">
                                    <h6 style="font-size:13px">{{ $item->nama_produk }}</h6>
                                    <p class="text-success" style="font-size:12px">
                                        Rp {{ number_format($item->harga) }}
                                    </p>
                                    <button class="btn btn-primary btn-sm w-100 tambahProduk"
                                        data-id="{{ $item->produk_id }}"
                                        data-nama="{{ $item->nama_produk }}"
                                        data-harga="{{ $item->harga }}">
                                        + Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr>

                <h5 class="mb-3">🧋 Minuman</h5>
                <div class="row">
                    @foreach ($minuman as $item)
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100">
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     style="height:80px; object-fit:cover">
                                <div class="card-body p-2">
                                    <h6 style="font-size:13px">{{ $item->nama_produk }}</h6>
                                    <p class="text-success" style="font-size:12px">
                                        Rp {{ number_format($item->harga) }}
                                    </p>
                                    <button class="btn btn-primary btn-sm w-100 tambahProduk"
                                        data-id="{{ $item->produk_id }}"
                                        data-nama="{{ $item->nama_produk }}"
                                        data-harga="{{ $item->harga }}">
                                        + Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr>

                <h5 class="mb-3">➕ Additional</h5>
                <div class="row">
                    @foreach ($other as $item)
                        <div class="col-md-3 mb-3">
                            <div class="card text-center h-100">
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                     style="height:80px; object-fit:cover">
                                <div class="card-body p-2">
                                    <h6 style="font-size:13px">{{ $item->nama_produk }}</h6>
                                    <p class="text-success" style="font-size:12px">
                                        Rp {{ number_format($item->harga) }}
                                    </p>
                                    <button class="btn btn-primary btn-sm w-100 tambahProduk"
                                        data-id="{{ $item->produk_id }}"
                                        data-nama="{{ $item->nama_produk }}"
                                        data-harga="{{ $item->harga }}">
                                        + Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    {{-- KERANJANG --}}
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header">
                <h5>Keranjang</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cartBody">
                        <tr id="emptyCart">
                            <td colspan="4" class="text-center text-muted">Keranjang kosong</td>
                        </tr>
                    </tbody>
                </table>

                <hr>
                <h5>Total : Rp <span id="cartTotal">0</span></h5>

                <button id="simpanTransaksi" class="btn btn-success w-100 mt-2">
                    Simpan Transaksi
                </button>
            </div>
        </div>
    </div>

</div>
@endsection


{{-- ================= SCRIPT ================= --}}
@section('script')
<script>
// Cek jQuery tersedia
console.log('jQuery version:', typeof $ !== 'undefined' ? $.fn.jquery : 'TIDAK ADA jQuery!')

let cart = {}

$(document).ready(function() {
    console.log('Document ready ✓')

    // Test apakah tombol terdeteksi
    console.log('Jumlah tombol tambahProduk:', $('.tambahProduk').length)
})

$(document).on('click', '.tambahProduk', function() {
    let id = $(this).data('id')
    console.log('Tombol diklik, id:', id)

    $.ajax({
        url: "{{ route('pembayaran.tambah') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"   // ← pakai headers, bukan data
        },
        data: {
            produk_id: id,
        },
        success: function(res) {
            console.log('Response:', res)
            if (res.success) {
                cart = res.cart
                renderCart()
            } else {
                alert(res.message)
            }
        },
        error: function(xhr) {
            console.error('Status:', xhr.status)
            console.error('Response:', xhr.responseText)
            alert('Error ' + xhr.status + ' - cek console!')
        }
    })
})

$(document).on('click', '.hapusProduk', function() {
    let id = $(this).data('id')

    $.ajax({
        url: "{{ route('pembayaran.hapus') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        data: { produk_id: id },
        success: function(res) {
            if (res.success) {
                cart = res.cart
                renderCart()
            }
        },
        error: function(xhr) {
            console.error('Hapus error:', xhr.status, xhr.responseText)
        }
    })
})

$('#simpanTransaksi').on('click', function() {
    if (Object.keys(cart).length === 0) {
        alert('Keranjang masih kosong!')
        return
    }

    if (!confirm('Simpan transaksi ini?')) return

    $.ajax({
        url: "{{ route('pembayaran.simpan') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        data: { cart: cart },
        success: function(res) {
            if (res.success) {
                cart = {}
                renderCart()
                window.location.href = "{{ url('pembayaran/struk') }}/" + res.penjualan_id
            } else {
                alert('Gagal: ' + res.message)
            }
        },
        error: function(xhr) {
            console.error('Simpan error:', xhr.status, xhr.responseText)
            alert('Error ' + xhr.status)
        }
    })
})

function renderCart() {
    let html  = ''
    let total = 0

    for (let id in cart) {
        let item     = cart[id]
        let subtotal = item.harga * item.qty
        total += subtotal

        html += `
        <tr>
            <td style="font-size:13px">${item.nama}</td>
            <td>${item.qty}</td>
            <td style="font-size:13px">Rp ${subtotal.toLocaleString('id-ID')}</td>
            <td>
                <button class="btn btn-danger btn-sm hapusProduk" data-id="${id}">✕</button>
            </td>
        </tr>`
    }

    if (html === '') {
        html = '<tr><td colspan="4" class="text-center text-muted">Keranjang kosong</td></tr>'
    }

    $('#cartBody').html(html)
    $('#cartTotal').text(total.toLocaleString('id-ID'))
}
</script>
@endsection
