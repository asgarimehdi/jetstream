<div>
    <form>
        <input type="text" wire:model="lat">
        <input type="text" wire:model="lng">
    </form>
    <div id="map" wire:ignor ></div>
    {{--    <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css"/>--}}
    {{--    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>--}}


</div>

@push('scripts')
    <style>


        #map {
            direction: ltr;
            height: 300px;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="/map.css"/>
    <script src="/map.js"></script>


    <script>
        document.addEventListener('livewire:initialized',()=>{
            const testLMap = new L.Map("map", {
                key: "web.77b6abe10a7c45408808aeabbd68e743",
                maptype: "neshan",
                poi: false,
                traffic: true,
                center: [36.1474388, 49.2286013],
                zoom: 14,
                MapType: "standard-day",

            });

            let marker = L.marker([36.1474388, 49.2286013], {
                draggable: true,
                // ... other options
            });
            marker.bindPopup('This is a marker!').addTo(testLMap);
            marker.on('dragend', function(event) {
                var position = marker.getLatLng();
            @this.lat=position.lat.toFixed(6);
            @this.lng=position.lng.toFixed(6);

            });
        })




    </script>
@endpush
