@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Image Gallery
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
                        <form role="form" action="{{URL::to('/save-image-gallery')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image Name</label>
                                <input type="text" name='image_name' class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Yacht name</label>
                                <select class="form-control input-sm m-bot15" name="yacht_id">
                                    @foreach($yacht as $key => $yacht)
                                    <option value="{{$yacht->id}}">{{$yacht->yacht_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" name='image' class="form-control" id="exampleInputEmail1">
                            </div>
                            <button type="submit" name='add_image_gallery' class="btn btn-info">Add Image</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
