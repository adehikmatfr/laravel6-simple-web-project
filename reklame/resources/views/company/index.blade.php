@extends('templet.main')
@section('content')
<div class="row justify-content-center">
    <!-- profile -->
    <div class="col-lg-3 mr-3 card mb-4 py-3 border-bottom-success">
      <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                 <dt>Owner Perusahaan</dt>
                 <dd>{{$data[0]->nama_PIC}}</dd>
                 <dt>Nama Perusahaan</dt>
                 <dd>{{$data[0]->nama_perusahaan_owner}}</dd>
                 <dt>Kota/Kabupaten</dt>
                 <dd>{{$data[0]->kota_kab}}</dd>
                 <dt>Alamat</dt>
                 <dd>{{$data[0]->alamat}}</dd>
                 <dt>Nomor Telpon</dt>
                 <dd>{{$data[0]->no_tlp}}</dd>
                 <dt>Alamat Email</dt>
                 <dd>{{$data[0]->alamat_email}}</dd>
                 <dt>Alamat Website</dt>
                 <dd>{{$data[0]->alamat_web}}</dd>            
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-5">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">edit</button>
                </div>
            </div>
      </div>
    </div>
      <!-- profile --> 
      <!-- form input -->
      <div class="col-lg-8 card mb-4 py-3 border-bottom-success">
      <div class="card-body">
        <!-- input -->
        <form action="{{route('add.company')}}" method="post">
      @csrf
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
         <div class="row">
            <div class="col-lg-6">
            <label for="no" class="col-form-label">Nama Owner</label>
            <input type="text" id="no" name="owner" value="{{old('owner')}}" class="form-control @error('owner') is-invalid @enderror">
                         @error('owner')
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
                @if(!$data)
                 <button type="submit" class="btn btn-primary btn-block">simpan</button>
                  @endif                
                </div>
              </div>
         </div>
         </form>
        <!-- input -->
      </div>
      <!-- form input -->
</div>
@endsection
@section('JS')
 <!-- form input edit-->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('upt.company',$data[0]->id_owner)}}" id="owr" method="post">
        <!-- input -->
      @csrf
      {{method_field('put')}} 
         <div class="row">
            <div class="col-lg-6">
            <label for="no" class="col-form-label">Nama Owner</label>
            <input type="text" id="no" name="edit_owner" value="{{$data[0]->nama_PIC}}" class="form-control @error('edit_owner') is-invalid @enderror">
                         @error('edit_owner')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="np" class="mt-1 col-form-label">Nama Perusahaan</label>
            <input type="text" id="np" name="edit_perusahaan" value="{{$data[0]->nama_perusahaan_owner}}" class="form-control @error('edit_perusahaan') is-invalid @enderror">
                          @error('edit_perusahaan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="kk" class="mt-1 col-form-label">Kota/Kabupaten</label>
            <input type="text" id="kk" name="edit_kotkab" value="{{$data[0]->kota_kab}}" class="form-control @error('edit_kotkab') is-invalid @enderror">
                         @error('edit_kotkab')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="nt" class="mt-1 col-form-label">Nomor Telpon</label>
            <input type="text" id="nt" name="edit_notlp" value="{{$data[0]->no_tlp}}" class="form-control @error('edit_notlp') is-invalid @enderror">
                          @error('edit_notlp')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            </div>
            <div class="col-lg-6">
            <label for="aw" class="col-form-label">Alamat Website</label>
            <input type="text" id="aw" name="edit_web" value="{{$data[0]->alamat_web}}" class="form-control @error('edit_web') is-invalid @enderror">
                          @error('edit_web')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="ae" class="mt-1 col-form-label">Alamat Email</label>
            <input type="email" id="ae" name="edit_email" value="{{$data[0]->alamat_email}}" class="form-control @error('edit_email') is-invalid @enderror">
                          @error('edit_email')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="ap" class="mt-1 col-form-label">Alamat Perusahaan</label>
            <textarea name="edit_alamat" class="form-control @error('edit_alamat') is-invalid @enderror" id="ap" cols="38" rows="4">{{$data[0]->alamat}}</textarea>
                          @error('edit_alamat')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            </div>
          </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
      <!-- form input edit -->

@if(session('succes'))
<script>
$(document).ready(function(){
  $('#to').toast('show')
});     
</script>
@endif

@endsection