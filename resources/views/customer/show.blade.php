@extends('master')
@section('title', 'Customer Show')
@push('css')
    <style>
        #map {
            height: 400px;
        }
    </style>
@endpush
@section('content')
    <div id="map"></div>
    <a href="{{ route('customer.index') }}" type="button" class="btn btn-primary my-2">Back</a>

@endsection
@push('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var app = {{ Js::from($customers) }};
            var mylatlng = {
                lat: 23.819107560342403,
                lng: 90.48129855392969
            }
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: mylatlng,
            });
            for (var i = 0; i < app.length; i++) {
                new google.maps.Marker({
                    position: new google.maps.LatLng(app[i].latitude, app[i].longitude),
                    map: map
                });
            }
        });
    </script>
@endpush
