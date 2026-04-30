<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB; // Penting untuk query database

class HomeController extends Controller
{
    public function index()
    {
        // 1. Set bahasa ke Indonesia agar nama bulan otomatis Indonesia
        Carbon::setLocale('id');
        $namaBulan = Carbon::now()->translatedFormat('F');

        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        // 2. Ambil produk terlaris (Top 6) berdasarkan penjualan bulan ini
        // Menggunakan join ke detail_penjualan dan penjualan
        $produkTerlaris = Produk::select(
                'produk.*',
                DB::raw('SUM(detail_penjualan.jumlah) as total_terjual')
            )
            ->join('detail_penjualan', 'produk.produk_id', '=', 'detail_penjualan.produk_id')
            ->join('penjualan', 'detail_penjualan.penjualan_id', '=', 'penjualan.penjualan_id')
            ->whereMonth('penjualan.created_at', $bulanIni)
            ->whereYear('penjualan.created_at', $tahunIni)
            ->groupBy(
                'produk.produk_id',
                'produk.nama_produk',
                'produk.harga',
                'produk.gambar',
                'produk.kategori',
                'produk.deskripsi',
                'produk.stok', 
                'produk.created_at',
                'produk.updated_at'
            )
            ->orderByDesc('total_terjual')
            ->limit(6)
            ->get();

        // 3. Jika produk terlaris kurang dari 6, tambahkan produk lain secara acak
        if ($produkTerlaris->count() < 6) {
            $existingIds = $produkTerlaris->pluck('produk_id')->toArray();
            $tambahan = Produk::whereNotIn('produk_id', $existingIds)
                ->limit(6 - $produkTerlaris->count())
                ->get();

            // Set total_terjual ke 0 agar tidak error saat dipanggil di view
            foreach($tambahan as $t) {
                $t->total_terjual = 0;
            }

            $produkTerlaris = $produkTerlaris->concat($tambahan);
        }

        // 4. Kirim data ke view general.home
        return view('general.home', compact('produkTerlaris', 'namaBulan'));
    }

    public function loginadmin()
    {
        return view('general.admin');
    }

    public function successadmin()
    {
        return view('dashboard');
    }
}
