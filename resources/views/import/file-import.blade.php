@extends('BASE.base')
@section('content')

<style>
    .import-header {
        color:white !important;
        font-size: 20px;
    }

</style>
<br><br>
    <div class="container mt-5 text-center">
            <h3>Import</h3>
            <br><br><br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data" contentType='application/json' id='fileUploadForm'>
                        @csrf
                        <div class="form-group" >
                            <div class="d-md-inline" >
                                <select name="company" id="company" style="font-size:19px !important;">
                                    {{-- working --}}
                                    <option value="none" selected disabled hidden >Select Company</option>
                                    <option value="amerex">Amerex</option>
                                    <option value="azbattery">Az Battery</option>
                                    <option value="badger">Badger</option>
                                    <option value="bavco">Bavco</option>
                                    <option value="brecco">Brecco</option>
                                    <option value="buckeye">Buckeye</option>
                                    <option value="farenhyt-silver">Farenhyt Silver</option>
                                    <option value="farenhyt-gold">Farenhyt Gold</option>
                                    <option value="ferguson">Ferguson</option>
                                    <option value="gamewell-gold">Gamewell Gold</option>
                                    <option value="gamewell-silver">Gamewell Silver</option>
                                    <option value="pyrochem">Pyrochem</option>
                                    <option value="rangeguard">Range Guard</option>
                                    <option value="siemens">Siemens</option>
                                    <!-- !MATT! ]
                                    hughes company pdf still not readable-->
                                    <!-- <option style="font-family:verdana bold !important; font-style:oblique !important;" class='userinput' value="userinput">custom upload</option> -->
                                </select>
                                <br><br>
                                <input class="form-control" type="file" id="formFile" name="file">
                                <br><br>

                                <button class="btn btn-danger btn-rounded" name="import">Import</button>



                    </form>

                

                @endsection