@extends('layouts.main')
@section('title', 'Store | Produk')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row mt-4">
                <div class="col">
                    <h3>Data Produk</h3>
                    <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                                        Tambah
                                    </a>
                                </div>
                                <div class="col-8 d-flex justify-content-between">
                                    <form action="{{ route('sorting-products') }}" method="post" class="form-inline my-2 my-lg-0">
                                        @csrf
                                        <div class="form-group">
                                            <select name="sortby" class="form-control">
                                                <option value="">Urutkan</option>
                                                <option value="terendah">Harga Terendah</option>
                                                <option value="tertinggi">Harga Tertinggi</option>
                                            </select>
                                        </div>
                                        <button class="ml-2 btn btn-success btn-sm" type="submit">Submit</button>
                                    </form>
                                    <form action="{{ route('search-product') }}" method="GET" class="form-inline my-2 my-lg-0 justify-content-end">
                                        @csrf
                                        <input class="form-control mr-sm-2" type="search" placeholder="Masukkan Nama Produk..." aria-label="Search" name="search" size="30">
                                        <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @isset($sort)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="pt-3 m-0 text-muted">Hasil Filter <span class="font-italic">" Harga {{ $sort['sortby'] }} "</span></p>
                                        <a href="{{ route('products.index') }}" class="ml-3 btn-warning btn btn-sm text-white mt-3">Hapus Filter</a>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <th>#</th>
                                    <th>Foto Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Supplier</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($products as $no => $data)
                                        <tr>
                                            <td>{{ $no + $products->firstItem() }}.</td>
                                            <td>
                                                <div style="height: 70px;">
                                                    <img src="{{ Storage::url($data->foto) }}" alt="" class="img-thumbnail" style="width: 50%; object-fit: contain; height: 100%;">
                                                </div>
                                            </td>
                                            <td>{{ $data->nama }}</td>
                                            <td>Rp. {{ number_format($data->harga_beli) }}</td>
                                            <td>Rp. {{ number_format($data->harga_jual) }}</td>
                                            <td>{{ $data->stok }}</td>
                                            <td>{{ $data->supplier->nama }}</td>
                                            <td>
                                                <a href="{{ route('products.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $data->id) }}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="p-5 text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row justify-content-center">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection