@extends('templet.auth')
@section('title')
Register
@endsection
@section('content')
<div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="form-group">
                    <input id="name" type="text" placeholder="masukan nama..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    <div class="form-group">
                    <input id="email" type="email" placeholder="masukan email..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                    <input id="password" type="password" placeholder="masukan password..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    <div class="form-group">
                    <input id="password-confirm" placeholder="konfirmasi password..." type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">     
                    </div>
            
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Daftar
                    </button>
                    <hr>
                  </form>
                   <div class="text-center">
                    <a class="small" href="{{route('login')}}">login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    @endsection