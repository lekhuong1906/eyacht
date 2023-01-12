@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add customer
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
                        <form role="form" action="{{URL::to('/save-customers')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer name</label>
                                <input type="text" name='customer_name' class="form-control" id="exampleInputEmail1" placeholder="Customer name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer card</label>
                                <input type="text" name='customer_card' class="form-control" id="exampleInputEmail1" placeholder="Customer card">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer phone</label>
                                <input type="text" name='customer_phone' class="form-control" id="exampleInputEmail1" placeholder="Customer phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name='customer_email' class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" name='customer_password' class="form-control" id="exampleInputEmail1" placeholder="Password">
                            </div>
                            <button type="submit" name='add_customer' class="btn btn-info">Add customer</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
