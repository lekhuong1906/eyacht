@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Image Gallery
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
                    @foreach($edit_images as $edit_image)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-user/'.$edit_image->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image Gallery Name</label>
                                    <input type="text" name='image_name' class="form-control" id="exampleInputEmail1" value="{{$edit_image->image_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Yacht name</label>
                                    <select class="form-control input-sm m-bot15" name="yacht_id">
                                        @foreach($yachts as $yacht)
                                            <option value="{{$yacht->yacht_id}}">{{$yacht->yacht_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image Gallery</label>
                                    <input type="file" name='image' class="form-control" id="exampleInputEmail1" value="{{$edit_image->image}}">
                                </div>

                                <button type="submit" name='update_image' class="btn btn-info">Update Image</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection
