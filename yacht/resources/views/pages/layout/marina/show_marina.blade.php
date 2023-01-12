@extends('layout')
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">YACHT LIST</h2>
            @foreach($histories as $key => $history)
                @if($history->yachts->yacht_status)
                    <a href="{{URL::to('/yacht-detail/'.$history->yacht_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img
                                            src="{{url('/public/uploads/'.$history->yachts->images[0]->image_gallery)}}"
                                            height="150px" alt=""/>
                                        <h2>{{(number_format($history->yachts->yacht_price).'$')}}</h2>
                                        <p>{{$history->yachts->yacht_name}}</p>
                                        <a href="{{URL::to('/yacht-detail/'.$history->yacht_id)}}"
                                           class="btn btn-default add-to-cart"><i class="fa fa-book"></i>Detail</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a/>
                @endif
            @endforeach
        </div><!--features_items-->
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">TOUR LIST</h2>
            @foreach($tours as $tour)
                @if($tour->tour_status)
                    <a href="{{URL::to('/tour-detail/'.$tour->id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="" alt=""/>
                                        <h2>{{(number_format($tour->tour_price).'$')}}</h2>
                                        <p>{{$tour->tour_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Detail</a>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a/>
                @endif
            @endforeach
        </div><!--features_items-->
    </div>
@endsection
