@extends('layout')
@section('content')
        <div class="container">
            <div class="row">
                {{$message=Session::get('message')}}
                @if($message)
                    {{Session::put('message',null)}}
                @endif
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Profile</h2>
                        <form action="" method="post">
                            @csrf
                            <div class="form-group" >
                                <label for="customer_name">Name</label>
                                <input type="text" name="customer_name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="customer_phone" placeholder="Phone" />
                            </div>
                            <div class="form-group">
                                <label>Card</label>
                                <input type="number" name="customer_card" placeholder="Card" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="customer_email" placeholder="Email Address" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="customer_password" placeholder="Password" />
                            </div>
                        </form>
                        <div>
                            <button type="submit" class="btn btn-default">Logout</button>
                        </div>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
@endsection
