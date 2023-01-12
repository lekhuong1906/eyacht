@extends('admin_layout')
@section('admin_content')
    <link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Rent Registration list
            </div>
            <div class="row w3-res-tb">
                <form action="" method="GET">
                    <div class="col-sm-2 m-b-xs">
                        <label >Yacht</label>
                        <select class="input-sm form-control w-sm inline v-middle" name="yacht" id="yacht">
                            @foreach($all_yacht as $key => $all_yacht)
                                <option value="" hidden="true">Yacht</option>
                                <option value="{{$all_yacht->id}}">{{$all_yacht->yacht_name}}</option>
                            @endforeach
                        </select>
                        {{--<button class="btn btn-sm btn-default" type="submit">Search</button>--}}
                    </div>

                    <div class="col-sm-2 m-b-xs">
                        <label >Service</label>
                        <select class="input-sm form-control w-sm inline v-middle" name="service">
                            @foreach($all_service as $key => $all_service)
                                <option hidden="true" value="">Service</option>
                                <option value="{{$all_service->id}}">{{$all_service->service_name}}</option>
                            @endforeach
                        </select>
                        {{--<button class="btn btn-sm btn-default" type="submit">Search</button>--}}
                    </div>

                    <div class="col-sm-2">
                        <div class="">
                            <label>From</label>
                            <input type="date" class="input-sm form-control form-inline" name="from">
                        </div>
                        </div>
                    <div>
                        <div class="col-sm-2">
                            <label >To</label>
                            <input type="date" class="input-sm form-control form-inline" name="to">
                            {{--<button class="btn btn-sm btn-default" type="submit">Search</button>--}}
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-inline">
                            <label>Search</label>
                            <input type="text" class="input-sm form-control" name="search" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label></label>
                        <button class="btn btn-sm btn-default btn-block" type="submit">Search</button>

                    </div>

                </form>
            </div>
            <div class="table-responsive">

                {{$message=Session::get('message')}}
                @if($message)
                    {{Session::put('message', null) }}
                @endif

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Name</th>
                        <th>Tour name</th>
                        <th>Service</th>
                        <th>Yacht</th>
                        <th>Customer</th>
                        <th>Rental date</th>
                        <th>Rental hours</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_rent_registration as $key => $rent_registration)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                            </td>
                            <td>{{$rent_registration->rent_regis_name}}</td>
                            <td>{{$rent_registration->tours->tour_name}}</td>
                            <td>{{$rent_registration->services->service_name}}</td>
                            <td>{{$rent_registration->yachts->yacht_name}}</td>
                            <td>{{$rent_registration->customers->customer_name}}</td>
                            <td>{{$rent_registration->rental_date}}</td>
                            <td>{{$rent_registration->rental_hours.' h'}}</td>
                            <td><span class="text-ellipsis"></span></td>
                            <td>
                                <a href="{{URL::to('/edit-rent-registration/'.$rent_registration->id)}}" class="active"
                                   ui-toggle-class="">
                                    <i class=" fa fa-pencil-square-o text-danger text"></i></a>
                                <a onclick="return confirm('Are you sure you want to delete this rent registration?')"
                                   href="{{URL::to('/delete-rent-registration/'.$rent_registration->id)}}"
                                   class="active"
                                   ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i></a>
                                <a href="{{URL::to('/add-leases/'.$rent_registration->id)}}" class="active"
                                   ui-toggle-class="">
                                    <i class=" fa fa-external-link text-danger text"></i></a>
                            </td>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-5 text-left">
                        <form action="{{url('export-rent-regis')}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-success">Export To Excel</button>
                        </form>
                    </div>

                    <div class="col-sm-7 text-right text-center-xs">
                        {!! $all_rent_registration->appends(\Illuminate\Support\Facades\Request::all())->links('vendor.pagination.default') !!}
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection
