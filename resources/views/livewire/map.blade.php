
<div>
    <div id="map"></div>
    {{--    <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css"/>--}}
    {{--    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>--}}
    <link rel="stylesheet" href="/map.css"/>
    <script src="/map.js"></script>

    <style>
        #map {
            direction: ltr;
            height: 100vh;
            width: 100%;
        }


    </style>

    <script>

        const map = new L.Map("map", {
            key: "web.77b6abe10a7c45408808aeabbd68e743",
            maptype: "neshan",
            poi: false,
            traffic: true,
            center: {{$center}},
            zoom: 14,
            MapType: "standard-day",

        })
        var markerOptions = {
            title: "MyLocation",
            clickable: true,
            draggable: true
        }
         var marker = L.marker({{$center}}, markerOptions).addTo(map);
        marker.on('dragend', function (e) {
            var latitud = marker.getLatLng();

        });

        @foreach($markers as $marker)
         L.marker({{$marker}}, markerOptions).addTo(map);
        @endforeach


       // marker.bindPopup('This is a marker!').addTo(testLMap);

    </script>
    ok  {{$latitud}}


    <div x-data="{ 'latitud': @entangle('latitud') }">

    </div>
</div>

