<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Codeline Backend Office</title>

        <link rel="stylesheet" href="/backend/vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/backend/vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/backend/vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="/backend/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="/backend/vendors/selectFX/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="/backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    
        <link rel="stylesheet" href="assets/css/style.css">        

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    </head>
    <body>

        <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="/"> <i class="menu-icon fa fa-dashboard"></i>Codeline Hotel </a>
                        </li>
                        <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Room Manager</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="/admin/room-manager/create">Create Rooms</a></li>
                                <li><i class="fa fa-table"></i><a href="/admin/room-manager">manage Rooms</a></li>
                            </ul>                           
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Room Type Manager</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-table"></i><a href="{{ route('room-type-manager.create') }}">Create Room Type</a></li>
                                <li><i class="fa fa-table"></i><a href="{{ route('room-type-manager.index') }}">Manage Room Type</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Price List Manager</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="{{ route('price-list-manager.create') }}">Create Price</a></li>
                                <li><i class="menu-icon fa fa-th"></i><a href="{{ route('price-list-manager.index') }}">Manage Price</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Booking Manager</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="menu-icon fa fa-th"></i><a href="{{ route('booking-manager.create') }}">Create Booking</a></li>
                                <li><i class="menu-icon fa fa-th"></i><a href="{{ route('booking-manager.index') }}">Manage Booking</a></li>
                            </ul>
                        </li>                        
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </aside><!-- /#left-panel -->        

        <div id="right-panel" class="right-panel">

                <!-- Header-->
                <header id="header" class="header">
        
                    <div class="header-menu">
        
                        <div class="col-sm-7">
                            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                            <div class="header-left">
                                <button class="search-trigger"><i class="fa fa-search"></i></button>
                                <div class="form-inline">
                                    <form class="search-form">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                    </form>
                                </div>
        
                            </div>
                        </div>
        
                        <div class="col-sm-5">
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" src="/images/admin.jpg" alt="User Avatar">
                                </a>
        
                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i> Logout
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                        
                                    {{-- <a class="nav-link" href="#"><i class="fa fa-power-off"></i> Logout</a> --}}
                                </div>
                            </div>
        
                            <div class="language-select dropdown" id="language-select">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                                    <i class="flag-icon flag-icon-us"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="language">
                                    <div class="dropdown-item">
                                        <span class="flag-icon flag-icon-fr"></span>
                                    </div>
                                    <div class="dropdown-item">
                                        <i class="flag-icon flag-icon-es"></i>
                                    </div>
                                    <div class="dropdown-item">
                                        <i class="flag-icon flag-icon-us"></i>
                                    </div>
                                    <div class="dropdown-item">
                                        <i class="flag-icon flag-icon-it"></i>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
        
                </header><!-- /header -->
                <!-- Header-->
        
                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="content mt-3">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif                    

                    {{-- <div class="content mt-3"> --}}
                        @yield('content')
                    {{-- </div> --}}
                </div> <!-- .content -->
            </div><!-- /#right-panel -->        

            
            <script src="/backend/vendors/jquery/dist/jquery.min.js"></script>
            <script src="/backend/vendors/popper.js/dist/umd/popper.min.js"></script>
            <script src="/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="/backend/assets/js/main.js"></script>
        
        
            <script src="/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="/backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
            <script src="/backend/vendors/jszip/dist/jszip.min.js"></script>
            <script src="/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
            <script src="/backend/vendors/pdfmake/build/vfs_fonts.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
            <script src="/backend/assets/js/init-scripts/data-table/datatables-init.js"></script>            

        </div>
    </body>
</html>