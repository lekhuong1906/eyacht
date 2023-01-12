@extends('layout')
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Style Yacht</h2>
            @foreach($yachts as $key => $yacht)
                @if($yacht->yacht_status)
                    <a href="{{URL::to('/yacht-detail/'.$yacht->id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{url('/public/uploads/'.$yacht->images[0]->image_gallery)}}"
                                             height="150px" alt=""/>
                                        <h2>{{(number_format($yacht->yacht_price).'$')}}</h2>
                                        <p>{{$yacht->yacht_name}}</p>
                                        <a href="{{URL::to('/yacht-detail/'.$yacht->id)}}"
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
    </div>
@endsection
