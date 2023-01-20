@extends('BASE.base')
@section('recent')
    <br><br>
    <div class="container text-center">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="d-md-inline">
            <br><br>
 

                <h2> Recent Item Costs </h2>


                <div class="card-body">
                    <br><br>
                    <div class=panel-body>
                        <div class="table-responsive">
                            <table style="width: 100%" id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr class="tableheaders">
                                    <th>Company</th>
                                    <th>Item Code</th>
                                    <th>Alt Code</th>
                                    <th>Item</th>
                                    <th>Item Cost</th>
                                    <th>Quantity</th>
                                    <th>Cost Type</th>
                                    <th>Unit Cost</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @if ($data)
                                        @foreach ($data as $line)
                                            <tr>
                                                <td>{{$line->company}}</td>
                                                <td>{{$line->item_code}}</td>
                                                <td>{{$line->item_code_2}}</td>
                                                <td>{{$line->item}}</td>
                                                <td>{{$line->item_cost}}</td>
                                                <td>{{$line->quantity}}</td>
                                                <td>{{$line->cost_type}}</td>
                                                <td>{{$line->unit_cost}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                            </tbody>
                            </table>

                                <!-- @foreach ($data as $line)
                                <tr>
                                    <td>{{$line->company}}</td>
                                    <td>{{$line->item_code}}</td>
                                    <td>{{$line->item_code_2}}</td>
                                    <td>{{$line->item}}</td>
                                    <td>{{$line->item_cost}}</td>
                                    <td>{{$line->quantity}}</td>
                                    <td>{{$line->cost_type}}</td>
                                    <td>{{$line->unit_cost}}</td>

                                </tr>
                                    @endforeach -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-1"></div>
                            
    </div>
    @endsection
