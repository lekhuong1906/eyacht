@extends('layout')
@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        {{$message=Session::get('message')}}
                        @if($message)
                            {{Session::put('message',null)}}
                        @endif

                        <form action="{{URL::to('/customer-login')}}" method="post">
                            @csrf
                            <input type="email" placeholder="Email" name="customer_email" required />
                            <input type="password" placeholder="Password" name="customer_password" required/>
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Or</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{URL::to('/save-customer')}}" method="post" >
                            @csrf
                            <input type="text" name="customer_name" placeholder="Name" required/>
                            <input type="number" name="customer_phone" placeholder="Phone" required pattern="[-+]?[0-9]"/>
                            <input type="number" name="customer_card" placeholder="Card" required pattern="[-+]?[0-9]"/>
                            <input type="email" name="customer_email" placeholder="Email Address" required/>
                            <input type="password" name="customer_password" placeholder="Password" required/>
                            <button type="submit" class="btn btn-default">Sign up</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
