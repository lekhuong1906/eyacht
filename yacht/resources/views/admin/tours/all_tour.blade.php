@extends('admin_layout');
@section('admin_content');
<link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Tour list
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>

                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">

            {{$message=Session::get('message')}}
            @if($message)
                {{Session::put('message', null) }}
            @endif


            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Tour name</th>
                    <th>Tour describe</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Tour price</th>
                    <th>Tour Image</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tours as $tour)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$tour->tour_name}}</td>
                        <td>{{$tour->tour_describe}}</td>
                        <td>{{$tour->from_marina->marina_name}}</td>
                        <td>{{$tour->to_marina->marina_name}}</td>
                        <td>
                            @if($tour->tour_status)
                                <i>Open</i>
                            @else
                                <i>Close</i>
                            @endif
                        </td>
                        <td>{{$tour->tour_price. '$'}}</td>
                        <td><img src="{{asset('public/uploads/tours/'.$tour->tour_image)}}" height="100" width="100"></td>
                        <td><span class="text-ellipsis"></span></td>
                        <td>
                            <a href="{{URL::to('/edit-tour/'.$tour->id)}}" class="active" ui-toggle-class="">
                                <i class=" fa fa-pencil-square-o text-danger text" ></i></a>
                            <a onclick="return confirm('Are you sure you want to delete this user?')" href="{{URL::to('/delete-tour/'.$tour->id)}}" class="active" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm"></small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    {!! $tours->appends(\Illuminate\Support\Facades\Request::all())->links('vendor.pagination.default') !!}
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
