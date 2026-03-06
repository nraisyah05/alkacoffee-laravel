<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        //Daftar kolom yang bisa difilter sesuai nama pada form
        $filterableColumns = ['kategori'];

        $searchableColumns = ['nama_produk'];

        //Gunakan scope filter untuk memproses query
        $pageData['dataProduk'] = Produk::filter($request, $filterableColumns, $searchableColumns)
            ->paginate(5)
            ->withQueryString();

        // Jika pada Controller menerapkan onEachSide
        // $pageData['dataProduk'] = Produk::paginate(10)->onEachSide(2);

        // Jika pada Controller menerapkan simplePaginate
        // $pageData['dataProduk'] = Produk::simplePaginate(5);

        return view('admin.produk.index', $pageData);
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Makanan,Minuman,Other',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = new Produk();
        $data->nama_produk = $request->nama_produk;
        $data->deskripsi = $request->deskripsi;
        $data->kategori = $request->kategori;
        $data->harga = $request->harga;
        $data->stok = $request->stok;

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('produk', 'public');
            $data->gambar = $imagePath;
        }

        $data->save();

        return redirect()->route('produk.list')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(string $produk_id)
    {
        // Ambil data produk berdasarkan ID
        $dataProduk = Produk::findOrFail($produk_id);

        // Kirimkan data ke view 'edit'
        return view('admin.produk.edit', compact('dataProduk'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:Makanan,Minuman,Other',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        // Ambil data produk berdasarkan ID
        $produk = Produk::findOrFail($request->produk_id);

        // Update data produk
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {

            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $imagePath = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $imagePath;
        }

        // Simpan perubahan
        $produk->save();

        return redirect()->route('produk.list')->with('success', 'Perubahan Data Berhasil');
    }

    public function destroy(string $param1)
    {
        $produk = Produk::findOrFail($param1);
        $produk->delete();

        return redirect()->route('produk.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
