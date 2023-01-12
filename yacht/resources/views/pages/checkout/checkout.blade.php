<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
            margin: 10px 250px 0 250px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #FE980F;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #FF9966;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<section>
    <h2 class="text-center">Responsive Checkout Form</h2>
    <p></p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
            {{ Session::put('success',null)}}
        </div>
    @endif

    <div class="row">
        <div class="col-50">
            <div class="container">
                <form action="{{URL::to('payment/'.$leases->id)}}" method="post">
                    @csrf()
                    <div class="row">{{--
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname"
                                   placeholder="{{$leases->rent_registrations->customers->customer_name}}">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email"
                                   placeholder="{{$leases->rent_registrations->customers->customer_email}}">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                            </div>
                        </div>--}}

                        <div class="col-50">
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                </div>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="card_name" placeholder="NGUYEN VAN A">
                                <label for="cnum">Credit card number</label>
                                <input type="text" id="cnum" name="card_number" placeholder="1111-2222-3333-4444">
                                <label for="exp_month">Exp Month</label>
                                <input type="text" id="exp_month" name="exp_month" placeholder="September">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="exp_year">Exp Year</label>
                                        <input type="text" id="exp_year" name="exp_year" placeholder="2018">
                                    </div>
                                    <div class="col-50">
                                        <label for="cvc">CVC</label>
                                        <input type="text" id="cvc" name="cvc" placeholder="352">
                                    </div>
                                </div>
                                <input type="hidden" value="{{$leases->leases_price}}" name="amount">
                        </div>
                    </div>
                    <button type="submit" class="btn">Continue to checkout</button>
            </div>
        </div>
        <div class="col-30">
            <div class="container">
                <div class="product-information"><!--/product-information-->

                    <h2>{{$leases->rent_registrations->rent_registration_name}}</h2>

                    <p><b>Yacht name:</b> {{$leases->rent_registrations->yachts->yacht_name}} </p>
                    <p><b>Yacht price:</b> {{number_format($leases->rent_registrations->yachts->yacht_price).'$'}}</p>
                    <p><b>Tour name:</b> {{$leases->rent_registrations->tours->tour_name}} </p>
                    <p><b>Tour price:</b> {{number_format($leases->rent_registrations->tours->tour_price).'$'}}</p>
                    <p><b>Service name:</b> {{$leases->rent_registrations->services->service_name}} </p>
                    <p><b>Service price:</b> {{number_format($leases->rent_registrations->services->service_price).'$'}}
                    </p>
                    <p><b>Rental date:</b> {{$leases->rent_registrations->rental_date}}</p>
                    <p><b>Rental hours:</b> {{$leases->rent_registrations->rental_hours. 'h'}}</p>
                    <hr>
                    <p><b>Total:</b> {{number_format($leases->leases_price). '$'}}</p>
                </div><!--/product-information-->
            </div>
        </div>
    </div>
</section>
</body>
</html>
