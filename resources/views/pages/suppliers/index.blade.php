@extends('layouts.main')
@section('title', 'Store | Supplier')

@section('content')
    <main>
        @if (auth()->user()->role == 'ADMIN')
            <div class="container px-4">
                <div class="row mt-4">
                    <div class="col">
                        <h3>Data Supplier</h3>
                        <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm">
                                            Tambah
                                        </a>
                                        <a href="{{ route('print-suppliers') }}" target="_blank" class="btn btn-info btn-sm ml-2"><i class="fa fa-print"></i> Print</a>
                                    </div>
                                    <div class="col-md-9 d-flex justify-content-end">
                                        <form action="{{ route('sorting-suppliers') }}" method="post" class="form-inline my-2 my-lg-0 mr-4">
                                            @csrf
                                            <div class="form-group">
                                                <select name="sortby" class="form-control">
                                                    <option value="">Urutkan</option>
                                                    <option value="a-z">A - Z</option>
                                                    <option value="z-a">Z - A</option>
                                                </select>
                                            </div>
                                            <button class="ml-2 btn btn-success btn-sm" type="submit">Submit</button>
                                        </form>
                                        <form action="{{ route('search-supplier') }}" method="GET" class="form-inline my-2 my-lg-0 justify-content-end">
                                            @csrf
                                            <input class="form-control mr-sm-2" type="search" placeholder="Cari supplier..." aria-label="Search" name="search" size="12">
                                            <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        @isset($sort)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="pt-3 m-0 text-muted">Hasil Filter <span class="font-italic">" Alphabet {{ $sort['sortby'] }} "</span></p>
                                            <a href="{{ route('suppliers.index') }}" class="ml-3 btn-warning btn btn-sm text-white mt-3">Hapus Filter</a>
                                            </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Email</th>
                                        <th>Telpon</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($suppliers as $no => $data)
                                            <tr>
                                                <td>{{ $no + $suppliers->firstItem() }}.</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->telpon }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>
                                                    <a href="{{ route('suppliers.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('suppliers.destroy', $data->id) }}" method="POST" class="d-inline">
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
                                    {{ $suppliers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container px-4 h-100 d-flex">
                <div class="m-auto card p-4 text-center">
                    <h4>Opps, sayangnya anda tidak memiliki akses untuk fitur ini!</h4>
                    <p>Hubungi admin untuk mendapatkan akses.</p>
                    <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm text-center">Home</a>
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection