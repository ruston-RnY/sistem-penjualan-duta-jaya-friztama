@extends('layouts.main')
@section('title', 'Store | Edit Data Suplier')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h5>Edit Data Supplier</h5>
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
                            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="nama" placeholder="Nama Supplier" class="form-control" value="{{ $supplier->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" placeholder="contoh email@domain.com" class="form-control" value="{{ $supplier->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat</label>
                                    <input type="text" name="alamat" placeholder="Alamat" class="form-control" value="{{ $supplier->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Telpon</label>
                                    <input type="text" name="telpon" placeholder="Telpon" class="form-control" value="{{ $supplier->telpon }}">
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