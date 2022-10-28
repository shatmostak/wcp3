@extends('BASE.base')
@section('content')
<br><br>
    <div class="container mt-5 text-center">
        <h3>Import</h3>
        <br /><br /><br />
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <br><br>
                @if ($company)
                    <h4> This import is for {{$company}}, right?</h4>
                    <br><br>
                    <form action={{ route( 'confirm-company' ) }} method="POST" enctype="multipart/form-data" contentType='application/json' id='companyconfirm'>
                        @csrf
                        <button class="btn btn-danger btn-rounded" type="submit" name="import" value="import">Yes, Begin Import</button>
                        <button class="btn btn-secondary btn-rounded" type="submit" name="cancel" value="cancel">No, Company is Incorrect</button>
                    </form>
                @elseif ($nocompany)
                    <h4> which vendor is this for?</h4>
                    <div class="choose">
                    <form action={{ route( 'file-import' )}} method="POST" enctype="multipart/form-data" contentType='application/json' id='companyselect'>
                        @csrf
                        <select name="company" id="company" style="font-size:19px !important;">
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
                        </select>
                        <button class="btn btn-danger btn-rounded" id='choose' type="submit" name="choose" value="choose">Proceed</button>
                    </div>
                    <br/><br/>
                    <h6>or</h6>
                    <div class="custom">
                        <button class="btn btn-dark btn-rounded" id='custom' type="submit" name="custom" value="custom">Not in List / Custom Upload</button>

                    </form>
                    <br/><br/>
                    <h6>or</h6>
                    <form enctype="multipart/form-data" action={{ route( 'importhome' )  }}>
                        <button class="btn btn-dark btn-rounded" id='home' type="submit" name="home" value="home">Start Over</button>
                    </form>
                @endif

                <br><br>


            </div>
        </div>
    </div>
@endsection


