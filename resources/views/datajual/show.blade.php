@extends('layouts.main')

@section('container')


<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card" style="max-width: 600px; width: 100%; align-content: flex-start;">
        <div class="card-body">

            <h3 style="text-align: center;">Data Penjualan</h3>
            <br>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal}}" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="costumer" class="form-label">Customer</label>
                    <input type="text" class="form-control" id="costumer" name="costumer" value="{{ $data->costumer }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="produk_id" class="form-label">Produk</label>
                    <input type="text" class="form-control" id="produk" name="produk" value="{{ $data->produk->produk ?? ''}} " readonly>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Harga Satuan</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="Rp. {{ isset($data->produk) && $data->produk->harga ? number_format($data->produk->harga, 2, ',', '.') : '' }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="total_jumlah" name="total_jumlah" value="Rp. {{ number_format($data->total_jumlah, 2, ',','.') }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="admin_id" class="form-label">Admin</label>
                    <input type="text" class="form-control" id="admin" name="admin" value="{{ $data->admin->nama ?? ''}} " readonly>
                </div>
        </div>
    </div>
</div>
@endsection