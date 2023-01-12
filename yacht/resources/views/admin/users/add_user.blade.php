@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add User
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
                        <form role="form" action="{{URL::to('/save-user')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">User name</label>
                                <input type="text" name='user_name' class="form-control" id="exampleInputEmail1" placeholder="User name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User card</label>
                                <input type="text" name='user_card' class="form-control" id="exampleInputEmail1" placeholder="User card">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User phone</label>
                                <input type="text" name='user_phone' class="form-control" id="exampleInputEmail1" placeholder="User phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="User phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name='password' class="form-control" id="exampleInputEmail1" placeholder="User phone">
                            </div>
                            <button type="submit" name='add_user' class="btn btn-info">Add User</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
