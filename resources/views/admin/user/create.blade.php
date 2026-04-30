@extends('layouts.admin.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.list') }}">User</a></li>
                    <li class="breadcrumb-item active">Tambah User</li>
                </ol>
            </nav>
            <h2 class="h4">Data User</h2>
            <p class="mb-0">Form Penambahan User Baru</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('user.list') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                Kembali
            </a>
        </div>
    </div>

    <div class="card card-body border-0 shadow mb-4">
        <h2 class="h5 mb-4">General information</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text"
                        placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="username">Username</label>  {{-- TAMBAH INI --}}
                    <input class="form-control" id="username" name="username" type="text"
                        placeholder="Masukkan username" value="{{ old('username') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email"
                        placeholder="name@company.com" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password"
                        placeholder="Masukkan password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="role">Role</label>
                    <select class="form-select mb-0" id="role" name="role">
                        <option value="" disabled selected>-- Pilih Role --</option>
                        <option value="Super Administrator" {{ old('role') == 'Super Administrator' ? 'selected' : '' }}>Super Administrator</option>
                        <option value="Administrator" {{ old('role') == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                        <option value="Pelanggan" {{ old('role') == 'Pelanggan' ? 'selected' : '' }}>Pelanggan</option>
                        <option value="Mitra" {{ old('role') == 'Mitra' ? 'selected' : '' }}>Mitra</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="profil">Gambar User</label>
                    <input class="form-control" id="profil" type="file" name="profil">
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-success text-white mt-2 animate-up-2" type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
