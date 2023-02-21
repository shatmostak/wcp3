@extends('BASE.base')
@section('results')
<style>
    .price-header {
        color:white !important;
        font-size: 20px;
    }
</style>
<br><br>
<br><br>
<div class="container text-center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="d-md-inline">
    <h4 class='datastatus'>{{$datastatus}}</h4>
    <br><br>
    <a class="btn btn-outline-danger btn-rounded shadow" href="{{ route('importhome') }}">accept and return to import</a>
    <br><br>
        <div class=well>
            <div class=panel-body>
            <style type="text/css">
                .pagination {text-align:center;}
                #tg-dDTF2 {table-layout:fixed;}
                .ulist li {display:inline-block;}
                .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
                .tg td{font-family:Arial, sans-serif;font-size:14px; overflow:hidden;padding:10px 5px;word-break:normal;}
                .tg th{font-family:Arial, sans-serif;font-size:14px; font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                .tg .tg-ul38{position:static;text-align:left;top:-1px;vertical-align:middle;will-change:transform}
                .tg .tg-0lax{text-align:left;vertical-align:middle}
                .tg-sort-header::-moz-selection{background:0 0}
                .tg-sort-header::selection{background:0 0}.tg-sort-header{cursor:pointer}
                .tg-sort-header:after{content:'';float:right;margin-top:7px;visibility:hidden}
                .tg-sort-header:hover:after{visibility:visible}r
                th {white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
                td {white-space: nowrap; overflow: hidden; text-overflow: ellipsis;}
                .tg-sort-asc:after,.tg-sort-asc:hover:after,.tg-sort-desc:after{visibility:visible;opacity:.4}
                .tg-sort-desc:after{border-bottom:none;}@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
            </style>
                <table id="tg-dDTF2" class="table table-striped table-hover table-sm">
                        <thead class="table-success">
                            <tr class="tableheaders">
                                <th style="width:15%;" class="tg-ul38">company</th>
                                <th style="width:15%;" class="tg-ul38">item code</th>
                                <th style="width:35%;" class="tsvag-ul38">item</th>
                                <th style="width:10%;" class="tg-ul38 currency">item cost</th>
                                <th style="width:5%;" class="tg-ul38">qty</th>
                                <th style="width:10%;" class="tg-ul38">cost type</th>
                                <th style="width:10%;" class="tg-ul38 currency">unit cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($dbview)
                                @foreach ($dbview as $line)
                                <tr>
                                    <td class="tg-0lax">{{$line->company}}</td>
                                    <td class="tg-0lax">{{$line->item_code}}</td>
                                    <td class="tg-0lax">{{$line->item}}</td>
                                    <td class="tg-0lax">${{$line->item_cost}}</td>
                                    <td class="tg-0lax">{{$line->quantity}}</td>
                                    <td class="tg-0lax">{{$line->cost_type}}</td>
                                    <td class="tg-0lax">${{$line->unit_cost}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

