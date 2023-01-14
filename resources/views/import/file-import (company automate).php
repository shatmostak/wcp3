@extends('BASE.base')
@section('content')

<br><br>
    <div class="container mt-5 text-center">
        <h3>Import</h3>
        <br />
        <br />
        <div class="row">
            <div class="col-md-1">red?</div>
            <div class="col-md-10">
                <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" Content-Type='application/json' id='fileUploadForm'>
                    @csrf
                    <input class="form-control" type ="file" id="file" name="uploadFile" accept=".xls, .xslx, .tsv, .csv" />
                    <br /><br />
                    <button class="btn btn-danger btn-rounded" type="submit" name="import">Import</button>
                </form>
            </div>
        </div>
    </div>
@endsection


