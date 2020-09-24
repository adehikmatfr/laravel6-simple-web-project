@extends('templet.main')
@section('CSS')
<link rel="stylesheet" href="{{url('leaflet')}}/leaflet.css" />
<link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
<script src="{{url('leaflet')}}/leaflet.js"></script>
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
         width:700px;
         height:300px;
          }
          @media (max-width:460px){
            #map { 
          width:340px;
          height:200px;
          }
          }

          </style>
@endsection
@section('content')
<div class="row justify-content-center">
      <!-- form input -->
      <div class="col-lg-8 card mb-4 py-3 border-bottom-success">
      <div class="card-body">

      @if(session('succes'))
      <div class="toast" id="to" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">
        <div class="toast-header">
          <img src="https://img.icons8.com/offices/30/000000/ok.png" class="rounded mr-2" alt="...">
          <strong class="mr-auto"></strong>
          <small>success</small>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
        {{session('succes')}}
        </div>
      </div>
      @endif

      @if(session('info'))
      <div class="alert alert-warning" role="alert">
  user ini berkaitan dengan data transaksi, apakah tetap ingin menghapus ?
  data juga transaksi akan terhapus !
  <a href="{{route('cln.client',session('info'))}}" class="btn btn-sm btn-warning">lanjutkan</a>
      </div>
      @endif

      <form method="post" action="{{route('add.bil')}}" enctype="multipart/form-data">
            @csrf
        <!-- input -->
            <div class="row justify-content-center">
                <div class="col-lg12">
                <div id="map" ></div>
                <label for=""><small class="text-warning">tandai lokasi bilboard geser penanda biru!</small></label>@error('lat')<small class="text-danger">harap tandai lokasi!</small> @enderror
                <br>
                <small>
                Keterangan : 
                <img src="https://img.icons8.com/ultraviolet/20/000000/filled-flag.png"/> Di pesan
                <img src="https://img.icons8.com/office/20/000000/marker.png" alt=""> Belum Di Pesan
                </small>
                <input type="hidden" value="{{old('lat')}}" name="lat" id="lat">
                <input type="hidden" value="{{old('lng')}}" name="lng" id="lng">
                </div>
            </div>
         <div class="row">
            <div class="col-lg-6">
            <label for="no" class="col-form-label">Alamat</label>
            <input type="text" id="no" name="alamat" value="{{old('alamat')}}" class="form-control @error('alamat') is-invalid @enderror">
                         @error('alamat')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="np" class="mt-1 col-form-label">Kota/Kabupaten</label>
            <input type="text" id="np" name="kotkab" value="{{old('kotkab')}}" class="form-control @error('kotkab') is-invalid @enderror">
                          @error('kotkab')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="kp" class="mt-1 col-form-label">Type Bilboard</label>
            <select name="bilboard" id="kp" class="custom-select @error('bilboard') is-invalid @enderror">
            <option value="{{old('bilboard')}}">-Pilih-</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Non Elektronik">Non Elektronik</option>
            </select>
                         @error('bilboard')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="nt" class="mt-1 col-form-label">Ukuran Lebar</label>
            <input type="text" id="nt" value="{{old('lebar')}}" name="lebar" class="form-control @error('lebar') is-invalid @enderror">
                         @error('lebar')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="nta" class="mt-1 col-form-label">Ukuran tinggi</label>
            <input type="text" id="nta" name="tinggi" value="{{old('tinggi')}}" class="form-control @error('tinggi') is-invalid @enderror">
                         @error('tinggi')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="noa" class="col-form-label">Jumlah Muka</label>
            <input type="text" id="noa" name="muka" value="{{old('muka')}}" class="form-control @error('muka') is-invalid @enderror">
                          @error('muka')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="npo" class="mt-1 col-form-label">Tinggi Papan</label>
            <input type="text" id="npo" name="tpapan" value="{{old('tpapan')}}" class="form-control mb-3 @error('tpapan') is-invalid @enderror">
                          @error('tpapan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="ntx" class="mt-1 col-form-label">Nomor Ijin</label>
            <input type="text" id="ntx" name="ijin" value="{{old('ijin')}}" class="form-control @error('ijin') is-invalid @enderror">
            </div>
                          @error('ijin')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <div class="col-lg-6">


            <div class=" mt-4">
                    <div class="custom-file">
                        <input type="file" id="inputFile" required name="gambar1" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" id="lb" for="inputFile">Choose file</label>
                        <label for="" id="img1" class="text-danger"></label>
                    </div>
            </div>
           
           <div class="row justify-content-center mt-1">
             <div class="col-lg-6">
                <div class="imgWrap">
                    <img src="https://img.icons8.com/metro/100/000000/no-camera.png" id="imgView" class="card-img-top img-fluid">
                </div>
             </div>
           </div>
           
            

           <div class=" mt-4">
                    <div class="custom-file">
                        <input type="file" id="inputFile1" required name="gambar2" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" id="lb1" for="inputFile">Choose file</label>
                        <label for="" id="img3" class="text-danger"></label>
                    </div>
            </div>
           
           <div class="row justify-content-center mt-1">
             <div class="col-lg-6">
                <div class="imgWrap">
                    <img src="https://img.icons8.com/metro/100/000000/no-camera.png" id="imgView1" class="card-img-top img-fluid">
                </div>
             </div>
           </div>
            

           <div class=" mt-4">
                    <div class="custom-file">
                        <input type="file" id="inputFile2" required name="gambar3" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" id="lb2" for="inputFile">Choose file</label>
                        <label for="" id="img2" class="text-danger"></label>
                    </div>
            </div>
           
           <div class="row justify-content-center mt-1">
             <div class="col-lg-6">
                <div class="imgWrap">
                    <img src="https://img.icons8.com/metro/100/000000/no-camera.png" id="imgView2" class="card-img-top img-fluid">
                </div>
             </div>
           </div>
            
            
            </div>
          </div>
             <div class="row justify-content-center mt-4">
                <div class="col-lg-3"> 
                 <button type="submit" id="btn" class="btn btn-primary btn-block">simpan</button>
                </div>
              </div>
         </div>
         </form>
        <!-- input -->
      </div>
      <!-- form input -->
</div>
<!-- table -->
<div class="card">
  <div class="card-header">
    Bilboard
  </div>
  <div class="card-body">
  <div class="container mb-4 table-responsive" style="overflow-y: hidden;">
                <div data-role="main" class="ui-content">
                  <table data-role="table" class="table table-sm table-hover" id="datatable">
                   <thead>
                   <tr>
                   <th>Alamat</th>
                   <th>Kabupaten</th>
                   <th>Tipe</th>
                   <th>Jumlah Muka</th>
                   <th>Ukuran Lebar</th>
                   <th>Ukuran Tinggi</th>
				           <th>Tinggi Papan</th>
                  <th>Nomor Ijin</th>
                  <th>Aksi</th>
                   </tr>
                   </thead>
                   <tbody>
                   
                   </tbody>
                  </table>
                </div>
              
          </div>
  </div>
</div>
		<!-- tabel -->
    
          <!-- table -->

@endsection

@section('JS')

@if(session('succes'))
<script>
$(document).ready(function(){
  $('#to').toast('show');
});     

</script>
@endif


<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>


<script>
// map

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

var srcmark = L.icon({
    iconUrl: "https://img.icons8.com/officel/40/000000/map-pin.png",
    shadowUrl: 'leaflet/images/marker-shadow.png',
    iconSize:     [36, 45], // size of the icon
    shadowSize:   [45, 66], // size of the shadow
    iconAnchor:   [8, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [9, -45] // point from which the popup should open relative to the iconAnchor
});
 
var curLocation=[0,0];
L.control.scale().addTo(mymap);

var searchControl = new L.esri.Controls.Geosearch().addTo(mymap);

  var results = new L.LayerGroup().addTo(mymap);

  searchControl.on('results', function(data){
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng,{icon: srcmark}));
    }
    
  });

// dragable

if(curLocation[0]==0&&curLocation[1]==0){
  curLocation=[-7.186850, 108.362650];
}



mymap.attributionControl.setPrefix(false);
var marker=new L.marker(curLocation,{
  draggable:'true'
});

marker.on('dragend',function(event){
  var position=marker.getLatLng();
  marker.setLatLng(position,{
    draggable:'true'
  }).bindPopup(position).update();
  $('#lat').val(position.lat);
  $('#lng').val(position.lng);
})

$('#lat','#lng').change(function(){
  var position=[parseInt($('#lat').val()),parseInt($('#lng').val())]
  marker.setLatLng(position,{
    draggable:'true'
  }).bindPopup(position).update();
  mymap.panTo(position);
})
mymap.addLayer(marker);

// gambar2
$("#inputFile1").change(function(event) {  
      fadeInAdd();
      getURL1(this);    
    });

    $("#inputFile1").on('click',function(event){
      fadeInAdd();
    });

    function getURL1(input) {   
      var pth=$("#inputFile").val();
      var ex=/(\.jpg|\.jpeg|\.png|\.img)$/i;
      var ok=true;
      console.log(input.files[0]);
      if(input.files[0].size>1000000){
        input.files[0]=null;
        $('#lb2').text("");  
        $('#img3').text("error minimum gambar 10mb");
        ok=false;
        $('#btn').hide();
      }else if(!ex.exec(pth)){
        input.files[0]=null;
        $('#lb2').text("");  
        $('#img3').text("error pilih file jpg,png,jpeg atau img");
        ok=false;
        $('#btn').hide();
      }

      if (input.files && input.files[0]&& ok) {  
        $('#img3').text("");
        $('#btn').show(); 
        var reader = new FileReader();
        var filename = $("#inputFile1").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView1').attr('src', e.target.result);
          $('#imgView1').hide();
          $('#imgView1').fadeIn(500);      
          $('#lb1').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }
// gambar3
$("#inputFile2").change(function(event) {  
      fadeInAdd();
      getURL2(this);    
    });

    $("#inputFile2").on('click',function(event){
      fadeInAdd();
    });

    function getURL2(input) { 
      var pth=$("#inputFile").val();
      var ex=/(\.jpg|\.jpeg|\.png|\.img)$/i;
      var ok=true;
      console.log(input.files[0]);
      if(input.files[0].size>1000000){
        input.files[0]=null;
        $('#lb1').text("");  
        $('#img2').text("error minimum gambar 10mb");
        ok=false;
        $('#btn').hide();
      }else if(!ex.exec(pth)){
        input.files[0]=null;
        $('#lb1').text("");  
        $('#img2').text("error pilih file jpg,png,jpeg atau img");
        ok=false;
        $('#btn').hide();
      }
    
      if (input.files && input.files[0]&& ok) { 
        $('#img2').text("");
        $('#btn').show();     
        var reader = new FileReader();
        var filename = $("#inputFile2").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView2').attr('src', e.target.result);
          $('#imgView2').hide();
          $('#imgView2').fadeIn(500);      
          $('#lb2').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

// gambar 1
$("#inputFile").change(function(event) {  
      fadeInAdd();
      getURL(this);    
    });

    $("#inputFile").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      var pth=$("#inputFile").val();
      var ex=/(\.jpg|\.jpeg|\.png|\.img)$/i;
      var ok=true;
      console.log(input.files[0]);
      if(input.files[0].size>1000000){
        input.files[0]=null;
        $('#lb').text("");  
        $('#img1').text("error minimum gambar 10mb");
        ok=false;
        $('#btn').hide();
      }else if(!ex.exec(pth)){
        input.files[0]=null;
        $('#lb').text("");  
        $('#img1').text("error pilih file jpg,png,jpeg atau img");
        ok=false;
        $('#btn').hide();
      }

      if (input.files && input.files[0] && ok) {   
        $('#img1').text("");
        $('#btn').show();
        var reader = new FileReader();
        var filename = $("#inputFile").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);      
          $('#lb').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }



    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");  
    }

// datatable

$(document).ready(function(){
  $('#datatable').DataTable({
    processing:true,
    serverside:true,
    ajax:"{{route('data.bil')}}",
    columns:[
      {data:"alamat_bil",name:"alamat_bil"},
      {data:"kota_kab_bil",name:"kota_kab_bil"},
      {data:"tipe_bil",name:"tipe_bil"},
      {data:"jumlah_muka",name:"jumlah_muka"},
      {data:"ukuran_lebar",name:"ukuran_lebar"},
      {data:"ukuran_tinggi",name:"ukuran_tinggi"},
      {data:"tinggi_papan",name:"tinggi_papan"},
      {data:"no_ijin",name:"no_ijin"},
      {data:"aksi",name:"aksi"}
    ]
  });
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