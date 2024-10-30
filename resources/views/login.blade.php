@extends('layouts.main')

@section('container')

<div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="card" style="max-width: 500px; width: 100%; align-content: flex-start;">
        <div class="card-body">
            <br>
            
            @if(session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @elseif(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form  action="{{ route('actionlogin')}}" method="post">
                @csrf
                <div class="col-md-12">
                    <label for="validationDefault01" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                </div>
                <br>
                <div class="col-md-12">
                    <label for="validationDefault81" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                    <br>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection