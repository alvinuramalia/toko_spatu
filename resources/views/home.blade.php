@extends('layouts.main')

@section('container')

<div class="mx-auto">
    <br>
        <h4 style="text-align:center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><strong> Halo, {{ $nama }} </strong> <br><br> <em>Selamat Datang di Website rekap penjualan sepatu</em></h4> 
       
</div>
<br>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset('img/spatu1.jpg') }}" alt="Deskripsi Gambar" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset('img/spatu2.jpg') }}" alt="Deskripsi Gambar" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset('img/spatu3.jpg') }}" alt="Deskripsi Gambar" class="img-fluid">
            </div>
        </div>
    </div>

</div>

<div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    
</div>


@endsection