<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // import

class PembayaranController extends Controller
{
    // Halaman Kasir / Pembayaran
    public function index()
    {
        session()->forget('cart'); // reset keranjang saat buka halaman
        $produk = Produk::all();
        return view('admin.penjualan.index', compact('produk'));
    }

    // Tambah produk ke keranjang (AJAX)
    public function tambahKeranjang(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        if (!$produk) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan']);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$produk->produk_id])) {
            $cart[$produk->produk_id]['qty']++;
        } else {
            $cart[$produk->produk_id] = [
                "nama" => $produk->nama_produk,
                "harga" => $produk->harga,
                "qty" => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // Simpan transaksi
    // public function simpan(Request $request)
    // {
    //     $cart = $request->cart;

    //     if (!$cart || count($cart) == 0) {
    //         return response()->json(['success' => false, 'message' => 'Keranjang kosong']);
    //     }

    //     try {
    //         // Hitung total transaksi
    //         $total = 0;
    //         foreach ($cart as $item) {
    //             $total += $item['harga'] * $item['qty'];
    //         }

    //         // Buat satu penjualan
    //         $penjualan = Penjualan::create([
    //             'pelanggan_id'      => null,        // bisa diisi sesuai pelanggan
    //             'total_harga'       => $total,
    //             'metode_pembayaran' => 'Tunai'
    //         ]);

    //         // Simpan semua item ke detail_penjualan
    //         foreach ($cart as $id => $item) {
    //             DetailPenjualan::create([
    //                 'penjualan_id' => $penjualan->penjualan_id,
    //                 'produk_id'    => $id,
    //                 'qty'          => $item['qty'],
    //                 'harga'        => $item['harga'],
    //                 'jumlah'       => $item['qty'] * $item['harga'],
    //                 'subtotal'     => $item['qty'] * $item['harga']
    //             ]);

    //             // Kurangi stok produk
    //             Produk::where('produk_id', $id)->decrement('stok', $item['qty']);
    //         }

    //         // Reset keranjang
    //         session()->forget('cart');

    //         return response()->json(['success' => true, 'message' => 'Transaksi berhasil']);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }

    // Simpan transaksi
    public function simpan(Request $request)
    {
        $cart = $request->cart;

        if (!$cart || count($cart) == 0) {
            return response()->json(['success' => false, 'message' => 'Keranjang kosong']);
        }

        try {
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['harga'] * $item['qty'];
            }

            $penjualan = Penjualan::create([
                'pelanggan_id'      => null,
                'total_harga'       => $total,
                'metode_pembayaran' => 'Tunai'
            ]);

            foreach ($cart as $id => $item) {
                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->penjualan_id,
                    'produk_id'    => $id,
                    'qty'          => $item['qty'],
                    'harga'        => $item['harga'],
                    'jumlah'       => $item['qty'] * $item['harga'],
                    'subtotal'     => $item['qty'] * $item['harga']
                ]);

                Produk::where('produk_id', $id)->decrement('stok', $item['qty']);
            }

            session()->forget('cart');

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil',
                'penjualan_id' => $penjualan->penjualan_id // <-- kirim ID
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function struk($id)
    {
        $penjualan = Penjualan::with('detail.produk')->findOrFail($id);
        return view('admin.penjualan.struk', compact('penjualan'));
    }


    public function strukPdf($id)
    {
        $penjualan = Penjualan::with('detail.produk')->findOrFail($id);

        $pdf = Pdf::loadView('admin.penjualan.struk_pdf', compact('penjualan'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('struk_' . $penjualan->penjualan_id . '.pdf');
    }
}
