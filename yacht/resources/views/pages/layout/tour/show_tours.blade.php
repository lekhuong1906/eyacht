<div class="features_items"><!--features_items-->
    <h2 class="title text-center">TOUR LIST</h2>
    @foreach($tour as $key => $tour)
        @if($tour->tour_status)
        <a href="{{URL::to('/tour-detail/'.$tour->id)}}">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{url('public/uploads/tours/'.$tour->tour_image)}}" height="150" alt=""/>
                            <h2>{{(number_format($tour->tour_price).'$')}}</h2>
                            <p>{{$tour->tour_name}}</p>
                            <a href="{{URL::to('/tour-detail/'.$tour->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-book">
                                </i>Detail
                            </a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </a>
        @endif
    @endforeach
</div><!--features_items-->
