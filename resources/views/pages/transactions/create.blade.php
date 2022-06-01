@extends('layouts.main')
@section('title', 'Store | Tambah Data Transaksi')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Tambah Data Transaksi</h5>
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
                            <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Nama Produk</label>
                                        <select name="product_id" class="form-control">
                                            <option value="">Pilih Produk</option>
                                            @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Nama Pembeli</label>
                                        {{-- <input type="text" name="nama_pembeli" placeholder="Nama pembeli" class="form-control" value="{{ old('nama_pembeli') }}"> --}}
                                        <select name="customer_id" class="form-control">
                                            <option value="">Pilih Pelanggan</option>
                                            @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Total Terjual</label>
                                        <input type="number" name="total_transaksi" placeholder="Total Produk Terjual" class="form-control" value="{{ old('total_transaksi') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Telpon</label>
                                        <input type="text" name="telpon" placeholder="Telpon" class="form-control" value="{{ old('telpon') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Tanda Pengenal (Sim/Ktp/Npwp)</label>
                                        <input type="file" name="tanda_pengenal" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Tanggal Transaksi</label>
                                        <input type="date" name="tanggal_transaksi" placeholder="Tanggal Transaksi" class="form-control" value="{{ old('tanggal_transaksi') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Alamat</label>
                                        <textarea rows="4" name="alamat" class="form-control" value="{{ old('alamat') }}"></textarea>
                                    </div>
                                </div>
                                <a href="{{ route('transactions.index') }}" class="btn btn-secondary btn-sm mt-4">Kembali</a>
                                <button type="submit" class="btn btn-primary btn-sm mt-4">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection