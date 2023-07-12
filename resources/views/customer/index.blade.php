<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer List</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <h1>Customer List</h1>
        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Address</th>
                        <th scope="col">Lattitude</th>
                        <th scope="col">Longtitude</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($customers) > 0)
                        @foreach ($customers as $key => $customer)
                            <tr onclick="initMap({{ $customer->latitude }},{{ $customer->longitude }})">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->mobile }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->latitude }}</td>
                                <td>{{ $customer->longitude }}</td>
                                <td>
                                    <a href="{{ route('customer.edit', $customer->id) }}" type="button"
                                        class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">No Customer</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div id="map" style="height:400px; width: 800px;" class="my-3"></div>
            <div class="">
                <h1> Click row to view live location</h1>
            </div>
        </div>

    </div>
    <script>
        let map;

        function initMap(lat, long) {
            var coord = {
                lat: lat,
                lng: long
            };
            map = new google.maps.Map(document.getElementById("map"), {
                center: coord,
                zoom: 8,
                scrollwheel: true,
            });
            let marker = new google.maps.Marker({
                position: coord,
                map: map,
                draggable: true
            });

        }
        initMap(23.80805140332605, 90.4175778591866);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
{{-- // var arr = window.myArray=@json($customers);
//  var app = {{ Js::from($customers) }};
//  console.log((app[2].latitude) ); --}}
