@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add style
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
                        <form role="form" action="{{URL::to('/save-style')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Yacht style</label>
                                <input type="text" name='style_yacht' class="form-control" id="exampleInputEmail1" placeholder="yacht_style">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Engine</label>
                                <input type="text" name='engine' class="form-control" id="exampleInputEmail1" placeholder="Engine">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Area</label>
                                <input type="text" name='area' class="form-control" id="exampleInputEmail1" placeholder="Area">
                            </div>
                            <button type="submit" name='add_category_product' class="btn btn-info">Add customer</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
