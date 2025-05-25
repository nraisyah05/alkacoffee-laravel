<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Daftar kolom yang bisa difilter sesuai nama pada form
        $filterableColumns = ['jenis_mitra'];

        $searchableColumns = ['nama_mitra'];

        //Gunakan scope filter untuk memproses query
        $pageData['dataMitra'] = Mitra::filter($request, $filterableColumns, $searchableColumns)
                                                ->paginate(5)
                                                ->withQueryString();

        // Jika pada Controller menerapkan onEachSide
        // $pageData['dataMitra'] = Mitra::paginate(10)->onEachSide(2);

        // Jika pada Controller menerapkan simplePaginate
        // $pageData['dataMitra'] = Mitra::simplePaginate(5);

        return view('admin.mitra.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_mitra' => 'required|string|max:200',
            'alamat' => 'nullable|string',
            'email' => 'required|email|max:50|unique:mitra,email',
            'no_tlp' => 'required|numeric',
            'jenis_mitra' => 'required|in:Platinum,Gold,Silver',
            'tanggal_bergabung' => 'required|date',
            'checkbox_konfirmasi' => 'accepted', // Checkbox harus dicentang
        ], [
            'checkbox_konfirmasi.accepted' => 'Checkbox harus dicentang untuk melanjutkan.',
        ]);

        $data['nama_mitra'] = $request->nama_mitra;
        $data['alamat'] = $request->alamat;
        $data['email'] = $request->email;
        $data['no_tlp'] = $request->no_tlp;
        $data['jenis_mitra'] = $request->jenis_mitra;
        $data['tanggal_bergabung'] = $request->tanggal_bergabung;

        Mitra::create($data);

        return redirect()->route('mitra.list')->with('success', 'Penambahan Data Berhasil!');
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
        $pageData['dataMitra'] = Mitra::findOrFail($param1);
        return view('admin.mitra.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'mitra_id' => ['required'],
            'nama_mitra' => ['required'],
            'alamat' => ['required'],
            'email' => ['required', 'email'],
            'no_tlp' => ['required', 'numeric'],
            'jenis_mitra' => ['required', 'in:Platinum,Gold,Silver'],
            'tanggal_bergabung' => ['required', 'date'],
        ]);

        $mitra_id = $request->mitra_id;
        $mitra = Mitra::findOrFail($mitra_id);

        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->alamat = $request->alamat;
        $mitra->email = $request->email;
        $mitra->no_tlp = $request->no_tlp;
        $mitra->jenis_mitra = $request->jenis_mitra;
        $mitra->tanggal_bergabung = $request->tanggal_bergabung;

        $mitra->save();

        return redirect()->route('mitra.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $mitra = mitra::findOrFail($param1);
        $mitra->delete();

        return redirect()->route('mitra.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
