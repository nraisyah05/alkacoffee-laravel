<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Daftar kolom yang bisa difilter sesuai nama pada form
        $filterableColumns = ['kategori','status'];

        $searchableColumns = ['nama_asset'];

        //Gunakan scope filter untuk memproses query
        $pageData['dataAsset'] = Asset::filter($request, $filterableColumns, $searchableColumns)
                                                ->paginate(5)
                                                ->withQueryString();

        // Jika pada Controller menerapkan onEachSide
        // $pageData['dataAsset'] = Asset::paginate(10)->onEachSide(2);

        // Jika pada Controller menerapkan simplePaginate
        // $pageData['dataAsset'] = Asset::simplePaginate(5);

        // Menampilkan view index dengan data asset
        return view('admin.asset.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan view form create asset
        return view('admin.asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_asset' => ['required'],
            'kategori' => ['required', 'in:Mesin,Alat,Inventaris'],
            'tanggal_pembelian' => ['required', 'date'],
            'tanggal_kadaluarsa' => ['required', 'date'],
            'status' => ['required', 'in:Aktif,Kadaluarsa,Maintenance'],
        ]);

        $data['nama_asset'] = $request->nama_asset;
        $data['kategori'] = $request->kategori;
        $data['tanggal_pembelian'] = $request->tanggal_pembelian;
        $data['tanggal_kadaluarsa'] = $request->tanggal_kadaluarsa;
        $data['status'] = $request->status;

        Asset::create($data);

        return redirect()->route('asset.list')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataAsset'] = Asset::findOrFail($param1);
        return view('admin.asset.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama_asset' => ['required'],
            'kategori' => ['required', 'in:Mesin,Alat,Inventaris'],
            'tanggal_pembelian' => ['required', 'date'],
            'tanggal_kadaluarsa' => ['required', 'date'],
            'status' => ['required', 'in:Aktif,Kadaluarsa,Maintenance'],
        ]);

        $asset_id = $request->asset_id;
        $asset = Asset::findOrFail($asset_id);

        $asset->nama_asset = $request->nama_asset;
        $asset->kategori = $request->kategori;
        $asset->tanggal_pembelian = $request->tanggal_pembelian;
        $asset->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $asset->status = $request->status;

        $asset->save();

        return redirect()->route('asset.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $asset = Asset::findOrFail($param1);
        $asset->delete();
        return redirect()->route('asset.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
