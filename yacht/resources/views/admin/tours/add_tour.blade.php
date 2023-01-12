@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Tour
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
                        <form role="form" action="{{URL::to('/save-tour')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tour name</label>
                                <input type="text" name='tour_name' class="form-control" id="exampleInputEmail1" placeholder="Tour name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">From</label>
                                <select class="form-control input-sm m-bot15" name="from">
                                    @foreach ($marina as $value)
                                        <option value="{{$value->id}}">{{$value->marina_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">To</label>
                                <select class="form-control input-sm m-bot15" name="to">
                                    @foreach ($marina as $value)
                                        <option value="{{$value->id}}">{{$value->marina_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tour describe</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="tour_describe" placeholder="Tour describe"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select class="form-control input-sm m-bot15" name="tour_status">
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tour Price</label>
                                <input type="text" class="form-control" name="tour_price" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tour Image</label>
                                <input type="file" class="form-control" name="tour_image" id="exampleInputEmail1">
                            </div>

                            <button type="submit" name='add_tour' class="btn btn-info">Add Tour</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
