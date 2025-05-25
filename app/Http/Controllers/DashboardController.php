<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total pelanggan
        $totalPelanggan = DB::table('pelanggan')->count();

        // Total users
        $totalUsers = DB::table('users')->count();

        // Total mitra
        $totalMitra = DB::table('mitra')->count();

        // Mengambil 3 pelanggan terbaru
        $pelangganTerbaru = DB::table('pelanggan')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(['first_name', 'email', 'created_at']);

        // Data untuk diagram lingkaran kondisi aset
        $totalAssets = DB::table('asset')->count();
        $activeAssets = DB::table('asset')->where('status', 'Aktif')->count();
        $expiredAssets = DB::table('asset')->where('status', 'Kadaluarsa')->count();
        $maintenanceAssets = DB::table('asset')->where('status', 'Maintenance')->count();

        $dataAset = [
            'Aktif' => $totalAssets > 0 ? round(($activeAssets / $totalAssets) * 100, 2) : 0,
            'Kadaluarsa' => $totalAssets > 0 ? round(($expiredAssets / $totalAssets) * 100, 2) : 0,
            'Maintenance' => $totalAssets > 0 ? round(($maintenanceAssets / $totalAssets) * 100, 2) : 0
        ];

        // Pertumbuhan pelanggan per bulan
        $pertumbuhanPelanggan = DB::table('pelanggan')
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, COUNT(*) as jumlah")
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        $dataPertumbuhanPelanggan = $pertumbuhanPelanggan->mapWithKeys(function ($item) {
            return [$item->bulan => $item->jumlah];
        });

        // Mengambil 3 produk terbaru beserta gambar
        $produkTerbaru = DB::table('produk')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get(['nama_produk', 'harga', 'gambar', 'created_at']);

        return view('admin.dashboard', [
            'totalPelanggan' => $totalPelanggan,
            'totalUsers' => $totalUsers,
            'totalMitra' => $totalMitra,
            'pelangganTerbaru' => $pelangganTerbaru,
            'dataAset' => $dataAset,
            'dataPertumbuhanPelanggan' => $dataPertumbuhanPelanggan,
            'produkTerbaru' => $produkTerbaru, // Produk terbaru
        ]);
    }
}
