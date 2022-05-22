@extends('layouts.main')
@section('title', 'Store | Tambah Data Produk')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Tambah Data Produk</h5>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" placeholder="Nama Produk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input type="number" name="harga_beli" placeholder="Harga Beli" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="number" name="harga_jual" placeholder="Harga Jual" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" name="stok" placeholder="Stok" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="">Pilih Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Foto Produk</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm mt-4">Kembali</a>
                                <button type="submit" class="btn btn-primary btn-sm mt-4">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection