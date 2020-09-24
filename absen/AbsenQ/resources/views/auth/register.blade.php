@extends('LoginTemplet')

@section('content')
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4">Register</h2>
              <div class="auto-form-wrapper">
               <form method="POST" action="{{ route('register') }}">
                        @csrf
                  <div class="form-group">
                    <div class="input-group">
                      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autocomplete="username" placeholder="Username" autofocus>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          @error('username')
                          <i class="mdi text-danger mdi-check-circle-outline">{{ $message }}</i>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                     <input id="name" type="text" class="form-control" name="nama" value="{{ old('nama') }}" autocomplete="nama" placeholder="Nama" autofocus>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          @error('nama')
                          <i class="mdi text-danger mdi-check-circle-outline">{{ $message }}</i>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input id="password" type="password" class="form-control" name="password" placeholder="Password" autocomplete="new-password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                           @error('password')
                          <i class="mdi text-danger mdi-check-circle-outline">{{ $message }}</i>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input id="password-confirm" type="password" class="form-control" placeholder="Confirmasi Password" name="password_confirmation" autocomplete="new-password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                        @error('password')
                          <i class="mdi text-danger mdi-check-circle-outline">{{ $message }}</i>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <select id="jenis" type="text" class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" autocomplete="jenis_kelamin" autofocus>
                      <option value="">Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                         <div class="input-group-append">
                        <span class="input-group-text">
                        @error('jenis_kelamin')
                          <i class="mdi text-danger mdi-check-circle-outline">{{ $message }}</i>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <textarea id="alamat" type="text" class="form-control" style="padding-top:10px;" name="alamat" placeholder="Alamat" autocomplete="alamat" autofocus>{{ old('alamat') }}</textarea>
                      <div class="input-group-append">
                        <span class="input-group-text">
                        @error('alamat')
                          <i class="mdi text-danger mdi-check-circle-outline">{{ $message }}</i>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block" type="submit">Register</button>
                  </div>
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                    <a href="{{url('/login')}}" class="text-black text-small">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection
