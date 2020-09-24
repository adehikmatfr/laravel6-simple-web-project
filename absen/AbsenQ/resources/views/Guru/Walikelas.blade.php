@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <h3 class="mt-3">Daftar Guru</h3>
                       @if(session('succes'))
                          <div class="alert alert-success mt-2" role="alert"><small>{{session('succes')}}</small></div>
                        @endif
          <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Alamat</th>
                          <th>Jabatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $da)
                      <tr> 
                          <td>{{$da->username}}</td>
                          <td>{{$da->nama}}</td>
                          <td>{{$da->jenis_kelamin}}</td>
                          <td>{{$da->alamat}}</td>
                          <td>{{$da->nama_jabatan}}</td>
                          <td>
                          <button type="button" data-toggle="modal" data-target="#a{{$da->id_user}}" class="btn btn-icons btn-sm btn-rounded btn-outline-success">
                          <i class="fa fa-spin fa-cog"></i>
                          </button>
                          </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
{{$data->links()}}
<h3 class="mt-5">Daftar Wali Kelas</h3>
          @if(session('succe'))
                          <div class="alert alert-success mt-2" role="alert"><small>{{session('succe')}}</small></div>
                        @endif
          <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Kelas</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($wali as $da)
                      <tr> 
                          <td>{{$da->nama}}</td>
                          <td>{{$da->jenis_kelamin}}</td>
                          <td>{{$da->nama_kelas}} {{$da->nama_jurusan}} {{$da->urutan}}</td>
                          <td>
                          <button type="button" data-toggle="modal" data-target="#ba{{$da->id_wali}}" class="btn btn-icons btn-sm btn-rounded btn-outline-success">
                          <i class="fa fa-spin fa-cog"></i>
                          </button>
                          <a href="{{route('wali.hapus',$da->id_wali)}}" class="btn btn-icons btn-sm btn-rounded btn-outline-danger" onclick="return confirm('apakah anda yakin?')">
                          <i class="fa fa-spin fa-times-circle-o"></i>
                          </a>
                          </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>



    
<!-- Modal kth -->
@foreach($data as $ad)
<div class="modal fade bg-dark" id="a{{$ad->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert WaliKelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <form method="post" action="{{route('wali.ins')}}">
     @csrf
     <input type="hidden" name="id" value="{{$ad->id_user}}">
      <div class="container mt-2">
         <div class="row">
         <div class="col-sm-6">
         Nama Guru : {{$ad->nama}}
         </div>
         <div class="col-sm-6">
         <select name="kelas" class="form-control">
         <option value="0">Pilih Kelas</option>
         @foreach($ja as $jr)
         <option value="{{$jr->id_kelas}}">{{$jr->nama_kelas}} {{$jr->nama_jurusan}} {{$jr->urutan}}</option>
          @endforeach
         </select>
         </div>
         </div>
      </div>		  
      <div class="modal-footer mt-2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" value="" name="aedit">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal kth -->
@foreach($wali as $ad)
<div class="modal fade bg-dark" id="ba{{$ad->id_wali}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit WaliKelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <form method="post" action="{{route('wali.edit',$ad->id_wali)}}">
     @csrf
     {{method_field('put')}}
      <div class="container mt-2">
         <div class="row">
         <div class="col-sm-6">
         Nama Guru : {{$ad->nama}}
         </div>
         <div class="col-sm-6">
         <select name="kelas" class="form-control">
         <option value="0">{{$jr->nama_kelas}} {{$jr->nama_jurusan}} {{$jr->urutan}}</option>
         @foreach($ja as $jr)
         <option value="{{$jr->id_kelas}}">{{$jr->nama_kelas}} {{$jr->nama_jurusan}} {{$jr->urutan}}</option>
          @endforeach
         </select>
         </div>
         </div>
      </div>		  
      <div class="modal-footer mt-2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" value="" name="aedit">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

@endsection
@section('placeJS')
<script>
// $(document).ready(function(){
//    $("#tombol").click(function(){
//      conlose.log('klik');
//    }); 
// });
</script>
@endsection