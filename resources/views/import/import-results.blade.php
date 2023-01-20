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
                <table id="tg-dDTF2" class="table table-striped table-hover table-sm">
                        <thead class = "thead-dark">
                            <tr class="tableheaders">
                                <th scope="col">company</th>
                                <th scope="col">code</th>
                                <th scope="col">item</th>
                                <th scope="col">cost</th>
                                <th scope="col">quantity</th>
                                <th scope="col">cost type</th>
                                <th scope="col">per unit cost</th>

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

