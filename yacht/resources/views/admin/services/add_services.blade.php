@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add services
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
                        <form role="form" action="{{URL::to('/save-services')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Services name</label>
                                <input type="text" name='service_name' class="form-control" id="exampleInputEmail1" placeholder="Services name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Services price</label>
                                <input type="text" name='service_price' class="form-control" id="exampleInputEmail1" placeholder="Service price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Service status </label>
                                <select class="form-control input-sm m-bot15" name="service_status">
                                    <option value="1">Active</option>
                                    <option value="0">UnActive</option>
                                </select>
                            </div>
                            <button type="submit" name='add_category_product' class="btn btn-info">Add services</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
