@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Tour
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
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-tour/'.$tour->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour name</label>
                                    <input type="text" value="{{$tour->tour_name}}" name='tour_name' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour describe</label>
                                    <input type="text" value="{{$tour->tour_describe}}" name='tour_describe' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">From </label>
                                    <select class="form-control input-sm m-bot15" name="from">
                                        <option value="{{$tour->from}}" hidden="true">{{$tour->from_marina->marina_name}}</option>
                                        @foreach ($marinas as  $marina)
                                            <option value="{{$marina->id}}">{{$marina->marina_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">From </label>
                                    <select class="form-control input-sm m-bot15" name="to">
                                        <option value="{{$tour->to}}" hidden="true">{{$tour->to_marina->marina_name}}</option>
                                        @foreach ($marinas as $marina)
                                            <option value="{{$marina->id}}">{{$marina->marina_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour price</label>
                                    <input type="text" value="{{$tour->tour_price}}" name='tour_price' class="form-control" >
                                </div>

                                <button type="submit" name='update_tour' class="btn btn-info">Update Tour</button>
                            </form>
                        </div>
                </div>
            </section>

        </div>
    </div>

@endsection
