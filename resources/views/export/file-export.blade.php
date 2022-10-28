@extends('BASE.base')
@section('content')
<br><br>
<br><br>
<style>
    .export-header {
        color:white !important;
        font-size: 20px;
    }
</style>
            <h2>
                @yield('results')
            </h2>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3>Export</h3><br><br>
                    <form
                    {{-- action="{{ route('file-export') }}"  --}}
                    method="POST" enctype="multipart/form-data" id=''>
                        @csrf
                        <div class="form-group">
                                <select name="records" id="records">
                                    {{-- working --}}
                                    <option value="none" selected disabled hidden># of records</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="500">500</option>
                                    <option value="all">All</option>

                                    {{-- in progress --}}


                                    {{-- to do
                                    <option value="kidde">kidde (gwfci?)</option>
                                    <option value="rangeguard">raneguard</option>
                                                --}}
                                </select>
                                <button class="btn btn-danger btn-rounded shadow" id="export-button" name="export">Export</button>

                            </div>
                        </div>
                        <br><br>

                        {{-- BUTTONS --}}

                        {{-- <a href="{{ route('template') }}" button class="btn btn-outline-dark btn-rounded shadow"
                            name="newTemplate">new company template</a><br><br> --}}
                        {{-- <a href="" button class="btn btn-outline-secondary btn-rounded shadow" name="dl-form"
                            download="{{ asset('cost_update_template.xlsx') }}">download fillable xlsx</a><br><br>
                        <a class="btn btn-outline-danger btn-rounded shadow" href="{{ route('recent-db-updates') }}"> recent updates</a> --}}
                    </form>

                </div>
            </div>
                @yield('dbshow')
                    </div>
                @endsection
