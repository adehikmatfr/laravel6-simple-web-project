@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <h3>Daftar User</h3>
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
                          <a href="{{route('user.hapus',$da->id_user)}}" class="btn btn-icons btn-sm btn-rounded btn-outline-danger" onclick="return confirm('apakah anda yakin?')">
                          <i class="fa fa-spin fa-times-circle-o"></i>
                          </a>
                          </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
          {{ $data->links()}}
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <form method="post" action="{{route('user.edit',$ad->id_user)}}">
     @csrf
     {{method_field('put')}}
      <div class="container mt-2">
         <div class="row">
         <div class="col-sm-6">
         Nama User : {{$ad->nama}}
         </div>
         <div class="col-sm-6">
         <select name="jabatan" class="form-control">
         <option value="0">{{$ad->nama_jabatan}}</option>
         @foreach($ja as $jr)
         <option value="{{$jr->id_jabatan}}">{{$jr->nama_jabatan}}</option>
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