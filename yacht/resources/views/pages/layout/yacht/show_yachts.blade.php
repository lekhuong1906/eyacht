<div class="features_items" ><!--features_items-->
    <h2 class="title text-center">New Yachts</h2>
    @foreach($yacht as $key => $yacht)
        @if($yacht->yacht_status)
        <a href="{{URL::to('/yacht-detail/'.$yacht->id)}}">
            <div class="col-sm-3" style="display: inline-block">
                <div class="product-image-wrapper">
                    <div class="single-products" style="">
                        <div class="productinfo text-center" style="height: 100%;display:block;">
                            <img src="{{url('/public/uploads/yachts/'.$yacht->thumbnail)}}" style="z-index: 1;height: 150px" alt=""/>

                            <h2>{{(number_format($yacht->yacht_price).'$')}}</h2>
                            <p>{{$yacht->yacht_name}}</p>
                            <a href="{{URL::to('/yacht-detail/'.$yacht->id)}}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-book">
                                </i>Detail
                            </a>
                        </div>
                        {{--<div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{number_format($yacht->yacht_price).'$'}}</h2>
                                <p>{{$yacht->yacht_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </a>
        @endif
    @endforeach
</div><!--features_items-->
