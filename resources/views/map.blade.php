@extends('layout.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Map</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
    </head>

    <body>
        <div class="container py-5">
            <h2 class="text-center text-primary font-weight-bold mb-4">
                <i class="fas fa-map-marked-alt"></i>
                <span class="ml-2">My Map</span>
            </h2>
            <form action="{{ route('map.process') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="sourceName" class="form-label">
                            <i class="fas fa-map-pin text-success"></i>
                            <span class="ml-2">Source Name</span>
                        </label>
                        <input type="text" id="sourceName" class="form-control form-control-sm" name="sourceName"
                            value="{{ old('sourceName') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="destinationName" class="form-label">
                            <i class="fas fa-location-arrow text-danger"></i>
                            <span class="ml-2">Destination Name</span>
                        </label>
                        <input type="text" id="destinationName" class="form-control form-control-sm" name="destinationName"
                            value="{{ old('destinationName') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="lag1" class="form-label">
                            <i class="fas fa-arrow-up text-info"></i>
                            <span class="ml-2">Source Latitude</span>
                        </label>
                        <input type="text" id="lag1" class="form-control form-control-sm" name="lag1"
                            value="{{ old('lag1') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lag2" class="form-label">
                            <i class="fas fa-arrow-down text-info"></i>
                            <span class="ml-2">Destination Latitude</span>
                        </label>
                        <input type="text" id="lag2" class="form-control form-control-sm" name="lag2"
                            value="{{ old('lag2') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="log1" class="form-label">
                            <i class="fas fa-long-arrow-alt-left text-warning"></i>
                            <span class="ml-2">Source Longitude</span>
                        </label>
                        <input type="text" id="log1" class="form-control form-control-sm" name="log1"
                            value="{{ old('log1') }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="log2" class="form-label">
                            <i class="fas fa-long-arrow-alt-right text-warning"></i>
                            <span class="ml-2">Destination Longitude</span>
                        </label>
                        <input type="text" id="log2" class="form-control form-control-sm" name="log2"
                            value="{{ old('log2') }}" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-map"></i>
                        <span class="ml-2">Show Map</span>
                    </button>
                </div>
            </form>
            <!-- Map Display Section -->
            @if (isset($sourceLat) && isset($sourceLng) && isset($destinationLat) && isset($destinationLng))
                <hr>
                <div id="map" class="mt-4"></div>
                <script>
                    function initMap() {
                        const sourceLatLng = { lat: parseFloat("{{ $sourceLat }}"), lng: parseFloat("{{ $sourceLng }}") };
                        const destinationLatLng = { lat: parseFloat("{{ $destinationLat }}"), lng: parseFloat("{{ $destinationLng }}") };

                        const map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 6,
                            center: sourceLatLng,
                        });

                        new google.maps.Marker({
                            position: sourceLatLng,
                            map: map,
                            title: "{{ $sourceName }}",
                            label: "{{ $sourceName }}",
                        });

                        new google.maps.Marker({
                            position: destinationLatLng,
                            map: map,
                            title: "{{ $destinationName }}",
                            label: "{{ $destinationName }}",
                        });

                        // Add an arrow marker between source and destination
                        const arrowIcon = {
                            path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                            scale: 4,
                            strokeColor: '#FF0000'
                        };

                        new google.maps.Marker({
                            position: destinationLatLng,
                            map: map,
                            icon: arrowIcon,
                            title: "Destination",
                        });

                        const flightPath = new google.maps.Polyline({
                            path: [sourceLatLng, destinationLatLng],
                            geodesic: true,
                            strokeColor: '#FF0000',
                            strokeOpacity: 1.0,
                            strokeWeight: 2,
                        });

                        flightPath.setMap(map);
                    }

                    window.onload = initMap;
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_map.key') }}"></script>
            @endif
        </div>
    </body>

    </html>
@endsection
