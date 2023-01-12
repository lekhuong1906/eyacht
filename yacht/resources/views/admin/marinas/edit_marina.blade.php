@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Marina List
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
                    @foreach($edit_marina as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-marina/'.$edit_value->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Marina name</label>
                                    <input type="text" value="{{$edit_value->marina_name}}" name='marina_name' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Marina address</label>
                                    <input type="text" value="{{$edit_value->marina_address}}" name='marina_address' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lng</label>
                                    <input type="text" value="{{$edit_value->lng}}" name='lng' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat</label>
                                    <input type="text" value="{{$edit_value->lat}}" name='lat' class="form-control" >
                                </div>

                                <button type="submit" name='update_marina' class="btn btn-info">Update Marina</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection
