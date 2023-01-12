@extends('admin_layout');
@section('admin_content');
<link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Yacht list
        </div>
        {{$message=Session::get('message')}}
        @if($message)
            {{Session::put('message', null) }}
        @endif
        <div class="row w3-res-tb">
            <form action="" method="GET">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">

            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="width:20px;">
                        <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                        </label>
                    </th>
                    <th>Yacht name</th>
                    <th>Style</th>
                    <th>Number plate</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>History mooring</th>
                    <th style="width:40px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($all_yacht as $key => $yacht)
                    <tr>

                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>

                        <td>{{$yacht->yacht_name}}</td>
                        <td>{{$yacht->styles->style_yacht}}</td>
                        <td>{{$yacht->yacht_number_plate}}</td>
                        <td>{{$yacht->yacht_price.' '.'$'}}</td>
                        <td>
                            @if($yacht->yacht_status)
                                <i>Active</i>
                            @else
                                <i>Unactive</i>
                            @endif

                        </td>
                        <td>{{$yacht->histories->marinas->marina_name}}</td>
                        <td><span class="text-ellipsis"></span></td>
                        <td>
                            <a href="{{URL::to('/edit-yachts/'.$yacht->id)}}" class="active" ui-toggle-class="">
                                <i class=" fa fa-pencil-square-o text-danger text"></i></a>
                            <a onclick="return confirm('Are you sure you want to delete this yacht?')"
                               href="{{URL::to('/delete-yachts/'.$yacht->id)}}" class="active" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                            <a href="{{URL::to('/update-history-mooring/'.$yacht->id)}}" class="active"
                               ui-toggle-class="">
                                <i class="fa fa-map-marker text-danger text"></i></a>
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
                    {!! $all_yacht->appends(\Illuminate\Support\Facades\Request::all())->links('vendor.pagination.default') !!}
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
