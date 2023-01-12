@extends('admin_layout');
@section('admin_content');
<link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Customer list
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
                    <th>Customer name</th>
                    <th>Customer card</th>
                    <th>Customer phone</th>
                    <th>Customer email</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($all_customers as $ikey => $customer)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_card}}</td>
                        <td>{{'+(84) '.$customer->customer_phone}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td><span class="text-ellipsis"></span></td>
                        <td>
                            <a href="{{URL::to('/edit-customers/'.$customer->id)}}" class="active" ui-toggle-class="">
                                <i class=" fa fa-pencil-square-o text-danger text" ></i></a>
                            <a onclick="return confirm('Are you sure you want to delete this customer?')" href="{{URL::to('/delete-customers/'.$customer->id)}}" class="active" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">

                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    {!! $all_customers->appends(\Illuminate\Support\Facades\Request::all())->links('vendor.pagination.default') !!}
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
