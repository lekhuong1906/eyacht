@extends('admin_layout');
@section('admin_content');
<link rel="stylesheet" href="{{asset('public/backend/css/custom.css')}}">
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            History Mooring
        </div>
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById("googleMap"), {
                        center: {lat: 10.77387, lng: 106.706932},
                        zoom: 15,
                    });

                    var dataMap = @json($dataMap);
                    for (var i = 0; i < dataMap.length; i++) {
                        var latLng = {lat: dataMap[i].lat, lng: dataMap[i].lng}
                        var marker = new google.maps.Marker({
                            position: latLng,
                            title: dataMap[i].yacht,
                            map: map,
                        })
                    }
                }

                google.maps.event.addDomListener(window, 'load', initMap);
            </script>

            <div class="center-block map " id="googleMap"></div>

    </div>

    {{--<footer class="panel-footer">
        <div class="row">
            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm"></small>
            </div>
            <div class="col-sm-7 text-right text-center-xs">
            </div>
        </div>
    </footer>--}}
</div>


@endsection
