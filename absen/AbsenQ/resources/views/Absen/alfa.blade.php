@extends('../HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="card">
            <nav class="breadcrumb">
              <ol class="breadcrumb">
               <li class="breadcrumb-item">
                <a href="">Masuk</a>
               </li>
               <li class="breadcrumb-item">
                <a href="">Keluar</a>
               </li>
              </ol>
            </nav>
               <div class="row p-2">
                  @foreach($data as $dat)
                  <div class="col-lg-3 p-2">
                  <center>
                  <img src="{{url('images')}}/{{$dat->img}}" class="img-thumbnail" style="max-width:100px" alt="img">
                   <small><br>Tgl/waktu : {{$dat->masuk}}<br>
                   Kelas : {{$dat->nama_kelas}} {{$dat->nama_jurusan}} {{$dat->urutan}}<br>
                   Nama : {{$dat->nama}}<br>
                   Jenis Kelamin : {{$dat->jenis_kelamin}}<br>
                   Keterangan : {{$dat->keterangan}}</small><center>
                  </div>
                  @endforeach
               </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection
