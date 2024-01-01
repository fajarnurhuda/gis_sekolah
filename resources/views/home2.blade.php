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
</head>
<style>
    #map {
        height: 680px;
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
        apikey: apiKey
      }).addTo(map);

    var schoolIcon = L.icon({
    iconUrl: 'assets/school.png',

    iconSize:     [30, 35], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

// var latlngs = [
//     [
              
//               1.1062569355482452,
//               103.94993632871433
//             ],
//             [
             
//               1.1061479150781963,
//               103.94994328876408
//             ],
//             [
             
//               1.1060783275409989,
//               103.95100585648674
//             ],
//             [
              
//               1.1062012655211788,
//               103.95101281653643
//             ],
//             [
              
//               1.1062569355482452,
//               103.94993632871433
//             ]
// ];

// var polygon = L.polygon(latlngs, {color: 'red'}).addTo(map);

// zoom the map to the polygon

// polygon.setStyle({
//         color: 'yellow',
//         weight: 2,
//         lineCap: 'round',
//         fillColor: 'blue'
//     });
// map.fitBounds(polygon.getBounds());

// polygon.on('click', (e)=>{
    // alert('Ini poligon');
    // polygon.setStyle({
    //     color: 'blue',
    //     weight: 1,
    //     lineCap: 'round'
    // })
// });

// var latlngs = [
//     [
//         1.1079623568860626,
//             103.96998748263661
           
//           ],
//           [
//             1.1057068289846228,
//             103.97121440217444
//           ],
//           [
//             1.1059640383933385,
//             103.97176849486868
//           ]
//           ];

// var polyline = L.polyline(latlngs, { color: 'red',
//         weight: 10,
// }).addTo(map);

// // zoom the map to the polyline
// map.fitBounds(polyline.getBounds());

// polyline.on('click', (e)=>{
//     // alert(e.latlng);
//     polyline.setStyle({
//         color: 'yellow',
//         weight: 10,
//         lineCap: 'round'
//     })
// });

// var marker = L.marker([1.1469082301149938, 104.0173983771925], {icon: schoolIcon}).addTo(map).on('click', function(e){
    // marker.bindPopup("I am a green leaf.").openPopup();
    // alert('this');
// });


// L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
    // maxZoom: 20,
    // subdomains:['mt0','mt1','mt2','mt3'] }).addTo(map);

    // var marker = L.marker([1.1418892, 104.0264516]).addTo(map);

    var legend = L.control({position : 'bottomright'});

legend.onAdd = function(map){
    var div = L.DomUtil.create('div', 'legend');
    labels = ['<strong>Keterangan</strong>'],
    catagories = ['Rumah Sakit', 'Sekolah'];
    for(var i = 0; i < catagories.length; i++)
    {
        if(i==0){
            div.innerHTML += labels.push(
                '<img width="20" height="23" src="assets/rumahsakit.jpg"><i class="circle" style="background:#000"></i>' +
                (catagories[i] ? catagories[i] : '+'));
        } else {
            div.innerHTML += labels.push(
                '<img width="20" height="23" src="assets/rumahsakit.jpg"><i class="circle" style="background:#000"></i>' +
                (catagories[i] ? catagories[i] : '+'));
        }
    }
    return div;
};

legend.addTo(map);

</script>

</html>