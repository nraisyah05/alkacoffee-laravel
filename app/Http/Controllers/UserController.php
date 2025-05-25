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
        // Validasi input
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role' => ['required', 'in:Super Administrator,Administrator,Pelanggan,Mitra'],
            // 'Gambar_User' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $data = new user;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        if ($request->hasFile('Gambar_User')) {

            $imageName = time() . '.' . $request->Gambar_User->extension();

            $request->Gambar_User->move(public_path('Gambar_User'), $imageName);

            $data->Gambar_User = $imageName;
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
        // Validasi input
        $request->validate([
            'id' => ['required'], // ID harus ada
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'min:6'], // Password opsional
            'role' => ['required', 'in:Super Administrator,Administrator,Pelanggan,Mitra'],
            'Gambar_User' => ['nullable', 'image', 'mimes:jpg,jpeg,png'], // Gambar opsional
        ]);

        // Ambil data user berdasarkan ID
        $user = User::findOrFail($request->id);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('Gambar_User')) {
            // Hapus gambar lama jika ada
            if ($user->Gambar_User && file_exists(public_path('Gambar_User/' . $user->Gambar_User))) {
                unlink(public_path('Gambar_User/' . $user->Gambar_User));
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->Gambar_User->extension();
            $request->Gambar_User->move(public_path('Gambar_User'), $imageName);

            // Simpan nama file ke database
            $user->Gambar_User = $imageName;
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
