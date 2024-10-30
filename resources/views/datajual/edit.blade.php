@extends('layouts.main')

@section('container')


<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="max-width: 600px; width: 100%; align-content: flex-start;">
        <div class="card-body">

            <h3>Edit Data Penjualan</h3>
            <br>
            <form method="POST" action="{{ route('datajual.update', $data->id) }}" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $data->tanggal}}" required>
                </div>
                
                <div class="mb-3">
                    <label for="costumer" class="form-label">Customer</label>
                    <input type="text" class="form-control" id="costumer" name="costumer" value="{{ $data->costumer }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="produk_id" class="form-label">Produk</label>
                    <select class="form-control" id="produk_id" name="produk_id" required>
                        @foreach ($produkList as $produk)
                            <option value="{{ $produk->id }}" {{ $produk->id == $data->produk_id ? 'selected' : '' }}> <strong>{{ $produk->produk }}</strong> Rp. {{ number_format($produk->harga, 2, ',','.') }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $data->jumlah }}" required>
                </div>
                
                {{-- <div class="mb-3">
                    <label for="total_jumlah" class="form-label">Total Jumlah</label>
                    <input type="number" class="form-control" id="total_jumlah" name="total_jumlah" required>
                </div> --}}
                
                <div class="mb-3">
                    <label for="admin_id" class="form-label">Admin</label>
                    <select class="form-control" id="admin_id" name="admin_id" required>
                        @foreach ($adminList as $admin)
                            <option value="{{ $admin->id }}" {{ $admin->id == $data->admin_id ? 'selected' : '' }} >{{ $admin->nama }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('datajual.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection