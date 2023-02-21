@extends('BASE.base')
@section('datatables')
<style>
    .datatables-header {
        color:white !important;
        font-size: 20px;
    }
</style>
<div id="hide" class="hide" style="visibility:hidden; position: fixed; height: 100%; width: 100%; top:0; left: 0; background: #000; z-index:9999;">




<script>
    $(document).on('load', function() {
        $("#hide").hide();
    });

    $(document).ready(function() {
        document.getElementsByClassName(".hide")[0].style.visibility = "visible";
    });

    window.addEventListener('load', function () {
        document.getElementsByTagName("html")[0].style.visibility = "visible";
    });
    $(document).ready(function () {
        $('#datatables').DataTable({
            order: [[3, 'desc']],
        });
    });
</script>
<br><br>
<br><br>
<div class="col-md-1"></div>
<div class="col-md-10">
    <div>
        <table id="datatables" class="display compact">
            <thead>
                <tr>
                <th style="width:15%;">company</th>
                <th style="width:15%;">item code</th>
                <th style="width:35%;">item</th>
                <th style="width:10%;">item cost</th>
                <th style="width:5%;">qty</th>
                <th style="width:10%;">cost type</th>
                <th style="width:10%;">unit cost</th>
                </tr>
            </thead>
            <tbody>
            @if ($data)
                @foreach ($data as $line)
                <tr>
                    <td>{{$line->company}}</td>
                    <td>{{$line->item_code}}</td>
                    <td class="compact">{{$line->item}}</td>
                    <td>${{$line->item_cost}}</td>
                    <td>{{$line->quantity}}</td>
                    <td>{{$line->cost_type}}</td>
                    <td>${{$line->unit_cost}}</td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    </div>

</div>


@endsection