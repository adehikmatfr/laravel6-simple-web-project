@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          
          @if(!session('edit'))
           <div class="row justify-content-center">
            <div class="col-lg-7">
                   <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Tambahkan Kelas</h4>
                        <form class="forms-sample" method="post" action="/kelas">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" name="nama" id="exampleInputEmail1" class="form-control @error('nama')
                            is-invalid @enderror" placeholder="Masukan Kelas">
                            @error('nama')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Jurusan</label>
                            <select name="id_jurusan" id="jurusan" class="form-control @error('id_jurusan')
                            is-invalid @enderror">
                           @foreach($jurusan as $js)
                           <option value="{{$js->id_jurusan}}">{{$js->nama_jurusan}}</option>
                           @endforeach
                            </select>
                            @error('id_jurusan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Urutan</label>
                            <input type="text" name="urutan" class="form-control @error('urutan')
                            is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Kelas">
                            @error('urutan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>
                          <button type="submit" class="btn btn-outline-primary btn-fw">
                            <i class="mdi mdi-file-document"></i>Submit</button>
                        </form>
                        @if(session('succes'))
                          <div class="alert alert-success mt-2" role="alert"><small>{{session('succes')}}</small></div>
                        @endif
                      </div>
                    </div>
            </div>
           </div>
           @endif

           @if(session('edit'))
           <div class="row justify-content-center">
            <div class="col-lg-7">
                   <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Kelas</h4>
                        <form class="forms-sample" method="post" action="{{route('kelas.edit',session('edit')[3])}}">
                        @csrf
                        {{method_field('put')}}                   
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Kelas</label>
                            <input type="text" name="nama" id="exampleInputEmail1" class="form-control @error('nama')
                            is-invalid @enderror" value="{{session('edit')[0]}}" placeholder="Masukan Kelas">
                            @error('nama')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Jurusan</label>
                            <select name="id_jurusan" id="jurusan" class="form-control @error('id_jurusan')
                            is-invalid @enderror">
                            <option value="0">{{session('edit')[2]}}</option>
                           @foreach($jurusan as $js)
                           <option value="{{$js->id_jurusan}}">{{$js->nama_jurusan}}</option>
                           @endforeach
                            </select>
                            @error('id_jurusan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Urutan</label>
                            <input type="text" name="urutan" class="form-control @error('urutan')
                            is-invalid @enderror" value="{{session('edit')[1]}}" id="exampleInputEmail1" placeholder="Masukan Kelas">
                            @error('urutan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>
                          <button type="submit" class="btn btn-outline-primary btn-fw">
                            <i class="mdi mdi-file-document"></i>Submit</button>
                            <a href="/jabatan" class="btn btn-outline-danger">
                            <i class="mdi mdi-alert-outline"></i>Batal</a>
                        </form>
                        @if(session('succes'))
                          <div class="alert alert-success mt-2" role="alert"><small>{{session('succes')}}</small></div>
                        @endif
                      </div>
                    </div>
            </div>
           </div>
           @endif


          <div class="row justify-content-center mt-3">
              <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Jurusan</h4>
                    <input type="text" name="serch" id="src" class="form-control" placeholder="Cari ...">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kelas</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $data)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$data->nama_kelas}} {{$data->nama_jurusan}} {{$data->urutan}}</td>
                          <td>
                          <a href="kelas/{{$data->id_kelas}}/edit" class="btn btn-outline-success"><i class="mdi mdi-cloud-download"></i>Edit</a>
                          <a href="kelas/{{$data->id_kelas}}/delete" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin?')">
                            <i class="mdi mdi-alert-outline"></i>Hapus</a>
                            </td>
                        </tr>
                     @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
 
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="p-4 border-bottom bg-light">
                    <h4 class="card-title mb-0">Grafik Absensi Tahun <?= date('Y')?></h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center pb-4">
                      <h4 class="card-title mb-0">Kelas Performance</h4>
                      <div id="line-traffic-legend"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <h2 class="mb-0 font-weight-medium">$1,334</h2>
                        <p class="mb-5 text-muted">Jumlah</p>
                      </div>
                    </div>
                    <canvas id="mychart"></canvas>
                  </div>
                </div>
              </div>
          </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
<!-- modal -->

<div class="modal fade bg-dark" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

 <form method="post" action="/jurusan/edit" enctype="multipart/form-data">
        	<div class="row justify-content-center mt-3">
		  <div class="col-lg-6 mt-2">
              @csrf
               <div class="form-group">
               <label for="exampleInputEmail1">Name Jurusan</label>
                 <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter Jurusan"value="">
                </div>          
		  </div>
		</div>			  
      <div class="modal-footer mt-5">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" value="" name="jedit">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>


@endsection

@section('placeJS')
<script>
  var cnv=document.getElementById('mychart');
  
  Chart.defaults.global.defaultFontFamily="Lato";
  Chart.defaults.global.defaultFontSize=14;

  var wakasek={
    label : "Wakil Kepala Sekolah",
    data: [
      4
    ],
    fill:false,
    borderColor:'red' 
  }

  var kurikulum={
    label : "Kurikulum",
    data: [
      1
    ],
    fill:false,
    borderColor:'blue' 
  }

  var bk={
    label : "Bimbingan Konseling",
    data: [
      2
    ],
    fill:false,
    borderColor:'yellow' 
  }

  var kaprog={
    label : "Kepala Program",
    data: [
      10
    ],
    fill:false,
    borderColor:'green' 
  }


  var guru={
    label : "Guru",
    data: [
      20
    ],
    fill:false,
    borderColor:'green' 
  }


  var siswa={
    label : "Siswa",
    data: [
      30,30,30,30
    ],
    fill:false,
    borderColor:'yellow' 
  }

  var data={
    labels:["Wakil Kepala Sekolah","Kurikulum","Bimbingan Konseling","Kepala Program","Guru","Siswa"],
    datasets:[wakasek,kurikulum,bk,kaprog,guru,siswa]
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
     type:'bar',
     data:data,
     options:opsi
  });
</script>
@endsection