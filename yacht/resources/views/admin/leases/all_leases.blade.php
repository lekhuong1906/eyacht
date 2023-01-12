@extends('admin_layout');
@section('admin_content');
<link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Lease list
        </div>
        <div class="row w3-res-tb">
            <form action="" method="GET">
                <div class="col-sm-3 m-b-xs">
                    <label>Yacht</label>
                    <select class="input-sm form-control w-sm inline v-middle" name="yacht">
                        @foreach($all_yacht as $key => $all_yacht)
                            <option value="" hidden="true">Yacht</option>
                            <option value="{{$all_yacht->id}}">{{$all_yacht->yacht_name}}</option>
                        @endforeach
                    </select>
                </div>

                {{--<div class="col-sm-2 m-b-xs">
                    <label>Customer</label>
                    <select class="input-sm form-control w-sm inline v-middle" name="yacht">
                        @foreach($customers as $customer)
                            <option value="" hidden="true">Customer</option>
                            <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                        @endforeach
                    </select>
                </div>--}}

                <div class="col-sm-3 m-b-xs">
                    <label>Service</label>
                    <select class="input-sm form-control w-sm inline v-middle" name="service">
                        @foreach($all_service as $key => $all_service)
                            <option hidden="true" value="">Service</option>
                            <option value="{{$all_service->id}}">{{$all_service->service_name}}</option>
                        @endforeach
                    </select>
                    {{--<button class="btn btn-sm btn-default" type="submit">Search</button>--}}
                </div>

                <div class="col-sm-3 m-b-xs">
                    <label>Marina</label>
                    <select class="input-sm form-control w-sm inline v-middle" name="service">
                        @foreach($marinas as $marina)
                            <option hidden="true" value="">Marina</option>
                            <option value="{{$marina->id}}">{{$marina->marina_name}}</option>
                        @endforeach
                    </select>
                </div>

                {{--<div class="col-sm-2 m-b-xs">
                    <label>Tour</label>
                    <select class="input-sm form-control w-sm inline v-middle" name="service">
                        @foreach($tours as $tour)
                            <option hidden="true" value="">Tour</option>
                            <option value="{{$tour->id}}">{{$tour->tour_name}}</option>
                        @endforeach
                    </select>
                </div>--}}

                <div class="col-sm-3">
                    <div class="form-inline">
                        <input type="text" class="input-sm form-control" name="search" placeholder="Search">
                        <button class="btn btn-sm btn-default" type="submit">Search</button>
                    </div>
                </div>



            </form>
        </div>
        <div class="table-responsive">

            {{$message=Session::get('message')}}
            @if($message)
                {{Session::put('message', null) }}
            @endif

            <table class="table table-striped b-t b-light" content="">
                <thead>
                <tr>

                    <th>Customer name</th>
                    <th>Yacht name</th>
                    <th>Marina</th>
                    <th>Tour name</th>
                    <th>Service name</th>
                    <th>Leases price</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($all_leases as  $leases)
                    <tr>

                        <td>{{$leases->rent_registrations->customers->customer_name}}</td>
                        <td>{{$leases->rent_registrations->yachts->yacht_name}}</td>
                        <td>{{$leases->rent_registrations->yachts->histories->marinas->marina_name}}</td>
                        <td>{{$leases->rent_registrations->tours->tour_name}}</td>
                        <td>{{$leases->rent_registrations->services->service_name}}</td>
                        <td>{{$leases->leases_price.' $'}}</td>
                        <td><span class="text-ellipsis"></span></td>
                        <td>
                            <a href="{{URL::to('/edit-leases/'.$leases->id)}}" class="active" ui-toggle-class="">
                                <i class=" fa fa-pencil-square-o text-danger text" ></i></a>
                            <a onclick="return confirm('Are you sure you want to delete this leases?')" href="{{URL::to('/delete-leases/'.$leases->id)}}" class="active" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                            <a href="{{URL::to('/leases-detail/'.$leases->id)}}" class="active"
                               ui-toggle-class="">
                                <i class="fa fa-external-link text-danger text"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm"></small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!! $all_leases->appends(\Illuminate\Support\Facades\Request::all())->links('vendor.pagination.default') !!}

                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
