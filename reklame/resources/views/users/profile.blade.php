@extends('templet.main')
@section('content')
<div class="row justify-content-center">
    <!-- profile -->
    <div class="col-lg-3 mr-3 card mb-4 py-3 border-bottom-success">
      <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                 <dt>Email</dt>
                 <dd>{{Auth::user()->email}}</dd>
                 <dt>Nama</dt>
                 <dd>{{Auth::user()->name}}</dd>
                 <dt>Level User</dt>
                 <dd>{{Auth::user()->level}}</dd>            
                </div>
            </div>
      </div>
    </div>
      <!-- profile --> 
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
      <form action="{{route('upt.us')}}" method="post">
            @csrf
         <div class="row justify-content-center">
            <div class="col-lg-6">
            <label for="aw" class="col-form-label">Nama</label>
            <input type="text" id="aw" name="name" value="{{Auth::user()->name}}" class="form-control @error('web') is-invalid @enderror">
                          @error('name')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
            </div>
          </div>
             <div class="row justify-content-center mt-4">
                <div class="col-lg-3"> 
                 <button type="submit" class="btn btn-primary btn-block">Edit</button> 
                </div>
              </div>
         </div>
         </form>
        <!-- input -->
      </div>
      <!-- form input -->
</div>
@endsection