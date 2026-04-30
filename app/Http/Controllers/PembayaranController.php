<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaranController extends Controller
{
    // ================= HALAMAN KASIR =================
    public function index()
    {
        // reset keranjang saat buka halaman
        session()->forget('cart');

        // ambil produk berdasarkan kategori
        $makanan = Produk::where('kategori', 'makanan')->get();
        $minuman = Produk::where('kategori', 'minuman')->get();
        $other   = Produk::where('kategori', 'other')->get();

        return view('admin.penjualan.index', compact('makanan', 'minuman', 'other'));
    }


    // ================= TAMBAH KE KERANJANG =================
    public function tambahKeranjang(Request $request)
    {
        $produk = Produk::find($request->produk_id);

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ]);
        }

        // ambil cart dari session
        $cart = session()->get('cart', []);

        // jika sudah ada → tambah qty
        if (isset($cart[$produk->produk_id])) {
            $cart[$produk->produk_id]['qty']++;
        } else {
            // jika belum ada → tambah baru
            $cart[$produk->produk_id] = [
                "nama"  => $produk->nama_produk,
                "harga" => $produk->harga,
                "qty"   => 1
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }


    // ================= SIMPAN TRANSAKSI =================
    public function simpan(Request $request)
    {
        $cart = $request->cart;

        // validasi keranjang
        if (!$cart || count($cart) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Keranjang kosong'
            ]);
        }

        try {
            // hitung total harga
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['harga'] * $item['qty'];
            }

            // simpan ke tabel penjualan
            $penjualan = Penjualan::create([
                'pelanggan_id'      => null,
                'total_harga'       => $total,
                'metode_pembayaran' => 'Tunai'
            ]);

            // simpan detail penjualan
            foreach ($cart as $id => $item) {

                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->penjualan_id,
                    'produk_id'    => $id,
                    'jumlah'       => $item['qty'],
                    'harga'        => $item['harga'],
                    'subtotal'     => $item['qty'] * $item['harga']
                ]);

                // kurangi stok produk
                Produk::where('produk_id', $id)
                    ->decrement('stok', $item['qty']);
            }

            // kosongkan cart
            session()->forget('cart');

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil',
                'penjualan_id' => $penjualan->penjualan_id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    // ================= HAPUS DARI KERANJANG =================
    public function hapusKeranjang(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->produk_id])) {
            unset($cart[$request->produk_id]);
            session()->put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart'    => $cart
        ]);
    }

    // ================= TAMPIL STRUK =================
    public function struk($id)
    {
        $penjualan = Penjualan::with('detail.produk')->findOrFail($id);
        return view('admin.penjualan.struk', compact('penjualan'));
    }


    // ================= STRUK PDF =================
    public function strukPdf($id)
    {
        $penjualan = Penjualan::with('detail.produk')->findOrFail($id);

        $pdf = Pdf::loadView('admin.penjualan.struk_pdf', compact('penjualan'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('struk_' . $penjualan->penjualan_id . '.pdf');
    }
}
