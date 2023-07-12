<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <h1>Create</h1>
        <form action="{{ route('customer.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12  mb-2">
                                    <label for="name"><b>Name</b><span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name"class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12  mb-2">
                                    <label for="mobile"><b>Mobile</b><span class="text-danger">*</span></label>
                                    <input type="number" name="mobile" id="mobile"class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" placeholder="Enter mobile">
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12  mb-2">
                                    <label for="address"><b>Address</b><span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address"class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Enter Address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6  mb-2">
                                    <label for="lattitude"><b>Lattitude</b></label>
                                    <input id="lat" type="text" name="lattitude" id="lattitude"class="form-control @error('lattitude') is-invalid @enderror" value="{{ old('lattitude') }}" placeholder="Enter lattitude">
                                    @error('lattitude')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-6  mb-2">
                                    <label for="longitude"><b>Longitude</b></label>
                                    <input id="lng" type="text" name="longitude" id="longitude"class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}" placeholder="Enter longitude">
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
                                            center: { lat: 23.80805140332605, lng: 90.4175778591866 },
                                            zoom: 8,
                                            scrollwheel: true,
                                        });

                                        const uluru = { lat: 23.80805140332605, lng: 90.4175778591866 };
                                        let marker = new google.maps.Marker({
                                            position: uluru,
                                            map: map,
                                            draggable: true
                                        });

                                        google.maps.event.addListener(marker,'position_changed',
                                            function (){
                                                let lat = marker.position.lat()
                                                let lng = marker.position.lng()
                                                $('#lat').val(lat)
                                                $('#lng').val(lng)
                                            })

                                        google.maps.event.addListener(map,'click',
                                        function (event){
                                            pos = event.latLng
                                            marker.setPosition(pos)
                                        })
                                    }
                                </script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                                        type="text/javascript"></script>

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
   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
