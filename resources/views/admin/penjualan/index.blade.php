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

                    <div class="row">

                        @foreach ($produk as $item)
                            <div class="col-md-3 mb-3">

                                <div class="card text-center">

                                    <img src="{{ asset('storage/' . $item->gambar) }}"
                                        style="height:120px; object-fit:cover">

                                    <div class="card-body">

                                        <h6>{{ $item->nama_produk }}</h6>

                                        <p class="text-success">
                                            Rp {{ number_format($item->harga) }}
                                        </p>

                                        <button class="btn btn-primary btn-sm tambahProduk"
                                            data-id="{{ $item->produk_id }}">
                                            Tambah
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

                    <table class="table">

                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody id="cartBody"></tbody>

                    </table>

                    <hr>

                    <h5>Total : Rp <span id="cartTotal">0</span></h5>

                    <button id="simpanTransaksi" class="btn btn-success w-100">
                        Simpan Transaksi
                    </button>

                </div>

            </div>

        </div>

    </div>
@endsection



@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let cart = {}
        $(document).ready(function() {

            cart = {}

            loadCart()

        })

        // tambah produk
        $(document).on('click', '.tambahProduk', function() {
            let id = $(this).data('id')
            $.ajax({

                url: "{{ route('pembayaran.tambah') }}",
                type: "POST",

                data: {
                    produk_id: id,
                    _token: "{{ csrf_token() }}"
                },

                success: function(res) {

                    cart = res.cart

                    loadCart()

                }

            })

        })



        // hapus produk
        $(document).on('click', '.hapusProduk', function() {

            let id = $(this).data('id')

            delete cart[id]

            loadCart()

        })



        // render cart
        function loadCart() {

            let html = ""
            let total = 0

            for (let id in cart) {

                let item = cart[id]

                let subtotal = item.harga * item.qty

                total += subtotal

                html += `

<tr>

<td>${item.nama}</td>
<td>${item.qty}</td>
<td>Rp ${subtotal.toLocaleString()}</td>

<td>
<button class="btn btn-danger btn-sm hapusProduk"
data-id="${id}">
X
</button>
</td>

</tr>

`

            }

            $('#cartBody').html(html)

            $('#cartTotal').text(total.toLocaleString())

        }



        // simpan transaksi
        $(document).on('click', '#simpanTransaksi', function() {

            if (Object.keys(cart).length === 0) {
                alert("Keranjang kosong!")
                return
            }

            $.ajax({
                url: "{{ route('pembayaran.simpan') }}",
                type: "POST",
                data: {
                    cart: cart,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    if (res.success) {
                        alert("Transaksi berhasil")
                        cart = {}
                        loadCart()

                        // Buka halaman struk
                        window.open("/pembayaran/struk/pdf/" + res.penjualan_id, "_blank");
                    } else {
                        alert("Error: " + res.message)
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr)
                    alert("AJAX Error: " + error)
                }
            })

        })
    </script>
@endsection
