@extends('layouts.main')
@section('title', 'Dashboard | Home')

@push('custom-style')
    <style>
        .card-dashboard{
            border-radius: 20px
        }

        .card-dashboard h6{
            color: rgb(153, 153, 153)
        }
    </style>
@endpush

@section('content')
<main>
    <div class="container px-4 mt-4">
        <div class="row dashboard">
            <div class="col-md-8">
                <div class="card p-3 card-dashboard">
                    <h3>PT. Duta Jaya Friztama</h3>
                    <p>Merupakan sebuah perusahaan yang bergerak dibidang penjualan obat pembersih dan penyedia jasa konstruksi maintenance gedung.</p>
                    <ul class="list-unstyled">
                        <li>Alamat : Jalan Rama Raya No.57 Cengkareng Jakarta Barat</li>
                        <li>Telpon : 021-23456</li>
                        <li>Email : store@mail.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <h6>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</h6>
                <div class="row">
                    <div class="col-6 pr-0">
                        <div class="card text-center p-4 card-dashboard">
                            <img src="{{ url('backend/assets/box.png') }}" class="m-auto" style="width: 60px">
                            <h6 class="mt-3">{{ $totalProducts }} Produk</h6>
                        </div>
                    </div>
                    <div class="col-6 pr-0">
                        <div class="card text-center p-4 card-dashboard">
                            <img src="{{ url('backend/assets/salary.png') }}" class="m-auto" style="width: 60px">
                            <h6 class="mt-3">{{ $totalTransactions }} Transaksi</h6>
                        </div>
                    </div>
                </div>
            </div>
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
                                <a href="{{ route('transactions.index') }}" class="btn-primary btn btn-sm text-white float-right">Semua Transaksi</a>
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
                                @forelse ($transactions as $no => $data)
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
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
    