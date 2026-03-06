<div style="max-width: 500px; margin: 20px auto; font-family: 'Arial', sans-serif; border:1px solid #ddd; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

    {{-- Header --}}
    <div style="text-align:center; margin-bottom:20px;">
        <h2 style="margin:0; color:#4CAF50;">Nusacode Store</h2>
        <small>Jl. Contoh No.123, Kota, Indonesia</small>
        <p style="margin:5px 0 0 0; font-size:14px;">Tanggal: {{ date('d-m-Y H:i') }}</p>
        <p style="margin:0; font-size:14px;">ID Transaksi: {{ $penjualan->penjualan_id }}</p>
    </div>

    {{-- Table --}}
    <table style="width:100%; border-collapse: collapse; margin-top:10px;">
        <thead>
            <tr style="background:#f5f5f5; border-bottom:2px solid #ddd;">
                <th style="text-align:left; padding:8px;">Produk</th>
                <th style="text-align:center; padding:8px;">Qty</th>
                <th style="text-align:right; padding:8px;">Harga</th>
                <th style="text-align:right; padding:8px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan->detail as $item)
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:8px;">{{ $item->produk->nama_produk }}</td>
                <td style="text-align:center; padding:8px;">{{ $item->qty }}</td>
                <td style="text-align:right; padding:8px;">Rp {{ number_format($item->harga) }}</td>
                <td style="text-align:right; padding:8px;">Rp {{ number_format($item->subtotal) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Total --}}
    <div style="margin-top:15px; display:flex; justify-content:space-between; font-size:16px; font-weight:bold;">
        <span>Total:</span>
        <span>Rp {{ number_format($penjualan->total_harga) }}</span>
    </div>

    {{-- Metode Pembayaran --}}
    <div style="margin-top:5px; display:flex; justify-content:space-between; font-size:14px;">
        <span>Metode Pembayaran:</span>
        <span>{{ $penjualan->metode_pembayaran }}</span>
    </div>

    {{-- Footer --}}
    <div style="text-align:center; margin-top:20px; font-size:12px; color:#888;">
        Terima kasih telah berbelanja di Nusacode Store
    </div>

</div>
