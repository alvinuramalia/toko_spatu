<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
    <style>
        
        .bg-blue {
            background-color: #C4DFDF; 
        }

       
        .navbar-brand, .nav-link {
            font-size: 1.2rem; 
            font-family: 'Garamond', sans-serif;
        }
       
        .container {
            font-family: 'Garamond', sans-serif;
            font-size: 1.1rem;
            max-width: 1100px;
            color: #333; 
        }
        
       
        body {
            font-family: 'Garamond', sans-serif;
            font-size: 1.1rem;
            background-color: #F8F6F4;
            color: #333;
        }

      
        .nav-link {
            color: #000;
        }

        .nav-link:hover {
            color: #0056b3;
        }

        .modal-content {
            font-size: 1.1rem; 
            font-family: 'Garamond', sans-serif; 
        }
    
     
        .modal-title {
            font-size: 1.2rem; 
            font-weight: bold;
        }
    
        .modal-body .form-label,
        .modal-body .form-control,
        .modal-body textarea,
        .modal-body select {
            font-size: 1.1rem;
        }
    
        .modal-body .row,
        .modal-footer {
            margin-top: 0.5rem;
        }
    

        .modal-footer .btn {
            font-size: 1.1rem; 
            padding: 0.3rem 0.75rem; 
        }
    
       
        .modal-header .btn-close {
            padding: 0.5rem;
        }
    
       
        .modal-header,
        .modal-body,
        .modal-footer {
            padding: 1rem; 
        }
    
     
        .modal-dialog {
            max-width: 500px; 
        }

        
    .modal-edit {
        text-align: left; 
        font-size: 1.1rem; 
        font-weight: bold;
        
    }

    

    </style>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><strong>Toko Sepatu</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ $title == 'Home' ? 'active' : '' }}" aria-current="page" href="{{route('admin.home')}}">Home</a>
                        </li>
                        <li>
                            <a class="nav-link {{ $title == 'produk' ? 'active' : '' }}" aria-current="page" href="{{route('produk.index')}}">Data Produk</a>
                        </li>
                        <li>
                            <a class="nav-link {{ $title == 'admin' ? 'active' : '' }}" aria-current="page" href="{{route('admin.index')}}">Data Admin</a>
                        </li>
                        <li>
                            <a class="nav-link {{ $title == 'datajual' ? 'active' : '' }}" aria-current="page" href="{{route('datajual.index')}}">Data Penjualan</a>
                        </li>
                        <li>
                            <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#modallogout" >Log Out</a>
                        </li>                      
                        <div class="modal fade" id="modallogout" tabindex="-1" aria-labelledby="modallogout" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modallogout">Logout</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>
                                    <div class="modal-body">
                                        <h5 style="text-align:center">Apakah anda yakin ingin logout ?</h5>
                                    </div>
                                    <div class="modal-footer">
                                    <button id="cancel" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Batal</button>
                                    <a href="{{route('actionlogout')}}" class="btn btn-primary">Ya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    @endif
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('container')
    </div>
</body>
</html>
