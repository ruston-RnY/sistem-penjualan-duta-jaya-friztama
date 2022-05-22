@extends('layouts.main')
@section('title', 'Dashboard | Home')

@section('content')
<main>
    <div class="container px-4 mt-4">
        <div class="card p-3">
            <h3>PT. Duta Jaya Friztama</h3>
            <p>Merupakan sebuah perusahaan yang bergerak dibidang penjualan obat pembersih dan penyedia jasa konstruksi maintenance gedung.</p>
            <ul class="list-unstyled">
                <li>Alamat : Jalan Rama Raya No.57 Cengkareng Jakarta Barat</li>
                <li>Telpon : 021-23456</li>
                <li>Email : store@mail.com</li>
            </ul>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h5>Penjualan Terbaru</h5>
                            </div>
                            <div class="col-6">
                                <a class="btn-primary btn btn-sm text-white float-right">Semua Transaksi</a>
                            </div>
                        </div>
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
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>produk</td>
                                    <td>Rp 250</td>
                                    <td>02 januari</td>
                                    <td>1 unit</td>
                                    <td>Rp 400</td>
                                </tr>
                                {{-- @forelse ($transactions as $no => $data)
                                    <tr>
                                        <td>{{ $no + 1 }}.</td>
                                        <td>{{ $data->produk->nama }}</td>
                                        <td>Rp. {{ number_format($data->produk->harga_jual) }} / unit</td>
                                        <td>{{ \Carbon\Carbon::create($data->tanggal_transaksi)->translatedFormat('l, d F Y') }}</td>
                                        <td>{{ $data->total_transaksi }} unit</td>
                                        <td>Rp. {{ number_format($data->total_harga) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="p-5 text-center">Data Kosong</td>
                                    </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
    