@extends('layouts.main')

@section('container')

    <h3 style="text-align:center;">Data Admin</h3>
    <div class="row align-items-center">
        <div class="col">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInput">Input Data Admin </button> 
        </div>
        <div class="col">

        </div>
        <div class="col">
            <form action="{{ route('admin.index') }}" method="GET" class="d-flex">
                <input class="form-control me-2" placeholder="Masukkan Nama Admin" value="{{ request('cari') }}" name="cari" id="cari" type="text">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>
    </div>


    
            <!-- Modal input-->
            <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="modalInput" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalInput">Input Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div>
                                <div class="modal-body">
                                <form method="POST" action="{{ route('admin.store') }}" method="POST" class="row g-3">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label class="form-label">Nama :</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="" required> 
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label class="form-label">Telephone :</label>
                                            <input type="number" class="form-control" id="telephone" name="telephone" required> 
                                        </div>
                                    </div>
                                    <div class="row" mt-2>
                                        <div class="col">
                                            <label class="form-label">Alamat :</label>
                                            <textarea class="form-control" name="alamat" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row" mt-2>
                                        <div class="col">
                                            <label class="form-label">Shift :</label>
                                            <select class="form-control" name="shift" id="shift">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                            {{-- <input type="number" class="form-control" id="shift" name="shift" required> --}}
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
                    <th>Nama</th>
                    <th>Telephone</th>
                    <th>Alamat</th>
                    <th>Shift</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admin as $key => $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->telephone }}</td>
                    <td>{{ $d->alamat }}</td>
                    <td>{{ $d->shift}}</td>
                    <td style="text-align:center;">

                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{$key}}">Edit</button>
                       {{-- modal edit --}}
                        <div class="modal fade" id="modalEdit{{$key}}" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEdit">Edit Data Admin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body modal-edit">
                                            <form method="POST" action="{{route('admin.update')}}" class="row g-3">
                                                @csrf
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <label class="form-label">Nama :</label>
                                                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $d->id }}" required> 
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $d->nama }}" required> 
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col">
                                                        <label class="form-label">Telephone :</label>
                                                        <input type="number" class="form-control" id="telephone" name="telephone" value="{{ $d->telephone }}" required> 
                                                    </div>
                                                </div>
                                                <div class="row" mt-2>
                                                    <div class="col">
                                                        <label class="form-label">Alamat :</label>
                                                        <textarea class="form-control" name="alamat" id="" cols="30" rows="10">{{ $d->alamat }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row" mt-2>
                                                    <div class="col">
                                                        <label class="form-label">Shift :</label>
                                                        <select class="form-control" name="shift" id="shift">
                                                            <option value="1" {{ $d->shift == 1 ? 'selected' : ''  }}>1</option>
                                                            <option value="2" {{ $d->shift == 2 ? 'selected' : ''  }}>2</option>
                                                        </select>
                                                        {{-- <input type="number" class="form-control" id="shift" name="shift" value="{{ $d->shift }}" required> --}}
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
                                    <h5 class="modal-title" id="modalDelete">Hapus Data Admin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body modal-hapus">
                                        <h6 style="text-align:center; font-family:''; ">Apakah anda yakin ingin menghapus data <strong>{{ $d->nama }}</strong> pada data Admin ?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="nodelete" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('admin.destroy', $d->id )}}" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                        
                </tr>
                @endforeach

            </tbody>
            </table>

            {{ $admin->links('pagination::bootstrap-5')  }}
  
            
@endsection