@extends('BASE.base')
@section('content')

{{-- <style>
    .import-header {
        color:white !important;
        font-size: 20px;
    }
</style> --}}

<script>
    function sConsole(event) {
        // event.preventDefault();
        var data = document.getElementById("file");
        $phpdata = data;
        console.log(data.value);
    }
</script>

<br><br>
    <div class="container mt-5 text-center">
        <h3>Import</h3>

        <br />
        <br />
        <br />

        @yield('results')
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form action="{{ route('fileimport') }}"  onsubmit="sConsole(event)" method="POST" enctype="multipart/form-data" contentType='application/json' id='fileUploadForm'>
                    <input class="form-control" type ="file" id="file" name="file" />

                    <br />
                    <br />

                    <button class="btn btn-danger btn-rounded" type="submit" name="import">Import</button>
                </form>
                @yield('confirm')
@endsection


