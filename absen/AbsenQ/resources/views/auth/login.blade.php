@extends('LoginTemplet')

@section('content')
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
             <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
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
                    <label class="label">Password</label>
                    <div class="input-group">
                     <input id="password" type="password" class="form-control" name="password" autocomplete="current-password" placeholder="********">
                     <div class="input-group-append">
                        <span class="input-group-text">
                        @error('password')
                          <i class="mdi mdi-check-circle-outline">{{ $message }}</i>
                        @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Login</button>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                  </div>
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Not a member ?</span>
                    <a href="{{url('/register')}}" class="text-black text-small">Create new account</a>
                  </div>
                </form>
              </div>
              <ul class="auth-footer">
                <li>
                  <a href="#">Conditions</a>
                </li>
                <li>
                  <a href="#">Help</a>
                </li>
                <li>
                  <a href="#">Terms</a>
                </li>
              </ul>
              <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection
