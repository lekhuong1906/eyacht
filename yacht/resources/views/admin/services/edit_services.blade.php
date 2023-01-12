@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Service List
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
                    @foreach($edit_services as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-services/'.$edit_value->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service name</label>
                                    <input type="text" value="{{$edit_value->service_name}}" name='service_name' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service price</label>
                                    <input type="text" value="{{$edit_value->service_price}}" name='service_price' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Service status </label>
                                    <select class="form-control input-sm m-bot15" name="service_status">
                                        <option value="{{$edit_value->service_status}}" hidden="true">
                                            @if($edit_value->service_status)
                                                Active
                                            @else
                                                UnActive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">UnActive</option>
                                    </select>
                                </div>

                                <button type="submit" name='update_service' class="btn btn-info">Update Service</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection
