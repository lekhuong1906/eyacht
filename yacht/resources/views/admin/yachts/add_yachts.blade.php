@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add yacht
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
                        <form role="form" action="{{URL::to('/save-yachts')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Yacht name</label>
                                <input type="text" name='yacht_name' class="form-control" id="exampleInputEmail1" placeholder="yacht_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Style </label>
                                <select class="form-control input-sm m-bot15" name="style_id">
                                        <option value="" hidden="true">Select one</option>
                                    @foreach ($style as $key => $style)
                                        <option value="{{$style->id}}">{{$style->style_yacht}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Marina</label>
                                <select class="form-control input-sm m-bot15" name="marina_id">
                                    <option value="" hidden="true">Select one</option>
                                    @foreach ($marina as $key => $marina)
                                        <option value="{{$marina->id}}">{{$marina->marina_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Yacht number plate</label>
                                <input type="text" name='yacht_number_plate' class="form-control" id="exampleInputEmail1" placeholder="yacht_number_plate">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Yacht price</label>
                                <input type="text" name='yacht_price' class="form-control" id="exampleInputEmail1" placeholder="yacht_price">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select class="form-control input-sm m-bot15" name="yacht_status">
                                    <option value="1">Active</option>
                                    <option value="0">Unactive</option>
                                </select>
                            </div>
                            <button type="submit" name='add_yachts' class="btn btn-info">Add yacht</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
