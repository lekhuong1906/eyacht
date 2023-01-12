@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    LEASES DETAIL
                </header>
                {{ $message = Session::get('message') }}
                @if($message)
                    {{ Session::put('message', null) }}
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @if(count($errors->all()) > 1)
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @else
                                {{ $errors->all()[0] }}
                            @endif
                        </ul>
                    </div><br/>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/export-leases/'.$leases->id)}}" method="get">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputPassword1">Rent registration name</label>
                                <input type="text" name='rent_registration_code' class="form-control"
                                       value="{{$leases->rent_registrations->rent_regis_name}}"
                                       id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer name</label>
                                <input type="text" name="customer_name"
                                       value="{{$leases->rent_registrations->customers->customer_name}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer phone</label>
                                <input type="text" name="customer_phone"
                                       value="{{$leases->rent_registrations->customers->customer_phone}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer card</label>
                                <input type="text" name="customer_card"
                                       value="{{$leases->rent_registrations->customers->customer_card}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Marina</label>
                                <input type="text" name="marina_name"
                                       value="{{$leases->rent_registrations->yachts->histories->marinas->marina_name}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Yacht name</label>
                                <input type="text" name="yacht_name"
                                       value="{{$leases->rent_registrations->yachts->yacht_name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Yacht price</label>
                                <input type="text" name="yacht_price"
                                       value="{{$leases->rent_registrations->yachts->yacht_price}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tour name</label>
                                <input type="text" name="service_name"
                                       value="{{$leases->rent_registrations->tours->tour_name}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tour price</label>
                                <input type="text" name="service_price"
                                       value="{{$leases->rent_registrations->tours->tour_price}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service name</label>
                                <input type="text" name="service_name"
                                       value="{{$leases->rent_registrations->services->service_name}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service price</label>
                                <input type="text" name="service_price"
                                       value="{{$leases->rent_registrations->services->service_price}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rental date</label>
                                <input type="text" name="rental_date" value="{{$leases->rent_registrations->rental_date}}"
                                       name='leases_price' class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rental hours</label>
                                <input type="text" name="rental_hours" value="{{$leases->rent_registrations->rental_hours}}"
                                       name='leases_price' class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Leases price</label>
                                <input type="text" name="leases_price" value="{{$leases->leases_price}}"
                                       name='leases_price' class="form-control" id="exampleInputEmail1">
                            </div>
                            <button type="submit" name='export_to_pdf' class="btn btn-success">Export to PDF</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
