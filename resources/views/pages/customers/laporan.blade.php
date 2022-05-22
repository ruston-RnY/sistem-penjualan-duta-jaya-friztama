@extends('layouts.laporan')
@section('title', 'Store | Laporan')

@section('content')
    <div class="container px-4">
        <div class="row mt-4 text-center">
            <div class="col d-flex justify-content-center">
                <div class="w-75">
                    <h3>Laporan Data Pelanggan PT. Duta Jaya Friztama</h3>
                    <p class="mb-0">Jalan Rama Raya No.57 Cengkareng Jakarta Barat</p>
                    <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <span>Data Pelanggan</span>
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
                            </thead>
                            <tbody>
                                @forelse ($customers as $no => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->telpon }}</td>
                                        <td>{{ $data->alamat }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="p-5 text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        window.print()
    </script>
@endpush