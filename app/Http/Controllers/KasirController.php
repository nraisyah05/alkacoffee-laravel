<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Daftar kolom yang bisa difilter sesuai nama pada form
        $filterableColumns = ['tanggal_pemesanan'];

        $searchableColumns = ['nama_pelanggan'];

        //Gunakan scope filter untuk memproses query
        $pageData['dataKasir'] = Kasir::filter($request, $filterableColumns, $searchableColumns)
                                                ->paginate(5)
                                                ->withQueryString();

        // Jika pada Controller menerapkan onEachSide
        // $pageData['dataKasir'] = Kasir::paginate(10)->onEachSide(2);

        // Jika pada Controller menerapkan simplePaginate
        // $pageData['dataKasir'] = Kasir::simplePaginate(5);

        return view('admin.kasir.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kasir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_pelanggan' => ['required'],
            'pesanan' => ['required'],
            'tanggal_pemesanan' => ['required', 'date'],
            'jumlah_pesanan' => ['required', 'numeric'],
            'total_harga' => ['required', 'numeric'],
            'metode_pembayaran' => ['required', 'in:Tunai,Transfer,QRIS'],
        ]);

        $data['nama_pelanggan'] = $request->nama_pelanggan;
        $data['pesanan'] = $request->pesanan;
        $data['tanggal_pemesanan'] = $request->tanggal_pemesanan;
        $data['jumlah_pesanan'] = $request->jumlah_pesanan;
        $data['total_harga'] = $request->total_harga;
        $data['metode_pembayaran'] = $request->metode_pembayaran;

        Kasir::create($data);

        return redirect()->route('kasir.list')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        $pageData['dataKasir'] = Kasir::findOrFail($param1);
        return view('admin.kasir.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'kasir_id' => ['required'],
            'nama_pelanggan' => ['required'],
            'pesanan' => ['required'],
            'tanggal_pemesanan' => ['required'],
            'jumlah_pesanan' => ['required', 'numeric'],
            'total_harga' => ['required', 'numeric'],
            'metode_pembayaran' => ['required', 'in:Tunai,Transfer,QRIS'],
        ]);

        $kasir_id = $request->kasir_id;
        $kasir = Kasir::findOrFail($kasir_id);

        $kasir->nama_pelanggan = $request->nama_pelanggan;
        $kasir->pesanan = $request->pesanan;
        $kasir->tanggal_pemesanan = $request->tanggal_pemesanan;
        $kasir->jumlah_pesanan = $request->jumlah_pesanan;
        $kasir->total_harga = $request->total_harga;
        $kasir->metode_pembayaran = $request->metode_pembayaran;

        $kasir->save();

        return redirect()->route('kasir.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $kasir = Kasir::findOrFail($param1);
        $kasir->delete();

        return redirect()->route('kasir.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
