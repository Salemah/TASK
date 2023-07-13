@extends('master')
@section('title', 'Customer Create')
@section('content')

    <div class="container">
        <h1>Create</h1>
        <a href="{{ route('customer.index') }}" type="button" class="btn btn-primary my-2">Back</a>
        <form action="{{ route('customer.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12  mb-2">
                                    <label for="name"><b>Name</b><span class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        id="name"class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Enter Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12  mb-2">
                                    <label for="mobile"><b>Mobile</b><span class="text-danger">*</span></label>
                                    <input type="number" name="mobile"
                                        id="mobile"class="form-control @error('mobile') is-invalid @enderror"
                                        value="{{ old('mobile') }}" placeholder="Enter mobile">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12  mb-2">
                                    <label for="address"><b>Address</b><span class="text-danger">*</span></label>
                                    <input type="text" name="address"
                                        id="address"class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" placeholder="Enter Address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6  mb-2">
                                    <label for="lattitude"><b>Lattitude</b></label>
                                    <input id="lat" type="text" name="latitude"
                                        id="lattitude"class="form-control @error('lattitude') is-invalid @enderror"
                                        value="{{ old('lattitude') }}" placeholder="Enter lattitude">
                                    @error('lattitude')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6  mb-2">
                                    <label for="longitude"><b>Longitude</b></label>
                                    <input id="lng" type="text" name="longitude"
                                        id="longitude"class="form-control @error('longitude') is-invalid @enderror"
                                        value="{{ old('longitude') }}" placeholder="Enter longitude">
                                    @error('longitude')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div id="map" style="height:400px; width: 800px;" class="my-3"></div>

                                <script>
                                    let map;

                                    function initMap() {
                                        map = new google.maps.Map(document.getElementById("map"), {
                                            center: {
                                                lat: 23.80805140332605,
                                                lng: 90.4175778591866
                                            },
                                            zoom: 8,
                                            scrollwheel: true,
                                        });

                                        const uluru = {
                                            lat: 23.80805140332605,
                                            lng: 90.4175778591866
                                        };
                                        let marker = new google.maps.Marker({
                                            position: uluru,
                                            map: map,
                                            draggable: true
                                        });

                                        google.maps.event.addListener(marker, 'position_changed',
                                            function() {
                                                let lat = marker.position.lat()
                                                let lng = marker.position.lng()
                                                $('#lat').val(lat)
                                                $('#lng').val(lng)
                                            })

                                        google.maps.event.addListener(map, 'click',
                                            function(event) {
                                                pos = event.latLng
                                                marker.setPosition(pos)
                                            })
                                    }
                                </script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>


    </div>
@endsection
