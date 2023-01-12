@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Rent Registration List
                </header>

                {{$message = Session::get('message')}}
                @if($message)
                    {{Session::put('message',null)}}
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
                    @foreach($edit_rent as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-services/'.$edit_value->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rent registration name</label>
                                    <input type="text" name='rent_registration_name' value="{{$edit_value->rent_regis_name}}" class="form-control" id="exampleInputEmail1" placeholder="rent_registration_name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Service</label>
                                    <select class="form-control input-sm m-bot15" name="service_id" >
                                        <option value="{{$edit_value->services->id}}" hidden="=true">{{$edit_value->services->service_name}}</option>
                                        @foreach ($service as $key => $service)
                                            <option value="{{$service->id}}">{{$service->service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">User</label>
                                    <select class="form-control input-sm m-bot15" name="user_id" value="{{$edit_value->user_id}}">
                                        <option value="{{$edit_value->user_id}}" hidden="true">{{$edit_value->users->user_name}}</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->user_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Customer</label>
                                    <select class="form-control input-sm m-bot15" name="customer_id" >
                                        <option value="{{$edit_value->customers->id}}" hidden="=true">{{$edit_value->customers->customer_name}}</option>
                                        @foreach ($customer as $key => $customer)
                                            <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Yacht</label>
                                    <select class="form-control input-sm m-bot15" name="yacht_id"  >
                                        <option value="{{$edit_value->yachts->id}}" hidden="=true">{{$edit_value->yachts->yacht_name}}</option>
                                        @foreach ($yacht as $key => $yacht)
                                            <option value="{{$yacht->id}}"> {{$yacht->yacht_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rental date</label>
                                    <input type="date" name='rental_date' class="form-control" id="exampleInputEmail1" value="{{$edit_value->rental_date}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rental hours</label>
                                    <input type="text" name='rental_hours' class="form-control" id="exampleInputEmail1" value="{{$edit_value->rental_hours}}">
                                </div>

                                <button type="submit" name='update_service' class="btn btn-info">Update Rent Registration</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection
