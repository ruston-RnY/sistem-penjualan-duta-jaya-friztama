@extends('layouts.main')
@section('title', 'Store | Customer')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row mt-4">
                <div class="col">
                    <h3>Data Customer</h3>
                    <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">
                                        Tambah
                                    </a>
                                    <a href="{{ route('print-customers') }}" target="_blank" class="btn btn-info btn-sm ml-2"><i class="fa fa-print"></i> Print</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <th>#</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $no => $data)
                                        <tr>
                                            <td>{{ $no + $customers->firstItem() }}.</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->telpon }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>
                                                <a href="{{ route('customers.edit', $data->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('customers.destroy', $data->id) }}" method="POST" class="d-inline">
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
                                {{ $customers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection