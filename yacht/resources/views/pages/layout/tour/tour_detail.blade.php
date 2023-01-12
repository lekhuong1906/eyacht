@extends('layout')
@section('content')
    <div class="product-details"><!--product-details-->
        @foreach($tours as $tour)
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{url('public/uploads/tours/'.$tour->tour_image)}}" alt=""/>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                    <h2>{{$tour->tour_name}}</h2>
                    <p>Web ID: {{$tour->id}}</p>
                    <form action="{{URL::to('/book-tour/'.$tour->id)}}" method="get">
                        @csrf
                        <span>
                        <span>{{number_format($tour->tour_price).'$'}}</span></span>
                        <p><b>Describe:</b> {{$tour->tour_describe}} </p>
                        <p><b>From:</b> {{$tour->from_marina->marina_name}} </p>
                        <p><b>To:</b> {{$tour->to_marina->marina_name}} </p>
                        <a href=""><img src=""
                                        class="share img-responsive"
                                        alt=""/></a>
                        <button type="submit" class="btn btn-default cart">
                            Booking Now
                        </button>
                    </form>

            </div><!--/product-information-->
        </div>
        @endforeach
    </div><!--/product-details-->


    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/recommend1.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>--}}
    </div><!--/recommended_items-->
@endsection
