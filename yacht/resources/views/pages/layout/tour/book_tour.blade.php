@extends('layout')
@section('content')
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="booking-form">
                        <form action="{{URL::to('/save-rent')}}" method="post">
                            @csrf
                            <div>
                                <input type="hidden" name="rent_regis_name" value="HD {{rand(1,200)}}" />
                            </div>

                            <div>
                                <input type="hidden" name="user_id" value="1" />
                            </div>

                            <div class="form-group" >
                                <span class="form-label">Tour</span>
                                <select class="form-control" name="tour_id" required>
                                    <option  value="{{$tour->id}}">{{$tour->tour_name}}</option>
                                </select>
                                <span class="select-arrow"></span>
                            </div>

                            <div class="form-group">
                                    <span class="form-label" >Yacht name</span>
                                    <select class="form-control" name="yacht_id" required>
                                        <option value="" hidden="true">Select One</option>
                                        @foreach($histories as $key => $histories)
                                        <option value="{{$histories->yacht_id}}">{{$histories->yachts->yacht_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="select-arrow"></span>
                            </div>

                            <div class="form-group" >
                                <span class="form-label">Service</span>
                                <select class="form-control" name="service_id" required>
                                    <option value="" hidden="true">Select one</option>
                                    @foreach($service as $key => $service)
                                        <option  value="{{$service->id}}">{{$service->service_name}}</option>
                                    @endforeach
                                </select>
                                <span class="select-arrow"></span>
                            </div>
                            <div class="form-group" >
                                <span class="form-label">Rental date</span>
                                <input class="form-control" name="rental_date" type="date" required>
                            </div>
                            <div class="form-group" >
                                <span class="form-label">Rental hours</span>
                                <input class="form-control" name="rental_hours" type="text" placeholder="Enter your rental hours" required>
                            </div>
                            <button class="submit-btn">Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
