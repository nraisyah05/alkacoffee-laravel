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
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item">Pelanggan</li>
                    <li class="breadcrumb-item active">Edit Data </li>
                </ol>
            </nav>
            <h2 class="h4">Tambah Pelanggan</h2>
            <p class="mb-0">Form Perubahan Data pelanggan</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('produk.list') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                Kembali
            </a>
            {{-- <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div> --}}
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

        <form action="{{ route('produk.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>

                        <label for="nama_produk">Nama Produk</label>
                        <input class="form-control" id="nama_produk" name="nama_produk" type="text"
                            placeholder="Masukkan nama produk" value="{{ $dataProduk->nama_produk }}" required="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="deskripsi">Deskripsi</label>
                        <input class="form-control" id="deskripsi" name="deskripsi"type="text"
                            placeholder="Masukkan nama gamabar " required="" value="{{ $dataProduk->deskripsi }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="harga">Harga</label>
                        <input class="form-control" id="harga" name="harga"type="text"
                            placeholder="Masukkan nama gamabar " required="" value="{{ $dataProduk->harga }}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kategori">Kategori</label>
                    <select class="form-select mb-0" id="kategori" name="kategori" aria-label="Kategori select example">
                        <option selected>kategori</option>
                        <option value="Makanan" {{ $dataProduk->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="Minuman" {{ $dataProduk->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="Other" {{ $dataProduk->kategori == 'Other' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input class="form-control" id="stok" name="stok" type="number"
                            value="{{ $dataProduk->stok }}" placeholder="" required="">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <input class="form-control" id="gambar" type="file" name="gambar"
                            value="{{ $dataProduk->gambar }}" placeholder="Enter your gambar" required="">
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-info mt-2 animate-up-2" type="submit">Simpan Perubahan</button>
            </div>

            <input type="hidden" name="produk_id" value="{{ $dataProduk->produk_id }}" />
        </form>
    </div>
@endsection
