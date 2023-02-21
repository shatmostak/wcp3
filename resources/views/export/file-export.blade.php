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

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3>Export</h3><br><br>
                    <form action="{{ route('export-pull') }}" method="POST" enctype="multipart/form-data" contentType='application/json' id='exportpull'>
                        @csrf
                        
                        Export Format
                        <br>
                        <input type="radio" name="format" checked
                        <?php if (isset($format) && $format=="import") echo "checked";?>
                        value="import">Import
                        <input type="radio" name="format"
                        <?php if (isset($format) && $format=="sql") echo "checked";?>
                        value="sql">SQL
                        <br>
                        # of records to export
                        <div class="form-group">
                                <select name="records" id="records">
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="5000">5000</option>
                                    <option value="20000">20000</option>
                                    <option value="null" selected>All</option>

                                </select>
                                <button class="btn btn-danger btn-rounded shadow" id="export-button" name="export">Export</button>

                            </div>
                        </div>
                        <br><br>
                     </form>
                    @if ($status)
                    <h4 class='status' style="text-align:center;">{{$status}}</h4>
                    @endif

                </div>
            </div>
                @yield('dbshow')
                    </div>
                @endsection
