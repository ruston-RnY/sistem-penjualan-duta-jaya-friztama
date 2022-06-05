@extends('layouts.main')
@section('title', 'Store | Detail Transaksi')

@section('content')
    <main>
        <div class="container px-4">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Detail Transaksi</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-stats ">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>ID Transaksi</td>
                                        <td>#{{ $detailTransaction->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pembeli</td>
                                        <td>{{ $detailTransaction->customer->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $detailTransaction->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telpon</td>
                                        <td>{{ $detailTransaction->telpon }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanda Pengenal</td>
                                        <td>
                                            <div style="height: 70px;">
                                                <img src="{{ Storage::url($detailTransaction->tanda_pengenal) }}" alt="" class="img-thumbnail" style="object-fit: contain; height: 100%;">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Produk</td>
                                        <td>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal Pembelian</th>
                                                    <th>Total Harga</th>
                                                </tr>
                                                    <tr>
                                                        <td>{{ $detailTransaction->produk->nama }}</td>
                                                        <td>Rp. {{ number_format($detailTransaction->produk->harga_jual) }} / pcs</td>
                                                        <td>{{ $detailTransaction->total_transaksi }} pcs</td>
                                                        <td>{{ \Carbon\Carbon::create($detailTransaction->tanggal_transaksi)->translatedFormat('l, d F Y') }}</td>
                                                        <td>Rp. {{ number_format($detailTransaction->total_harga) }}</td>
                                                    </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <div class="trigger">
                                    <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-primary">Back</a>
                                    <a href="{{ route('print-detail-transactions', $detailTransaction->id) }}" target="_blank" class="btn btn-info btn-sm ml-2"><i class="fa fa-print"></i> Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection