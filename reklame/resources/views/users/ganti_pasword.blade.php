@extends('templet.main')
@section('content')
<div class="row justify-content-center">
<div class="col-lg-8 card mb-4 py-3 border-bottom-success">
      <div class="card-body">
        <!-- input -->
        <form action="{{route('add.pass')}}" method="post">
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
      @if(session('info'))
      <div class="toast" id="too" role="alert" aria-live="assertive" data-delay="5000" aria-atomic="true">
        <div class="toast-header">
          <!-- <img src="https://img.icons8.com/offices/30/000000/ok.png" class="rounded mr-2" alt="..."> -->
          <strong class="mr-auto"></strong>
          <small>Error</small>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
        {{session('info')}}
        </div>
      </div>
      @endif
         <div class="row justify-content-center">
            <div class="col-lg-6">
            <label for="no" class="col-form-label">Password Lama</label>
            <input type="text" id="no" name="psw" value="{{old('psw')}}" class="form-control @error('psw') is-invalid @enderror">
                         @error('psw')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="no" class="col-form-label">Password Baru</label>
            <input type="text" id="no" name="psw_baru" value="{{old('psw_baru')}}" class="form-control @error('psw_baru') is-invalid @enderror">
                         @error('psw_baru')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            <label for="no" class="col-form-label">Konfirmasi Password</label>
            <input type="text" id="no" name="confirm" value="{{old('confirm')}}" class="form-control @error('confirm') is-invalid @enderror">
                         @error('confirm')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          
                 <button type="submit" class="btn btn-primary mt-3 btn-block">Edit</button> 
            </div>
          </div>      
         </div>
         </form>
        <!-- input -->
      </div>
      </div>
      @endsection

      @section("JS")
      @if(session('succes'))
<script>
$(document).ready(function(){
  $('#to').toast('show');
});     

</script>
@endif
      @if(session('info'))
<script>
$(document).ready(function(){
  $('#too').toast('show');
});     

</script>
@endif
      @endsection