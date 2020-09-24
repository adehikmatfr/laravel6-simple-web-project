@extends('templet.main')
@section('content')
<div class="row justify-content-center">
      <!-- form input -->
      <div class="col-lg-8 card mb-4 py-3 border-bottom-success">
      <div class="card-body">
        <!-- input -->
        
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
      @if(!session('edit'))
      <form action="{{route('add.client')}}" method="post">
      @csrf
         <div class="row">
            <div class="col-lg-6">
            <label for="no" class="col-form-label">Nama Client</label>
            <input type="text" id="no" name="client" value="{{old('client')}}" class="form-control @error('client') is-invalid @enderror">
                          @error('client')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="np" class="mt-1 col-form-label">Nama Perusahaan</label>
            <input type="text" id="np" name="perusahaan" value="{{old('perusahaan')}}" class="form-control @error('perusahaan') is-invalid @enderror">
                          @error('perusahaan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="kk" class="mt-1 col-form-label">Kota/Kabupaten</label>
            <input type="text" id="kk" name="kotkab" value="{{old('kotkab')}}" class="form-control @error('kotkab') is-invalid @enderror">
                         @error('kotkab')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="kp" class="mt-1 col-form-label">Core Produk</label>
            <input type="text" id="kp" name="core" value="{{old('core')}}" class="form-control @error('core') is-invalid @enderror">
                         @error('core')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="nt" class="mt-1 col-form-label">Nomor Telpon</label>
            <input type="text" id="nt" name="notlp" value="{{old('notlp')}}" class="form-control @error('notlp') is-invalid @enderror">
                          @error('notlp')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            </div>
            <div class="col-lg-6">
            <label for="aw" class="col-form-label">Alamat Website</label>
            <input type="text" id="aw" name="web" value="{{old('web')}}" class="form-control @error('web') is-invalid @enderror">
                          @error('web')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="ae" class="mt-1 col-form-label">Alamat Email</label>
            <input type="email" id="ae" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="ap" class="mt-1 col-form-label">Alamat Perusahaan</label>
            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="ap" cols="38" rows="4">{{old('alamat')}}</textarea>
                          @error('alamat')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            </div>
          </div>
             <div class="row justify-content-center mt-4">
                <div class="col-lg-3"> 
                 <button type="submit" class="btn btn-primary btn-block">simpan</button>
                </div>
              </div>
         </div>
         </form>
         @endif
<!-- edit -->
@if(session('edit'))
<form action="{{route('upt.client',session('edit')[0])}}" method="post">
@csrf
      {{method_field('put')}}
           <div class="row">
            <div class="col-lg-6">
            <label for="no" class="col-form-label">Nama Client</label>
            <input type="text" id="no" name="client1" value="{{session('edit')[2]}}" class="form-control @error('client') is-invalid @enderror">
                          @error('client')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="np" class="mt-1 col-form-label">Nama Perusahaan</label>
            <input type="text" id="np" name="perusahaan1" value="{{session('edit')[1]}}" class="form-control @error('perusahaan') is-invalid @enderror">
                          @error('perusahaan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="kk" class="mt-1 col-form-label">Kota/Kabupaten</label>
            <input type="text" id="kk" name="kotkab1" value="{{session('edit')[5]}}" class="form-control @error('kotkab') is-invalid @enderror">
                         @error('kotkab')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="kp" class="mt-1 col-form-label">Core Produk</label>
            <input type="text" id="kp" name="core1" value="{{session('edit')[3]}}" class="form-control @error('core') is-invalid @enderror">
                         @error('core')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="nt" class="mt-1 col-form-label">Nomor Telpon</label>
            <input type="text" id="nt" name="notlp1" value="{{session('edit')[6]}}" class="form-control @error('notlp') is-invalid @enderror">
                          @error('notlp')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            </div>
            <div class="col-lg-6">
            <label for="aw" class="col-form-label">Alamat Website</label>
            <input type="text" id="aw" name="web1" value="{{session('edit')[7]}}" class="form-control @error('web') is-invalid @enderror">
                          @error('web')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="ae" class="mt-1 col-form-label">Alamat Email</label>
            <input type="email" id="ae" name="email1" value="{{session('edit')[8]}}" class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="ap" class="mt-1 col-form-label">Alamat Perusahaan</label>
            <textarea name="alamat1" class="form-control @error('alamat') is-invalid @enderror" id="ap" cols="38" rows="4">{{session('edit')[4]}}</textarea>
                          @error('alamat')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            </div>
          </div>
             <div class="row justify-content-center mt-4">
                <div class="col-lg-3"> 
                 <button type="submit" class="btn btn-primary mb-1 btn-block">Edit</button>
                </div>
                <div class="col-lg-3"> 
                 <a href="{{url('')}}/client" class="btn btn-info btn-block">Batal</a>
                </div>
              </div>
         </div>
         </form>
         @endif
<!-- edit -->
        <!-- input -->
      </div>
      <!-- form input -->
</div>
<!-- table -->

<div class="card">
  <div class="card-header">
  Data Client
  </div>
  <div class="card-body">
    
		<!-- tabel -->
    <div class="container mb-4 table-responsive" style="overflow-y: hidden;">
                <div data-role="main" class="ui-content">
                  <table data-role="table" class="table table-sm table-hover" id="datatable">
                   <thead>
                   <tr>
                   <th>Nama</th>
                   <th>Perusahaan</th>
                   <th>Kota/Kabupaten</th>
                   <th>Core Produk</th>
				           <th>Alamat</th>
				           <th>Nomor Telpon</th>
                   <th>Email</th>
                   <th>Website</th>
                   <th>Aksi</th>
                   </tr>
                   </thead>
                   <tbody>
                   
                   </tbody>
                  </table>
                </div>
              
          </div>
          <!-- table -->
  </div>
</div>


@endsection

@section('JS')
@if(session('succes'))
<script>
$(document).ready(function(){
  $('#to').toast('show');
  $('#inf').toast('show');
});     

</script>
@endif
<script>
$(document).ready(function(){
  $('#datatable').DataTable({
    processing:true,
    serverside:true,
    ajax:"{{route('data.client')}}",
    columns:[
      {data:"nama_PIC_cli",name:"nama_PIC_cli"},
      {data:"nama_perusahaan",name:"nama_perusahaan"},
      {data:"kota_kab_cli",name:"kota_kab_cli"},
      {data:"core_produk",name:"core_produk"},
      {data:"alamat_perusahaan_cli",name:"alamat_perusahaan_cli"},
      {data:"no_tlp_cli",name:"no_tlp_cli"},
      {data:"alamat_email_cli",name:"alamat_email_cli"},
      {data:"alamat_web_cli",name:"alamat_web_cli"},
      {data:"aksi",name:"aksi"}
    ]
  });
});     
</script>

@endsection