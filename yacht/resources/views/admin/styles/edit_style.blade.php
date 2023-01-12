@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Update Customer List
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
                    @foreach($edit_style as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-style/'.$edit_value->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Yacht style </label>
                                    <input type="text" value="{{$edit_value->style_yacht}}" name='style_yacht' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Engine</label>
                                    <input type="text" value="{{$edit_value->engine}}" name='engine' class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Area</label>
                                    <input type="text" value="{{$edit_value->area}}" name='area' class="form-control" >
                                </div>

                                <button type="submit" name='update_style' class="btn btn-info">Update Style</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

@endsection
