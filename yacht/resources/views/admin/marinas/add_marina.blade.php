@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">ADD MARINA</header>

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
                        <form role="form" action="{{URL::to('/save-marina')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Marina name</label>
                                <input type="text" name='marina_name' class="form-control" id="exampleInputEmail1" placeholder="Marina name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Marina address</label>
                                <input type="text" name='marina_address' class="form-control" id="exampleInputEmail1" placeholder="Marina address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lng</label>
                                <input type="text" name='lng' class="form-control" id="exampleInputEmail1" placeholder="106.72781">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lat</label>
                                <input type="text" name='lat' class="form-control" id="exampleInputEmail1" placeholder="10.72514">
                            </div>
                            <button type="submit" name='add_marina' class="btn btn-info">Add Marina</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
