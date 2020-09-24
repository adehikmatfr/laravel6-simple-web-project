@extends('templet.main')

@section('CSS')
<link rel="stylesheet" href="{{url('leaflet')}}/leaflet.css" />
<script src="{{url('leaflet')}}/leaflet.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
        <style type="text/css">
              #imgView{  
          padding:5px;
      }
      .loadAnimate{
          animation:setAnimate ease 5.5s infinite;
      }
      @keyframes setAnimate{
          0%  {color: #000;}     
          50% {color: transparent;}
          99% {color: transparent;}
          100%{color: #000;}
      }
      .custom-file-label{
          cursor:pointer;
      }

      #map {  
         width:1080px;
         height:500px;
          }
          @media (max-width:460px){
            #map { 
          width:330px;
          height:200px;
          }
          }

          </style>
@endsection

@section('content')
<div class="row justify-content-center">
                <div class="col-lg-12">
                <div id="map" ></div>
                <br>
                Keterangan : 
                <img src="https://img.icons8.com/ultraviolet/20/000000/filled-flag.png"/> Di pesan
                <img src="https://img.icons8.com/office/20/000000/marker.png" alt=""> Belum Di Pesan
                </div>
            </div>
@endsection

@section('JS')

<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>

<script>
var mymap = L.map('map').setView([-7.186850, 108.362642], 13);
	var LeafIcon = L.Icon.extend({
		options: {
			shadowUrl: 'leaf-shadow.png',
			iconSize:     [38, 95],
			shadowSize:   [50, 64],
			iconAnchor:   [22, 94],
			shadowAnchor: [4, 62],
			popupAnchor:  [-3, -76]
		}
	});

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	 attribution: 'keep smile :)',
   maxZoom: 20,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
}).addTo(mymap);

var srcmark = L.icon({
    iconUrl: "https://img.icons8.com/officel/40/000000/map-pin.png",
    shadowUrl: 'leaflet/images/marker-shadow.png',
    iconSize:     [36, 45], // size of the icon
    shadowSize:   [45, 66], // size of the shadow
    iconAnchor:   [8, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [9, -45] // point from which the popup should open relative to the iconAnchor
});

L.control.scale().addTo(mymap);

var searchControl = new L.esri.Controls.Geosearch().addTo(mymap);

  var results = new L.LayerGroup().addTo(mymap);

  searchControl.on('results', function(data){
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng,{icon: srcmark}));
    }
    
  });

// L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
//     attribution: 'depelove by ade hikmat fr',
//     maxZoom: 20,
//     id: 'mapbox/streets-v11',
//     tileSize: 512,
//     zoomOffset: -1,
//     accessToken: 'pk.eyJ1IjoiYWRlaGlrbWF0IiwiYSI6ImNrOHk0aDZkajFlaXQzaW52NGIzbWhuemwifQ._SK7BYow9EGDxcciybNG9g'
// }).addTo(mymap);



var greenIcon = L.icon({
    iconUrl: "https://img.icons8.com/office/50/000000/marker.png",
    shadowUrl: 'leaflet/images/marker-shadow.png',
    iconSize:     [36, 45], // size of the icon
    shadowSize:   [45, 66], // size of the shadow
    iconAnchor:   [8, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [10, -45] // point from which the popup should open relative to the iconAnchor
});

var markok = L.icon({
    iconUrl: "https://img.icons8.com/ultraviolet/40/000000/filled-flag.png",
    shadowUrl: 'leaflet/images/marker-shadow.png',
    iconSize:     [36, 45], // size of the icon
    shadowSize:   [45, 66], // size of the shadow
    iconAnchor:   [8, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [9, -45] // point from which the popup should open relative to the iconAnchor
});
</script>

@foreach($bil as $bil)
<script>
@if($bil->status>0)
    L.marker([<?=$bil->latitude?>, <?=$bil->longitude?>],{icon: markok}).bindPopup("<div class='row'><div class='col-lg-12'><img src='<?=url('img')?>/bilboard/<?=$bil->gambar1?>' class='img img-fluid'></div></div<br>alamat : <?=$bil->alamat_bil?><br>ukuran : <?=$bil->ukuran_tinggi?>x<?=$bil->ukuran_lebar?> m<br>Tinggi Papan : <?=$bil->tinggi_papan?> m<br>Tipe : <?=$bil->tipe_bil?>").addTo(mymap);
@endif
@if($bil->status==0)
    L.marker([<?=$bil->latitude?>, <?=$bil->longitude?>],{icon: greenIcon}).bindPopup("<div class='row'><div class='col-lg-12'><img src='<?=url('img')?>/bilboard/<?=$bil->gambar1?>' class='img img-fluid'></div></div<br>alamat : <?=$bil->alamat_bil?><br>ukuran : <?=$bil->ukuran_tinggi?>x<?=$bil->ukuran_lebar?> m<br>Tinggi Papan : <?=$bil->tinggi_papan?> m<br>Tipe : <?=$bil->tipe_bil?>").addTo(mymap);
@endif
</script>
@endforeach

@endsection