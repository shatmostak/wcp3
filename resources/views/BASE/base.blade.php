@php
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <!-- Styles -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
    </style>

</head>

<body>
    <!-- Image and text -->

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary " style="position:fixed; top:0px; width:100%;">
    <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/images/icons8-warehouse-96.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                <img src="{{ asset('/images/icons8-purchase-for-euro-48.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                    Warehouse Cost Project
            </a>
        <div class="navbar-nav ms-auto">
            {{-- <a href="/cost" class="nav-item mr-auto nav-link table-header">Price Table</a> --}}
            <a href="{{ route('importhome') }}" class="nav-item mr-auto nav-link import-header">Import</a>
        </div>
    </div>
</nav>
<div class="belowheaders">
    @yield('content')

<!-------------------------------------------------------------------------------->

@yield('dbshow')
</div>

</body>

</html>
