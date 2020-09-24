@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$abs}}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Absen Masuk</h5>
                            <p class="mb-0 text-muted">studens</p>
                          </div>
                           
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$sis-$abs}}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Belum Absen</h5>
                            <p class="mb-0 text-muted">studens</p>
                          </div>
                         
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$ket[0]}}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Ijin</h5>
                            <p class="mb-0 text-muted">studens</p>
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$ket[1]}}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Sakit</h5>
                            <p class="mb-0 text-muted">studens</p>
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$ket[2]}}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Alfa</h5>
                            <p class="mb-0 text-muted">studens</p>
                          </div>
                          
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper">
                            <h3 class="mb-0 font-weight-semibold">{{$ket[3]}}</h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Hadir</h5>
                            <p class="mb-0 text-muted">studens</p>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            @if($user->id_jabatan!=5)
            <form action="{{route('cari')}}" method="GET">
              <div class="row pl-3">
              <div class="col-lg-3">

              <label for="">Masukan Nama</label>
              <input type="text" name="nama" class="form-control">
              </div>
              <div class="col-lg-3">
              <label for="">Pilih Kelas</label>
              <select name="kelas" id="" class="form-control">
              <option value="">PIlih</option>
              @foreach($kelas as $kel)
              <option value="{{$kel->id_kelas}}">{{$kel->nama_kelas}} {{$kel->nama_jurusan}} {{$kel->urutan}}</option>
              @endforeach
              </select>
              </div>
              <div class="col-lg-3 mt-4">
              <button type="submit" class="btn btn-md btn-success mt-2">Cari</button>
              </div>
              </div>
              </form>
              @endif
              <div class="container table-responsive mt-3" style="overflow-y: hidden;">
                <div data-role="main" class="ui-content">
                  <table data-role="table" class="table table-sm table-hover" >
                   <thead>
                   <tr>
                   <th>Nama</th>
                   <th>Kelas</th>
                   <th>Masuk</th>
                   <th>Alamat</th>
                   <th>Keterangan</th>
				           </tr>
                   </thead>
                   <tbody>
                   @foreach($siswa as $s)
                   <tr>
                   <td>{{$s->nama}}</td>
                   <td>{{$s->nama_kelas}} {{$s->nama_jurusan}} {{$s->urutan}}</td>
                   <td>{{$s->masuk}}</td>
                   <td>{{$s->alamat}}</td>
                   <td>{{$s->keterangan}}</td>
				           </tr>
                   @endforeach
                   </tbody>
                  </table>
                </div>

          </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endsection