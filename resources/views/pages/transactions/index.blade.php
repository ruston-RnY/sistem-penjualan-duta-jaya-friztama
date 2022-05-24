@extends('layouts.main')
@section('title', 'Store | Transaction')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row mt-4">
                <div class="col">
                    <h3>Data Transaksi</h3>
                    <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-5">
                                    <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm">
                                        Tambah
                                    </a>
                                    <a href="{{ route('print-transactions') }}" target="_blank" class="btn btn-info btn-sm ml-2"><i class="fa fa-print"></i> Print</a>
                                </div>
                                {{-- <div class="col-7 d-flex justify-content-between">
                                    <form action="{{ route('sorting-transactions') }}" method="post" class="form-inline my-2 my-lg-0">
                                        @csrf
                                        <div class="form-group">
                                            <select name="sortby" class="form-control">
                                                <option value="">Urutkan</option>
                                                <option value="terbaru">Terbaru</option>
                                                <option value="terlama">Terlama</option>
                                            </select>
                                        </div>
                                        <button class="ml-2 btn btn-success btn-sm" type="submit">Submit</button>
                                    </form>
                                    <form action="{{ route('search-transactions') }}" method="GET" class="form-inline my-2 my-lg-0 justify-content-end">
                                        @csrf
                                        <input class="form-control mr-sm-2" type="search" placeholder="Masukkan kata kunci..." aria-label="Search" name="search" size="30">
                                        <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div> --}}
                            </div>
                            {{-- <div class="row">
                                <div class="col">
                                    @isset($sort)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="pt-3 m-0 text-muted">Hasil Filter <span class="font-italic">" Transaksi {{ $sort['sortby'] }} "</span></p>
                                        <a href="{{ route('transactions.index') }}" class="ml-3 btn-warning btn btn-sm text-white mt-3">Hapus Filter</a>
                                        </div>
                                    @endisset
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Terjual</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $no => $data)
                                        <tr>
                                            <td>{{ $no + $transactions->firstItem() }}.</td>
                                            <td>{{ $data->produk->nama }}</td>
                                            <td>Rp. {{ number_format($data->produk->harga_jual) }} / unit</td>
                                            <td>{{ \Carbon\Carbon::create($data->tanggal_transaksi)->translatedFormat('l, d F Y') }}</td>
                                            <td>{{ $data->total_transaksi }} pcs</td>
                                            <td>Rp. {{ number_format($data->total_harga) }}</td>
                                            <td>
                                                <a href="{{ route('transactions.show', $data->id) }}" class="btn btn-success btn-sm">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <form action="{{ route('transactions.destroy', $data->id) }}" method="POST" class="d-inline">
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
                                {{ $transactions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
