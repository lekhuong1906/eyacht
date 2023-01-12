@extends('admin_layout')
@section('admin_content')
    <!-- //market-->
    <div class="market-updates">
        <div class="col-md-2 market-update-gd">
            <div class="market-update-block clr-block-2">
                {{--<div class="col-md-4 market-update-right">
                    <i class="fa fa-eye"> </i>
                </div>--}}
                <div class="col-md-8 market-update-left">
                    <h4>{{'$'.$counts['sales']}}</h4>
                    <h5>Total<br>Sales</h5>
                    <p></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-2 market-update-gd">
            <div class="market-update-block clr-block-1">
                {{--<div class="col-md-4 market-update-right">
                    <i class="fa fa-users"></i>
                </div>--}}
                <div class="col-md-8 market-update-left">
                    <h4>{{'$'.$counts['revenue']}}</h4>
                    <h5>Total Revenue</h5>
                    <p></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-2 market-update-gd">
            <div class="market-update-block clr-block-3">
                {{--<div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>--}}
                <div class="col-md-8 market-update-left">
                    <h4>xxx</h4>
                    <h5>Amount of Access</h5>
                    <p></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-2 market-update-gd">
            <div class="market-update-block clr-block-4">
                {{--<div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>--}}
                <div class="col-md-8 market-update-left">
                    <h4>{{$counts['rent_regis']}}</h4>
                    <h5>Total Registration</h5>
                    <p></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-2 market-update-gd">
            <div class="market-update-block clr-block-5">
                {{--<div class="col-md-4 market-update-right">
                    <i class="fa fa-eye"> </i>
                </div>--}}
                <div class="col-md-8 market-update-left">
                    <h4>{{$counts['leases']}}</h4>
                    <h5>Total Contract</h5>
                    <p></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-2 market-update-gd">
            <div class="market-update-block clr-block-6">
                {{--<div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>--}}
                <div class="col-md-8 market-update-left">
                    <h4>{{$counts['customer']}}</h4>
                    <h5>Customer Account</h5>
                    <p></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <!-- //market-->
    <!-- tasks -->

    <div class="agile-last-grids">
        @include('admin.dashboard.charts')
    </div>
    <div class="clearfix"></div>


    <!-- //tasks -->
    <div class="agileits-w3layouts-stats">
        <div class="col-md-4 stats-info widget">
            <div class="stats-info-agileits">
                <div class="stats-title">
                    <h4 class="title">Yacht</h4>
                </div>
                <div class="stats-body">
                    <ul class="list-unstyled">
                        @foreach($array_yacht as $yacht)
                            <li>{{$yacht['name']}}<span class="pull-right">{{$yacht['percent']}}</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar {{$yacht['color']}}" style="width:{{$yacht['percent']}}%;"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 stats-info widget">
            <div class="stats-info-agileits">
                <div class="stats-title">
                    <h4 class="title">Tour</h4>
                </div>
                <div class="stats-body">
                    <ul class="list-unstyled">
                        @foreach($array_tour as $tour)
                            <li>{{$tour['name']}}<span class="pull-right">{{$tour['percent']}}</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar {{$tour['color']}}" style="width:{{$tour['percent']}}%;"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 stats-info widget">
            <div class="stats-info-agileits">
                <div class="stats-title">
                    <h4 class="title">Service</h4>
                </div>
                <div class="stats-body">
                    <ul class="list-unstyled">
                        @foreach($array_service as $service)
                        <li>{{$service['name']}}<span class="pull-right">{{$service['percent']}}</span>
                            <div class="progress progress-striped active progress-right">
                                <div class="bar {{$service['color']}}" style="width:{{$service['percent']}}%;"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
   {{-- <div class="agileits-w3layouts-stats">
        <div class="col-md-8 stats-info stats-last widget-shadow">
            <div class="stats-last-agile">
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>PRODUCT</th>
                        <th>STATUS</th>
                        <th>PROGRESS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-success">In progress</span></td>
                        <td><h5>85% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Aliquam</td>
                        <td><span class="label label-warning">New</span></td>
                        <td><h5>35% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-danger">Overdue</span></td>
                        <td><h5 class="down">40% <i class="fa fa-level-down"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Aliquam</td>
                        <td><span class="label label-info">Out of stock</span></td>
                        <td><h5>100% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Lorem ipsum</td>
                        <td><span class="label label-success">In progress</span></td>
                        <td><h5 class="down">10% <i class="fa fa-level-down"></i></h5></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Aliquam</td>
                        <td><span class="label label-warning">New</span></td>
                        <td><h5>38% <i class="fa fa-level-up"></i></h5></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>--}}

@endsection

