@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Struk Pembayaran</h2>
    <p>ID Transaksi: {{ $penjualan->penjualan_id }}</p>
    <p>Total: Rp {{ number_format($penjualan->total_harga) }}</p>
    <p>Metode: {{ $penjualan->metode_pembayaran }}</p>

    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan->detail as $item)
            <tr>
                <td>{{ $item->produk->nama_produk }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp {{ number_format($item->harga) }}</td>
                <td>Rp {{ number_format($item->subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button onclick="window.print()" class="btn btn-primary">Cetak Resi</button>
</div>
@endsection
