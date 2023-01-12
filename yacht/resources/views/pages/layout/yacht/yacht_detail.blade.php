@extends('layout')
@section('content')
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5" style="width: 50%">
            <div class="view-product">
                <!-- Carousel container -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators"><!-- Indicators -->
                        @for($i=0;$i<$images->count();$i++)
                        <li data-target="#myCarousel" data-slide-to="{{$i}}" class="{{$i==0 ? 'active' : ''}}"></li>
                        @endfor
                    </ol>

                    <div class="carousel-inner" role="listbox"><!-- Content -->
                        @foreach($images as $key => $image)
                        <div class="item {{$key==0 ? 'active' : ''}}">
                            <img src="{{url('public/uploads/yachts/'.$image->image)}}"  alt="">
                        </div>
                        @endforeach
                    </div>

                    <!-- Previous/Next controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="icon-prev" aria-hidden=""></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="icon-next" aria-hidden=""></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-7" style="width: 50%">
            <div class="product-information"><!--/product-information-->
                @foreach($yacht as $key => $yacht)
                    <img src="{{--{{asset('public/uploads/'.$yacht->images->image_gallery)}}--}}" class="newarrival"
                         alt=""/>
                    <h2>{{$yacht->yacht_name}}</h2>
                    <p>Web ID: {{$yacht->id}}</p>
                    <img src="{{--{{URL::to('public/uploads/'.$yacht->images->image_gallery)}}--}}" alt=""/>
                    <form action="{{URL::to('/book-yacht/'.$yacht->id)}}" method="get">
                        @csrf
                        <span>
                        <span>{{number_format($yacht->yacht_price).'$'}}</span>
                    </span>
                        <p><b>Style:</b> {{$yacht->styles->style_yacht}} </p>
                        <p><b>Area:</b> {{$yacht->styles->area.' m2'}} </p>
                        <p><b>Engine:</b> {{$yacht->styles->engine.' hp'}} </p>
                        <p><b>Number plate:</b> {{$yacht->yacht_number_plate}} </p>
                        <p><b>Marina:</b> {{$yacht->histories->marinas->marina_name}} </p>
                        <a href=""><img src="{{--{{URL::to('public/uploads/'.$yacht->images->image_gallery)}}--}}"
                                        class="share img-responsive"
                                        alt=""/></a>
                        <button type="submit" class="btn btn-fefault cart">
                            Booking Now
                        </button>
                    </form>
                @endforeach
            </div><!--/product-information-->
        </div>
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
            <i class="fa fa-angle-right"></i>--}}
        </a>
    </div><!--/recommended_items-->
@endsection
