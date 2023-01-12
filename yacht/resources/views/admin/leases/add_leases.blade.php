@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add leases
                </header>
                {{ $message = Session::get('message') }}
                @if($message)
                    {{ Session::put('message', null) }}
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @if(count($errors->all()) > 1)
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @else
                                {{ $errors->all()[0] }}
                            @endif
                        </ul>
                    </div><br/>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-leases')}}" method="post">
                            @csrf
                            @foreach($all_rents as $all_rent)
                            <div class="form-group">
                                <label for="exampleInputEmail1">Leases code</label>
                                <input type="text" name='leases_code' class="form-control" value="{{'HD'.random_int(1,200)}}" id="exampleInputEmail1" placeholder="leases_code">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Rent registration name</label>
                                <select class="form-control input-sm m-bot15" name="rent_regis_id">
                                        <option value="{{$all_rent->id}}">{{$all_rent->rent_regis_name}}</option>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer name</label>
                                    <input type="text" value="{{$all_rent->customers->customer_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer phone</label>
                                    <input type="text" value="{{$all_rent->customers->customer_phone}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Marina</label>
                                    <input type="text" value="{{$all_rent->yachts->histories->marinas->marina_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Yacht</label>
                                    <input type="text" value="{{$all_rent->yachts->yacht_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Yacht price</label>
                                    <input type="text" value="{{$all_rent->yachts->yacht_price}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour name</label>
                                    <input type="text" value="{{$all_rent->tours->tour_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour price</label>
                                    <input type="text" value="{{$all_rent->tours->tour_price}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service name</label>
                                    <input type="text" value="{{$all_rent->services->service_name}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service price</label>
                                    <input type="text" value="{{$all_rent->services->service_price}}" class="form-control">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Leases price</label>
                                <input type="text" value="{{$all_rent->yachts->yacht_price+ $all_rent->tours->tour_price + $all_rent->services->service_price}}" name='leases_price' class="form-control" id="exampleInputEmail1" >
                            </div>
                            <button type="submit" name='add_rent_registration' class="btn btn-info">Add Leases</button>
                            @endforeach
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
