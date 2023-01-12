@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update User List
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
                    @foreach($edit_user as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-user/'.$edit_value->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer name</label>
                                    <input type="text" value="{{$edit_value->user_name}}" name='user_name' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer card</label>
                                    <input type="text" value="{{$edit_value->user_card}}" name='user_card' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer phone</label>
                                    <input type="text" value="{{$edit_value->user_phone}}" name='user_phone' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer phone</label>
                                    <input type="email" value="{{$edit_value->email}}" name='email' class="form-control" >
                                </div>


                                <button type="submit" name='update_customer' class="btn btn-info">Update User</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection
