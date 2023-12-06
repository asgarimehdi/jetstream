

<div>
    <div id="map"></div>
{{--    <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css"/>--}}
{{--    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>--}}
    <link rel="stylesheet" href="/map.css"/>
    <script src="/map.js"></script>

    <style>


        #map {
            direction: ltr;
            height: 600px;
            width: 600px;
        }
    </style>

    <script>

        const testLMap = new L.Map("map", {
            key: "web.77b6abe10a7c45408808aeabbd68e743",
            maptype: "neshan",
            poi: false,
            traffic: true,
            center: [36.1474388, 49.2286013],
            zoom: 14,
            MapType: "standard-day",

        })



        var marker = L.marker([36.1474388, 49.2286013], {
            draggable: true,
            // ... other options
        });
        marker.bindPopup('This is a marker!').addTo(testLMap);

    </script>
</div>

