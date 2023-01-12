@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Leases List
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
                    @foreach($edit_leases as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-leases/'.$edit_value->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Leases code</label>
                                    <input type="text" value="{{$edit_value->leases_code}}" name='leases_price' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rent registration code</label>
                                    <select class="form-control input-sm m-bot15" name="rent_registration_id">
                                        @foreach($rent_regis as $key => $rent_regis)
                                            <option value="{{$rent_regis->id}}">{{$rent_regis->rent_registration_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Leases price</label>
                                    <input type="text" value="{{$edit_value->leases_price}}" name='leases_price' class="form-control" >
                                </div>
                                <button type="submit" name='update_leases' class="btn btn-info">Update Leases</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection
