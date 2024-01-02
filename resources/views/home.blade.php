<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GIS Sekolah Batam</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    {{-- JS --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.2.3/dist/esri-leaflet-vector.js" crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="assets/dist/MarkerCluster.Default.css" />
    <script src="assets/dist/leaflet.markercluster-src.js"></script>
</head>
<style>
    #map {
        height: 680px;
    }

    .legend {
        background: white;
        padding: 10px;
    }
</style>

<body>
    <h4>Data sekolah sekolah yang ada di Batam</h4>
    <div id="map"></div>
</body>

<script>
    const apiKey = "AAPK54220304578f4b21a9071142b64237edlYCpQuggbpilYA3FZ3hF3Elfv6OLImsX4rDjA9iyuv2iuwj2yiOZwNt1e9ZR_JQ5";

    var map = L.map('map').setView([1.1418892, 104.0264516], 15);

    L.esri.Vector.vectorBasemapLayer("arcgis/outdoor", {
        apikey: apiKey,
      }).addTo(map);

    var schoolIcon = L.icon({
    iconUrl: 'assets/school.png',

    iconSize:     [30, 35], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [15, 0],
    popupAnchor:  [0, 0],
});

$(document).ready(function() {
    $.getJSON('sekolah', function(data){
        $.each(data, function(index){
            var marker = L.marker([data[index].latitude, data[index].longitude], {icon: schoolIcon}).addTo(map);
            marker.on('click', (e)=>{
                // marker.bindPopup(data[index].nama).openPopup();
                var latlng = L.latLng(data[index].latitude, data[index].longitude);
                $.getJSON('detail/' + data[index].id_sekolah, function(detail){
                    $.each(detail, function(index){ 
                        // marker.bindPopup(detail[index].nama).openPopup();
                        // alert(detail[index].nama);
                        var html = '<img height="124px" width="248px" src="storage/'+ detail[index].gambar+'">';
                            html+='<h5>Nama Sekolah : '+ detail[index].nama +'</h5>';
                            html+='<h5>Alamat : '+ detail[index].alamat +'</h5>';
                           
                        L.popup()
                            .setLatLng(latlng)
                            .setContent(html)
                            .openOn(map);
                    });
                });
            });
        })
    });
});


</script>

</html>