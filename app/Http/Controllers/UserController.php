<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Daftar kolom yang bisa difilter sesuai nama pada form
        $filterableColumns = ['role'];

        $searchableColumns = ['name'];

        //Gunakan scope filter untuk memproses query
        $pageData['dataUser'] = User::filter($request, $filterableColumns, $searchableColumns)
            ->paginate(5)
            ->withQueryString();

        // Jika pada Controller menerapkan onEachSide
        // $pageData['dataUser'] = User::paginate(10)->onEachSide(2);

        // Jika pada Controller menerapkan simplePaginate
        // $pageData['dataUser'] = User::simplePaginate(5);

        return view('admin.user.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'], // tambah ini
            'password' => ['required'],
            'role' => ['required', 'in:Super Administrator,Administrator,Pelanggan,Mitra'],
        ]);

        $data = new User; // ganti 'user' jadi 'User' (huruf kapital)
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['username'] = $request->username; // tambah ini
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        if ($request->hasFile('profil')) {

            $imageName = time() . '.' . $request->profil->extension();

            $request->profil->move(public_path('profil'), $imageName);

            $data->profil = $imageName;
        }

        $data->save();

        session()->flash('success', 'User berhasil ditambahkan!');

        return redirect()->route('user.list');
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
    public function edit(string $id)
    {
        // Ambil data user berdasarkan ID
        $dataUser = User::findOrFail($id);

        // Kirimkan data ke view 'edit'
        return view('admin.user.edit', compact('dataUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required', 'unique:users,username,' . $request->id], // tambah ini (ignore ID sendiri)
            'password' => ['nullable', 'min:6'],
            'role' => ['required', 'in:Super Administrator,Administrator,Pelanggan,Mitra'],
            'profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username; // tambah ini

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('profil')) {
            // Hapus gambar lama jika ada
            if ($user->profil && file_exists(public_path('profil/' . $user->profil))) {
                unlink(public_path('profil/' . $user->profil));
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->profil->extension();
            $request->profil->move(public_path('profil'), $imageName);

            // Simpan nama file ke database
            $user->profil = $imageName;
        }

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('user.list')->with('success', 'Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        $user = User::findOrFail($param1);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'Penghapusan Data Berhasil!');
    }
}
