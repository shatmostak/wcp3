@extends('BASE.base')
@section('dbshow')
    <br><br>
    <div class="container mt-5 text-center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="d-md-inline">
                <h2> Price Table </h2>
                    <div class="card-body">
                    <br><br>
                    <div class=panel-body>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr class="tableheaders">
                                    <th scope="col">company</th>
                                    <th scope="col">item code</th>
                                    <th scope="col">alt code</th>
                                    <th scope="col">item</th>
                                    <th scope="col">item cost</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">cost type</th>
                                    <th scope="col">unit cost</th>
                                </tr>
                            @foreach ($data as $line)
                            <tr>
                                <td>{{$data->company}}</td>
                                <td>{{$data->item_code}}</td>
                                <td>{{$data->item_code_2}}</td>
                                <td>{{$data->item}}</td>
                                <td>{{$data->item_cost}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>{{$data->cost_type}}</td>
                                <td>{{$data->unit_cost}}</td>

                            </tr>
                                @endforeach
                        </table>
                        </div>
                    </div>

                    </div>
            </div>
        </div>
</div>
        <div class="col-md-1"></div>
    @endsection
