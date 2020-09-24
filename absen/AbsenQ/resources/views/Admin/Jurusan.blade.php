@extends('HomeTemplat')
@section('content')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           @if(!session('edit'))
           <div class="row justify-content-center">
            <div class="col-lg-7">
                   <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Tambahkan Jurusan</h4>
                        <form class="forms-sample" method="post" action="/jurusan">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan')
                            is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Jurusan">
                          @error('nama_jurusan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>
                          
                          <button type="submit" class="btn btn-outline-primary btn-fw">
                            <i class="mdi mdi-file-document"></i>Submit</button>
                        </form>
                        @if(session('succes'))
                          <div class="alert alert-success mt-2" role="alert"><small>{{session('succes')}}</small></div>
                        @endif
                      </div>
                    </div>
            </div>
           </div>
          @endif

          @if(session('edit'))  
           <div class="row justify-content-center">
            <div class="col-lg-7">
                   <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Jurusan</h4>
                        <form class="forms-sample" method="post" action="{{route('jurusan.edit',session('edit')[1] )}}">
                        @csrf 
                        {{method_field('put')}}
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jurusan</label>
                            <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan')
                            is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Jurusan" value="{{session('edit')[0]}}">
                          @error('nama_jurusan')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                          </div>
                          
                          <button type="submit" name="id" value="{{session('edit')[1]}}" class="btn btn-outline-primary btn-fw">
                            <i class="mdi mdi-file-document"></i>Submit</button>
                            <a href="/jurusan" class="btn btn-outline-danger">
                            <i class="mdi mdi-alert-outline"></i>Cencel</a>
                        </form>
                        @if(session('succes'))
                          <div class="alert alert-success mt-2" role="alert"><small>{{session('succes')}}</small></div>
                        @endif
                      </div>
                    </div>
            </div>
           </div>
          @endif
          
          <div class="row justify-content-center mt-3">
              <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Jurusan</h4>
                    <input type="text" name="serch" id="src" class="form-control" placeholder="Cari ..">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $data1)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$data1->nama_jurusan}}</td>
                          <td>
                          <a href="jurusan/{{$data1->id_jurusan}}/edit" class="btn btn-outline-success"><i class="mdi mdi-cloud-download"></i>edit</a>
                            <a href="jurusan/{{$data1->id_jurusan}}/delete" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin?')">
                            <i class="mdi mdi-alert-outline"></i>Hapus</a>
                            </td>
                        </tr>
                     @endforeach
                      </tbody>
                    </table>
                    {{$data->links()}}
                  </div>
                </div>
              </div>
          </div>
 
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="p-4 border-bottom bg-light">
                    <h4 class="card-title mb-0">Data Siswa Berdasarkan Kelas</h4>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center pb-4">
                      <h4 class="card-title mb-0">Kelas Performance</h4>
                      <div id="line-traffic-legend"></div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <h2 class="mb-0 font-weight-medium">$1,334</h2>
                        <p class="mb-5 text-muted">Jumlah</p>
                      </div>
                    </div>
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
          </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
<!-- modal -->

@endsection
