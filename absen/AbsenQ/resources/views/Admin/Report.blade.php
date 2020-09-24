@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           <center><h3>Grafik Absensi Tahun <?= date('Y')?></h3></center>
	 <div class="row">
      <div class="col-lg-12" style="max-width:100%; ">
			<canvas id="mychart"></canvas>
			</div> 
			</div>
           <a href="{{route('excel')}}" target="_blank" class="p-2 ml-2 mt-3 btn btn-success">Export To Excel</a>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection
@section('placeJS')
<script>
  var cnv=document.getElementById('mychart');
  
  Chart.defaults.global.defaultFontFamily="Lato";
  Chart.defaults.global.defaultFontSize=14;

  var alfa={
    label : "alfa",
    data: [
      {{$ket[3][0]}},
      {{$ket[3][1]}},
      {{$ket[3][2]}},
      {{$ket[3][3]}},
      {{$ket[3][4]}},
      {{$ket[3][5]}},
      {{$ket[3][6]}},
      {{$ket[3][7]}},
      {{$ket[3][8]}},
      {{$ket[3][9]}},
      {{$ket[3][10]}},
      {{$ket[3][11]}},
    ],
    fill:false,
    borderColor:'red' 
  }

  var hadir={
    label : "Hadir",
    data: [
      {{$ket[0][0]}},
      {{$ket[0][1]}},
      {{$ket[0][2]}},
      {{$ket[0][3]}},
      {{$ket[0][4]}},
      {{$ket[0][5]}},
      {{$ket[0][6]}},
      {{$ket[0][7]}},
      {{$ket[0][8]}},
      {{$ket[0][9]}},
      {{$ket[0][10]}},
      {{$ket[0][11]}},
    ],
    fill:false,
    borderColor:'blue' 
  }

  var sakit={
    label : "Sakit",
    data: [
      {{$ket[2][0]}},
      {{$ket[2][1]}},
      {{$ket[2][2]}},
      {{$ket[2][3]}},
      {{$ket[2][4]}},
      {{$ket[2][5]}},
      {{$ket[2][6]}},
      {{$ket[2][7]}},
      {{$ket[2][8]}},
      {{$ket[2][9]}},
      {{$ket[2][10]}},
      {{$ket[2][11]}},
    ],
    fill:false,
    borderColor:'yellow' 
  }

  var ijin={
    label : "ijin",
    data: [
      {{$ket[1][0]}},
      {{$ket[1][1]}},
      {{$ket[1][2]}},
      {{$ket[1][3]}},
      {{$ket[1][4]}},
      {{$ket[1][5]}},
      {{$ket[1][6]}},
      {{$ket[1][7]}},
      {{$ket[1][8]}},
      {{$ket[1][9]}},
      {{$ket[1][10]}},
      {{$ket[1][11]}},
    ],
    fill:false,
    borderColor:'green' 
  }

  var data={
    labels:["januari","februari","maret","april","mei","juni","july","agustus","september","oktober","november","desember"],
    datasets:[alfa,hadir,sakit,ijin]
  }

  var opsi={
    legend:{
      dispaly:true,
      position:'top',
      labels:{
        boxWidth:80,
        FontColor:'black'
      }
    }
  };

  var garis=new Chart(cnv,{
     type:'line',
     data:data,
     options:opsi
  });
</script>
@endsection