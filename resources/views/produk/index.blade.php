@extends('layouts.main')

@section('container')

    <h3 style="text-align:center;">Data Produk</h3>
    <div class="row align-items-center">
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInput">Input Data Produk </button> 
        </div>
        <div class="col">

        </div>
        <div class="col">
            <form action="{{ route('produk.index') }}" method="GET" class="d-flex">
                <input class="form-control me-2" placeholder="Masukkan Nama Produk" value="{{ request('cari') }}" name="cari" id="cari" type="text">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>
    </div>


    
            <!-- Modal input-->
            <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="modalInput" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalInput">Input Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div>
                                <div class="modal-body">
                                <form method="POST" action="{{ route('produk.store') }}" method="POST" class="row g-3">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label class="form-label">Produk :</label>
                                            <input type="text" class="form-control" id="produk" name="produk" value="" required> 
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label class="form-label">Harga :</label>
                                            <input type="number" class="form-control" id="harga" name="harga" required> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-12" mt-2>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="tombol" value="Save">Simpan</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                 
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $key => $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->produk }}</td>
                    <td>Rp. {{number_format($d->harga, 2 ,',','.') }}</td>
                 
                    <td style="text-align:center;">

                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{$key}}">Edit</button>
                       {{-- modal edit --}}
                        <div class="modal fade" id="modalEdit{{$key}}" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEdit">Edit Data Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body modal-edit">
                                            <form method="POST" action="{{route('produk.update')}}" class="row g-3">
                                                @csrf
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <label class="form-label">Produk :</label>
                                                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $d->id }}" required> 
                                                        <input type="text" class="form-control" id="produk" name="produk" value="{{ $d->produk }}" required> 
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <label class="form-label">Harga :</label>
                                                        <input type="number" class="form-control" id="harga" name="harga" value="{{ $d->harga }}" required> 
                                                    </div>
                                                </div>
                                               
                                                <div class="col-12" mt-2>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary" name="tombol" value="Save">Simpan</button>
                                                </div>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{$key}}">Hapus</button> 
                        {{-- modal hapus --}}
                        <div class="modal fade" id="modalDelete{{$key}}" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDelete">Hapus Data Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body modal-hapus">
                                        <h6 style="text-align:center; font-family:''; ">Apakah anda yakin ingin menghapus data <strong>{{ $d->produk }}</strong> pada data Produk ?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('produk.destroy', $d->id )}}" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                        
                </tr>
                @endforeach

            </tbody>
            </table>

            {{ $produk->links('pagination::bootstrap-5')  }}
  
            
@endsection
