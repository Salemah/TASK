@extends('master')
@section('title', 'Customer Index')
@section('content')
    <div class="container">
        <h1>Customer List</h1>
        <a href="{{ route('customer.show', 1) }}" type="button" class="btn btn-primary my-2">All Customer In Map</a>
        <a href="{{ route('customer.create') }}" type="button" class="btn btn-primary my-2">Create</a>
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
@endsection
@push('script')
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

        };
        initMap(23.80805140332605, 90.4175778591866);
    </script>
@endpush
