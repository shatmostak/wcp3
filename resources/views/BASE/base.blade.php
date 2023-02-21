<!DOCTYPE html>
<head>
<php>
<!-- ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); -->
</php>

    <meta charset="utf-8">
    <title>wcp</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <!-- css -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    
    <!-- bootstrap -->
    <link href="{{ asset('/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- <linnpk href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <!-- javascript -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.2/datatables.min.js"></script>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
    </style>

</head>

<body>
    <!-- Image and text -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary " style="position:fixed; top:0px; width:100%; background:black; z-index:6">
    <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('importhome') }}"> 
                <img src="{{ asset('/images/icons8-warehouse-96.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                <img src="{{ asset('/images/icons8-purchase-for-euro-48.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                Warehouse Cost Project
            </a>
        <div class="navbar-nav ms-auto">
            <!-- <a href="#" class="nav-item mr-auto nav-link table-header">Create Quote</a> -->
            <a href="{{ route('make-list') }}" class="nav-item mr-auto nav-link price-header">View Prices</a>
            <a href="{{ route('importhome') }}" class="nav-item mr-auto nav-link import-header">Import</a>
            <a href="{{ route('exporthome') }}" class="nav-item mr-auto nav-link export-header">Export</a> 
            <a href="{{ route('datatables') }}" class="nav-item mr-auto nav-link datatables-header">DataTables</a> 

            <a href="{{ url('../adminer-4.8.1-mysql.php?db=test&username=root&select=costs') }}" class="nav-item mr-auto nav-link admin-header">Admin</a>
        </div>
    </div>
    </nav>
        <div class="belowheaders">
            @yield('content')
            @yield('viewcosts')
            @yield('results')
            @yield('view-admin')
            @yield('datatables')
        </div>
    </body>

</html>
