@extends('layout')
@section('slider')
    @include('pages.layout.slider.slider')
@endsection
@section('content')
    <div class="col-sm-12 padding-right">
        @include('pages.layout.yacht.show_yachts')
        @include('pages.layout.tour.show_tours')
    </div>
@endsection
