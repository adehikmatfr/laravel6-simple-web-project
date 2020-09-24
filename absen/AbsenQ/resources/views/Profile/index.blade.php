@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row justify-content-center">
                 <div class="col-lg-5">
                  <div class="card">
                     <div class="p-5">
                     <div class="row text-center">
                      <div class="col-lg-4">
                      <img class="img-lg rounded-circle" src="{{url('images')}}/{{$user->img}}" alt="profile image">
                      </div>
                      <div class="col">
                      Username<br>
                     <small class="text-success">{{$user->username}}</small><br> 
                      Nama<br>
                     <small class="text-success">{{$user->nama}}</small><br>
                      Jenis Kelamin<br>
                      <small class="text-success">{{$user->jenis_kelamin}}</small><br>
                      Alamat<br>
                      <small class="text-success">{{$user->alamat}}</small><br>
                      Jabatan<br>
                      <small class="text-success">{{$jabatan[0]->nama_jabatan}}</small><br>
                      @if($val==1)
                      Wali Kelas <br>
                      <small class="text-success">{{$level[0]->nama_kelas}} {{$level[0]->nama_jurusan}} {{$level[0]->urutan}}</small>
                      @endif
                      @if($val==2)
                      Kepala Program<br>
                      <small class="text-success">{{$level[0]->nama_jurusan}}</small>
                      @endif
                      </div>
                     </div>
                     <button type="button"  data-toggle="modal" data-target="#a" class="btn btn-icons btn-inverse-success mt-3">
                            <i class="fa fa-wrench"></i>
                      </button>
                      <button type="button" class="btn btn-icons btn-inverse-primary mt-3">
                            <i class="fa fa-key"></i>
                          </button>
                          @error('img')
                          <span class="text-danger ml-3">Error: {{$message}}</span>
                          @enderror
                          @if(session('success'))
                          <span class="text-primary ml-3">Succes: {{session('success')}}</span>
                          @endif
                     </div>
                  </div>
                 </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
        
<!-- Modal kth -->
<div class="modal fade bg-dark" id="a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <form method="post" enctype="multipart/form-data" action="{{route('profile.edit',$user->id_user)}}">
     @csrf
     {{method_field('put')}}
      <div class="container mt-2">
         <div class="row">
         <div class="col-sm-12">  
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" value="{{$user->nama}}" name="nama" required class="form-control" id="exampleInputName1" placeholder="nama">
                      </div>
                      <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                      <select class="form-control form-control-lg" name="jenis" id="exampleFormControlSelect1">
                        <option value="{{$user->jenis_kelamin}}">Pilih</option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>File upload</label>
                          <input type="file" name="img" class="form-control file-upload-info" placeholder="Upload Image">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Alamat</label>
                        <textarea class="form-control" required name="alamat" id="exampleTextarea1" rows="2">{{$user->alamat}}</textarea>
                      </div>
                      @if($val==1)
                      <div class="form-group">
                      <label for="exampleFormControlSelect">Wali Kelas</label>
                      <select class="form-control form-control-lg" name="wali" id="exampleFormControlSelect">
                        <option value="{{$level[0]->id_kelas}}">Pilih</option>
                        @foreach($ex as $e)
                        <option value="{{$e->id_kelas}}">{{$e->nama_kelas}} {{$e->nama_jurusan}} {{$e->urutan}}</option>
                        @endforeach
                      </select>
                    </div>
                    @endif
                    @if($val==2)
                      <div class="form-group">
                      <label for="exampleFormControlSelec">Kepala Program</label>
                      <select class="form-control form-control-lg" name="kaprog" id="exampleFormControlSelec">
                        <option value="{{$level[0]->id_jurusan}}">Pilih</option>
                        @foreach($ex as $e)
                        <option value="{{$e->id_jurusan}}">{{$e->nama_jurusan}}</option>
                        @endforeach
                      </select>
                    </div>
                    @endif
      </div>		  
      <div class="modal-footer mt-2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" value="" name="aedit">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

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