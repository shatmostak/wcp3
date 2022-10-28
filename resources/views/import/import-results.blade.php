@extends('import.file-import')
@section('results')
    {{--results--}}
    <h4 class='datastatus'>{{$datastatus}}</h4>
    <br><br>
    <a class="btn btn-outline-danger btn-rounded shadow" href="{{ url('import-home') }}">accept and return to import</a>
    <br><br>
        {{-- db view --}}
                <div class=well>
                    <div class=panel-body>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class = "thead-dark">
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
                                </thead>

                                <tbody>
                                @if ($dbview)
                                    @foreach ($dbview as $dbrow)
                                    <tr>
                                        <td>{{$dbrow->company}}</td>
                                        <td>{{$dbrow->item_code}}</td>
                                        <td>{{$dbrow->item_code_2}}</td>
                                        <td>{{$dbrow->item}}</td>
                                        <td>{{$dbrow->item_cost}}</td>
                                        <td>{{$dbrow->quantity}}</td>
                                        <td>{{$dbrow->cost_type}}</td>
                                        <td>{{$dbrow->unit_cost}}</td>

                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif



                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            

@endsection

