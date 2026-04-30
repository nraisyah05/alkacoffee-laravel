<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ===== EXISTING =====
        $totalPelanggan = DB::table('pelanggan')->count();
        $totalUsers     = DB::table('users')->count();
        $totalMitra     = DB::table('mitra')->count();

        $pelangganTerbaru = DB::table('pelanggan')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(['first_name', 'email', 'created_at']);

        $totalAssets       = DB::table('asset')->count();
        $activeAssets      = DB::table('asset')->where('status', 'Aktif')->count();
        $expiredAssets     = DB::table('asset')->where('status', 'Kadaluarsa')->count();
        $maintenanceAssets = DB::table('asset')->where('status', 'Maintenance')->count();

        $dataAset = [
            'Aktif'       => $totalAssets > 0 ? round(($activeAssets / $totalAssets) * 100, 2) : 0,
            'Kadaluarsa'  => $totalAssets > 0 ? round(($expiredAssets / $totalAssets) * 100, 2) : 0,
            'Maintenance' => $totalAssets > 0 ? round(($maintenanceAssets / $totalAssets) * 100, 2) : 0,
        ];

        $pertumbuhanPelanggan = DB::table('pelanggan')
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, COUNT(*) as jumlah")
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        $dataPertumbuhanPelanggan = $pertumbuhanPelanggan->mapWithKeys(function ($item) {
            return [$item->bulan => $item->jumlah];
        });

        // ===== NEW =====

        // 1. Pendapatan kotor hari ini
        $pendapatanHariIni = DB::table('penjualan')
            ->whereDate('created_at', today())
            ->sum('total_harga');

        // 2. Produk terjual hari ini (jumlah item)
        $produkTerjualHariIni = DB::table('detail_penjualan')
            ->join('penjualan', 'detail_penjualan.penjualan_id', '=', 'penjualan.penjualan_id')
            ->whereDate('penjualan.created_at', today())
            ->sum('detail_penjualan.jumlah');

        // 3. Top 5 produk terlaris bulan ini (hanya makanan & minuman)
        $produkTerlaris = DB::table('detail_penjualan')
            ->join('penjualan', 'detail_penjualan.penjualan_id', '=', 'penjualan.penjualan_id')
            ->join('produk', 'detail_penjualan.produk_id', '=', 'produk.produk_id')
            ->whereIn('produk.kategori', ['makanan', 'minuman'])
            ->whereMonth('penjualan.created_at', now()->month)
            ->whereYear('penjualan.created_at', now()->year)
            ->selectRaw('produk.produk_id, produk.nama_produk, produk.gambar, produk.kategori, SUM(detail_penjualan.jumlah) as total_terjual')
            ->groupBy('produk.produk_id', 'produk.nama_produk', 'produk.gambar', 'produk.kategori')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->get();

        // 4. Produk terbaru
        $produkTerbaru = DB::table('produk')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get(['nama_produk', 'harga', 'gambar', 'kategori', 'created_at']);

        // 5. Grafik pertumbuhan penjualan per bulan (12 bulan terakhir)
        $penjualanPerBulan = DB::table('penjualan')
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, SUM(total_harga) as total, COUNT(*) as jumlah_transaksi")
            ->whereRaw("created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)")
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        $dataPenjualanBulan = $penjualanPerBulan->mapWithKeys(fn($item) => [
            $item->bulan => [
                'total'              => $item->total,
                'jumlah_transaksi'   => $item->jumlah_transaksi,
            ]
        ]);

        return view('admin.dashboard', compact(
            'totalPelanggan',
            'totalUsers',
            'totalMitra',
            'pelangganTerbaru',
            'dataAset',
            'dataPertumbuhanPelanggan',
            'produkTerbaru',
            'pendapatanHariIni',
            'produkTerjualHariIni',
            'produkTerlaris',
            'dataPenjualanBulan',
        ));
    }
}
