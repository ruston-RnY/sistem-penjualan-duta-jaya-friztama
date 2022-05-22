@extends('layouts.laporan')
@section('title', 'Store | Laporan')

@section('content')
    <div class="container px-4">
        <div class="row mt-4 text-center">
            <div class="col d-flex justify-content-center">
                <div class="w-75">
                    <h3>Laporan Data Produk PT. Duta Jaya Friztama</h3>
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
                                <span>Data Produk</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Supplier</th>
                                <th>Tanggal Pembelian</th>
                            </thead>
                            <tbody>
                                @forelse ($products as $no => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>Rp. {{ number_format($data->harga_beli) }}</td>
                                        <td>Rp. {{ number_format($data->harga_jual) }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->supplier->nama }}</td>
                                        <td>{{ \Carbon\Carbon::create($data->created_at)->translatedFormat('l, d F Y') }}</td>
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