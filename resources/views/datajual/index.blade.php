@extends('layouts.main')

@section('container')

    <h3 style="text-align:center;">Data Penjualan</h3>
    <div class="row align-items-center">
        <div class="col">
            <a href="{{ route('datajual.create') }}" type="button" class="btn btn-primary">Input Data Penjualan </a> 
        </div>
        <div class="col">

        </div>
        <div class="col">
            <form action="{{ route('datajual.index') }}" method="GET" class="d-flex">
                <input class="form-control me-2" placeholder="Masukkan Customer" value="{{ request('cari') }}" name="cari" id="cari" type="text">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>
    </div>
    
    <br>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

           {{-- <br> --}}
           <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Costumer</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>QTY</th>
                    <th>Total Harga</th>
                    <th>Admin</th>
                 
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datajual as $key => $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('d F Y') }}</td>
                    <td>{{ $d->costumer }}</td>
                    <td>{{ $d->produk->produk }}</td>
                    <td>Rp. {{ number_format($d->produk->harga, 2,',','.') }}</td>
                    <td>{{ $d->jumlah }}</td>
                    <td>Rp. {{number_format($d->produk->harga * $d->jumlah , 2 ,',','.') }}</td>
                    <td>{{ $d->admin->nama }}</td>
                 
                    <td style="text-align:center;">

                        <a href="{{ route('datajual.edit', $d->id) }}" type="button" class="btn btn-success btn-sm">Edit</a>
                        <a href="{{ route('datajual.show', $d->id) }}" type="button" class="btn btn-warning btn-sm">Lihat</a>
 
                        <a data-bs-toggle="modal" data-bs-target="#modalDelete{{$key}}" type="button" class="btn btn-danger btn-sm">Hapus</a> 

                        <div class="modal fade" id="modalDelete{{$key}}" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDelete">Hapus Data Penjualan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body modal-hapus">
                                        <h6 style="text-align:center; font-family:''; ">Apakah anda yakin ingin menghapus data <strong>{{ $d->costumer }}</strong> pada data penjualan ?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('datajual.destroy', $d->id) }}" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                        
                </tr>
                @endforeach

            </tbody>
            </table>
           </div>

            {{ $datajual->links('pagination::bootstrap-5')  }}
  
            
@endsection
