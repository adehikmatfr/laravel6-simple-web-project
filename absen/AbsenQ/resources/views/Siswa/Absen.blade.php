@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session('succes'))
         <h5 class="text-primary">{{session('succes')}}</h5>
         @endif
         @if(session('notsucces'))
         <h5 class="text-danger">{{session('notsucces')}}</h5>
         @endif
          @if($aktif==1)
         <div class="contaniner"> 
         <form action="{{url('')}}/siswa/absen/reg" method="post">
         @csrf
         <h3>Lengkapi Data Diri</h3>
         <div class="row">
         <div class="col-3 mt-3">
         @error('kelas')
         <h5 class="text-danger">{{$message}}</h5>
         @enderror
         </div>
         <div class="col-3 mt-3">
         @error('angkatan')
         <h5 class="text-danger">{{$message}}</h5>
         @enderror
         </div>
         <div class="col-3 mt-3">
         @error('no_me')
         <h5 class="text-danger">{{$message}}</h5>
         @enderror
         </div>
         <div class="col-3 mt-3">
         @error('no_tua')
         <h5 class="text-danger">{{$message}}</h5>
         @enderror
         </div>
         </div>
           <div class="row mt-1">
           <div class="col-lg-3">
             <select name="kelas" class="form-control">
               <option value="">Pilih Kelas</option>
               @foreach($kelas as $k)
               <option value="{{$k->id_kelas}}">{{$k->nama_kelas}} {{$k->nama_jurusan}} {{$k->urutan}}</option>
               @endforeach
             </select>
           </div>
           <div class="col-lg-3">
             <select name="angkatan" class="form-control">
               <option value="">Pilih angkatan</option>
               @for($a=2018;$a<2050;$a++)
               <option value="{{$a}}-{{$a+1}}">{{$a}}-{{$a+1}}</option>
               @endfor
             </select>
           </div>
           <div class="col-lg-3">
           <input type="number" name="no_me" placeholder="masukan nomer HP" class="form-control">
           </div>
           <div class="col-lg-3">
           <input type="number" name="no_tua" placeholder="masukan nomer Orangtua" class="form-control">
           </div>
           <div class="col-lg-3 mt-3">
           <button type="submit" class="btn btn-primary">
            Simpan
           </button>
           </div>
           </form>
           </div>
         </div>
         @endif

         @if($aktif!=1)
          <!-- <button id="direct">Get</button>
         <div id="map" style="width:500px;height:500px;">
         </div> -->
<form id="inp" method="post">
         <div class="text-center" id="nodate">Maaf Waktu Absen Sudah Tidak Tersedia</div>
         <div class="row" id="abs">
         <div class="col-lg-6 justify-content-center" id="vid">
         <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
        <center><video id="player" width="300px" height="300px" autoplay></video><center>
<div class="row" style="margin-top:-40px">
<div class="col-lg-2"></div>
<div class="col-lg-3">
<div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ck" value="Hadir" name="ck"> Hadir <i class="input-helper"></i></label>
          </div>
</div>
<div class="col-lg-3">
<div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ck1" value="Ijin" name="ck"> ijin <i class="input-helper"></i></label>
          </div>
</div>
<div class="col-lg-3">
        <div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ck2" value="Sakit" name="ck"> Sakit <i class="input-helper"></i></label>
          </div>
          </div>
</div>
        <button type="button" id="capture" class="btn mt-1 btn-icons btn-rounded btn-warning">
                            <i class="fa fa-camera"></i>
                          </button>
        <a href="{{url('')}}/siswa/absen" type="button" id="relod" class="btn mt-1 btn-icons btn-rounded btn-info">
                           <i class="fa fa-history"></i>
         </a>
         </div>
         <div class="col-lg-6 mt-3">
         <canvas id="snapshot" width=320 height=240></canvas>
            <div class="alert alert-success mt-2" id="hadir" role="alert">
              Selamat {{$user->nama}} anda berhasil mengabsen.
              Pertahankan Kehadirannya.            
            </div>
            <div class="alert alert-info mt-2" id="ijin" role="alert">
              Selamat {{$user->nama}} anda berhasil mengabsen.
              Semoga Selamat di perjalanan.            
            </div>
            <div class="alert alert-warning mt-2" id="sakit" role="alert">
              Selamat {{$user->nama}} anda berhasil mengabsen.
              Lekas Sembuh.            
            </div>
         </div>
         </div>
</form>
         @endif
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection
@section('placeJS')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBV2AH__f9NZ7UnYNlbHkFf1SSaEpU_XA4"></script>
@if($aktif!=1)
<script>
// $(document).ready(function(){
//   $("#direct").click(function(){
//     if("geolocation" in navigator)
//       {
//         setTimeout(function(){
//           navigator.geolocation.getCurrentPosition((result)=>{
//           var position={
//             lat:result.coords.latitude,
//             lng:result.coords.longitude
//           }
//           var map=new GMaps({
//             div:'#map',
//             lat:position.lat,
//             lng:position.lng
//           });
//             console.log('Latitude:'+position.lat);
//             console.log('Longitude:'+position.lng);
//           map.addMarker({
//             position: position
//           })

//           });
//         },250);
//       }else
//        {
//     console.log('on')
//        }
//      console.log('klik');
//    });
// })

<?php
$day=date('D');

if($day!='Sat'||$day!='Sun'){
  ?>

$(document).ready(function(){
$("#hadir").hide();
$("#ijin").hide();
$("#sakit").hide();

function waktu(){
var exp="01/01/2019 07:00";
var exp1="01/01/2019 14:20";

//deklarasi waktu
waktu_masuk= new Date(exp); //waktu masuk
waktu_keluar= new Date(exp1); //waktu keluar
waktu = new Date();  //waktu saat ini

//jam dan waktu saat ini
var jam = waktu.getHours();
var menit = waktu.getMinutes();

//exp masuk 
var jam_masuk = waktu_masuk.getHours();
var menit_masuk = waktu_masuk.getMinutes();

//waktu pulang
var jam_keluar = waktu_keluar.getHours();
var menit_keluar = waktu_keluar.getMinutes();

console.log('jam masuk:'+jam_masuk);
console.log('jam keluar:'+jam_keluar);
console.log('jam sekarang:'+jam);


		//kondisi tidak bisa absen masuk dan keluar
		if(jam_masuk<=jam&&jam_masuk<=jam_keluar&&menit_masuk<=menit&&menit_masuk<=menit_keluar) 
		{
		return false;
		}else
		{
	    return true;
		}
}

// console.log(waktu());

if(waktu())
{
  $('#nodate').hide();
  $('#abs').show();


  var player = document.getElementById('player'); 
  var snapshotCanvas = document.getElementById('snapshot');
  var captureButton = document.getElementById('capture');
  var videoTracks;

  var handleSuccess = function(stream) {
    // Attach the video stream to the video element and autoplay.
    player.srcObject = stream;
    videoTracks = stream.getVideoTracks();
  };

  captureButton.addEventListener('click', function() {

    var context = snapshot.getContext('2d');
    context.drawImage(player, 0, 0, snapshotCanvas.width, snapshotCanvas.height);
     
    var cek=$('#ck').val();
    var cek1=$('#ck1').val();
    var cek2=$('#ck2').val();
    if($('#ck:checked').length==0&&$('#ck1:checked').length==0&&$('#ck2:checked').length==0)
    {
     alert('Pilih Keterangan!')
     window.location.href="{{route('absen')}}";
    }else if($('#ck:checked').length!=0)
    {
      var ck=$('#ck').val();
      $("#hadir").show();
      var msg="Assalamualaikum wr.wb, Alhamdulilah anak bapa/ibu yang bernama {{$user->nama}} telah Hadir di sekolah. SMKN 1 Kawali";
    }else if($('#ck1:checked').length!=0)
    {
      var ck=$('#ck1').val();
      $("#ijin").show();
      var msg="Assalamualaikum wr.wb, anak bapa/ibu yang bernama {{$user->nama}} Ijin tidak sekolah. SMKN 1 Kawali";
    }
    else if($('#ck2:checked').length!=0)
    {
      var ck=$('#ck2').val();
      $("#sakit").show();
      var msg="Assalamualaikum wr.wb, anak bapa/ibu yang bernama {{$user->nama}} tidak datang ke sekolah Semoga Lekas Sembuh. SMKN 1 Kawali";
    }
    
    var img=snapshot.toDataURL();
    var data=$('#token').val();

    $.ajax({
      type:"POST",
      url:"{{route('absen')}}",
      data:{
         imgbst:img,
        _token:data,
        id_user:{{$user->id_user}},
        ket:ck
      }
    }).done(function(er){
      // send wa
      var no={{$sis[0]->no_tua}};
      // var no=6281573471914;
      var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://panel.rapiwha.com/send_message.php?apikey=25S89Z7ZTT59KWKUBNU9&number="+no+"&text="+msg+"",
  "method": "GET",
  "headers": {}
}

$.ajax(settings).done(function (response) {
  console.log(response);
}); 
    });
    // Stop all video streams.
    videoTracks.forEach(function(track) {track.stop()});

  });

  navigator.mediaDevices.getUserMedia({video: true})
      .then(handleSuccess);




}else
{
  $('#abs').hide();
  $('#nodate').show();
}


})

<?php }?>
// var player = document.getElementById('player'); 
//   var snapshotCanvas = document.getElementById('snapshot');
//   var captureButton = document.getElementById('capture');
//   var videoTracks;

//   var handleSuccess = function(stream) {
//     // Attach the video stream to the video element and autoplay.
//     player.srcObject = stream;
//     videoTracks = stream.getVideoTracks();
//   };

//   captureButton.addEventListener('click', function() {

//     var context = snapshot.getContext('2d');
//     context.drawImage(player, 0, 0, snapshotCanvas.width, snapshotCanvas.height);
     
//     var cek=$('#ck').val();
//     var cek1=$('#ck1').val();
//     var cek2=$('#ck2').val();
//     if($('#ck:checked').length==0&&$('#ck1:checked').length==0&&$('#ck2:checked').length==0)
//     {
//      alert('Pilih Keterangan!')
//      window.location.href="{{route('absen')}}";
//     }else if($('#ck:checked').length!=0)
//     {
//       var ck=$('#ck').val();
//       $("#hadir").show();
//       var msg="Assalamualaikum wr.wb, Alhamdulilah anak bapa/ibu yang bernama {{$user->nama}} telah Hadir di sekolah. SMKN 1 Kawali";
//     }else if($('#ck1:checked').length!=0)
//     {
//       var ck=$('#ck1').val();
//       $("#ijin").show();
//       var msg="Assalamualaikum wr.wb, anak bapa/ibu yang bernama {{$user->nama}} Ijin tidak sekolah. SMKN 1 Kawali";
//     }
//     else if($('#ck2:checked').length!=0)
//     {
//       var ck=$('#ck2').val();
//       $("#sakit").show();
//       var msg="Assalamualaikum wr.wb, anak bapa/ibu yang bernama {{$user->nama}} tidak datang ke sekolah Semoga Lekas Sembuh. SMKN 1 Kawali";
//     }
    
//     var img=snapshot.toDataURL();
//     var data=$('#token').val();

//     $.ajax({
//       type:"POST",
//       url:"{{route('absen')}}",
//       data:{
//          imgbst:img,
//         _token:data,
//         id_user:{{$user->id_user}},
//         ket:ck
//       }
//     }).done(function(er){
//       // send wa
//       var no={{$sis[0]->no_tua}};
//       // var no=6281573471914;
//       var settings = {
//   "async": true,
//   "crossDomain": true,
//   "url": "https://panel.rapiwha.com/send_message.php?apikey=25S89Z7ZTT59KWKUBNU9&number="+no+"&text="+msg+"",
//   "method": "GET",
//   "headers": {}
// }

// $.ajax(settings).done(function (response) {
//   console.log(response);
// }); 
//     });
//     // Stop all video streams.
//     videoTracks.forEach(function(track) {track.stop()});

//   });

//   navigator.mediaDevices.getUserMedia({video: true})
//       .then(handleSuccess);

</script>
@endif
@endsection