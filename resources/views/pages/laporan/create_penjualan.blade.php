@extends('layouts.main')

@section('title', 'Cetak Laporan Penjualan')
 
@section('content')
    <main>
        <div class="container px-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="box-title">Cetak Laporan Penjualan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.store') }}" method="POST" target="_blank">
                        @csrf
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="tglawal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tglakhir">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection