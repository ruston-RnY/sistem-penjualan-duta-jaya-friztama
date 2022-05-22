@extends('layouts.main')
@section('title', 'Store | Edit Produk')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Edit Data Produk</h5>
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
                            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" placeholder="Nama Produk" class="form-control" value="{{ $product->nama }}">
                                </div>
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input type="number" name="harga_beli" placeholder="Harga Beli" class="form-control" value="{{ $product->harga_beli }}">
                                </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="number" name="harga_jual" placeholder="Harga Jual" class="form-control" value="{{ $product->harga_jual }}">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" name="stok" placeholder="Stok" class="form-control" value="{{ $product->stok }}">
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplier_id" class="form-control" required>
                                        <option value="{{ $product->supplier->id }}">{{ $product->supplier->nama }} (Supplier saat ini)</option>
                                        <option value="">Pilih Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Foto Produk</label>
                                    <input type="file" name="foto" class="form-control" >
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