@extends('layouts.laporan')
@section('title', 'Store | Laporan')

@section('content')
    <div class="container px-4">
        <div class="row mt-4 text-center">
            <div class="col d-flex justify-content-center">
                <div class="w-75">
                    <h3>Laporan Data Penjualan PT. Duta Jaya Friztama</h3>
                    <p class="mb-0">Jalan Rama Raya No.57 Cengkareng Jakarta Barat</p>
                    <p>Periode Transaksi : {{ \Carbon\Carbon::create($tglawal)->format('d M Y') }} s/d {{ \Carbon\Carbon::create($tglakhir)->format('d M Y') }}</p>
                    {{-- <p>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p> --}}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <span>Data Penjualan</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
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
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $data->produk->nama }}</td>
                                        <td>Rp. {{ number_format($data->produk->harga_jual) }} / pcs</td>
                                        <td>{{ \Carbon\Carbon::create($data->tanggal_transaksi)->translatedFormat('l, d F Y') }}</td>
                                        <td>{{ $data->total_transaksi }} pcs</td>
                                        <td>Rp. {{ number_format($data->total_harga) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="p-5 text-center">Data Kosong</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="5" class="text-center" style="font-weight: 500">Total</td>
                                    <td style="font-weight: 500">Rp. {{ number_format($transactions->sum('total_harga')) }}</td>
                                </tr>
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