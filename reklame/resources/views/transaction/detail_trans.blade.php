@extends('templet.main')
@section('content')
<div class="row">
@foreach($trans as $b)
  <div class="col-lg-4 mb-4">
    <div class="card h-100">
    <div class="row">
      <div class="col-lg-12"><img src="{{url('img')}}/bilboard/{{$b->gambar1}}" class="card-img-top img-fluid" alt="..."></div>
    </div>
      <div class="card-body">
        <h5 class="card-title">Detail Bilboard</h5>
        Perusahaan : {{$b->nama_perusahaan}}<br>
        Pemilik : {{$b->nama_PIC_cli}}<br>
        Alamat : {{$b->alamat_bil}}<br>
        Tipe   : {{$b->tipe_bil}}<br>
        Ukuran : {{$b->ukuran_lebar}}x{{$b->ukuran_lebar}} Meter <br>
        Jumlah muka : {{$b->jumlah_muka}}<br>
        Tanggal Kontrak: {{$b->tgl_kontrak}}<br>
        Tanggal Tayang : {{$b->tgl_mulai}}<br>
        Tanggal Akhir Tayang : {{$b->tgl_akhir}}<br>
        Status : @if($b->status>0) Aktif @endif @if($b->status==0) Nonaktif @endif
        <a href='{{route("del.trans","$b->id_transaksi")}}' class='btn btn-warning btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>Hapus</a><a href='{{route("edit.trans","$b->id_transaksi")}}' class='btn btn-info btn-sm btn-block'>Edit</a>
      </div>
    </div>
    </div>
  @endforeach
  {{ $trans->links() }}
  </div>

  <div class="card">
  <div class="card-header">
    Transaksi Expaired
  </div>
  <div class="card-body">
    <!-- tabel -->
    <div class="container mb-4 table-responsive" style="overflow-y: hidden;">
                <div data-role="main" class="ui-content">
                  <table data-role="table" class="table table-sm table-hover" id="datatable">
                   <thead>
                   <tr>
                   <th>Code Transaksi</th>
                   <th>Perusahaan Client</th>
                   <th>Alamat Bilboard</th>
                   <th>Kontrak</th>
				           <th>Mulai Tayang</th>
				           <th>Akhir Tayang</th>
                   <th>Lebar</th>
                   <th>panjang</th>
                   <th>tinggi papan</th>
                   <th>jumlah muka</th>
                   <th>Tipe</th>
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

@section("JS")
<script>
$(document).ready(function(){
  $('#datatable').DataTable({
    processing:true,
    serverside:true,
    ajax:"{{route('exp.trans')}}",
    columns:[
      {data:"code_transaksi",name:"code_transaksi"},
      {data:"nama_perusahaan",name:"nama_perusahaan"},
      {data:"alamat_bil",name:"alamat_bil"},
      {data:"tgl_kontrak",name:"tgl_kontrak"},
      {data:"tgl_mulai",name:"tgl_mulai"},
      {data:"tgl_akhir",name:"tgl_akhir"},
      {data:"ukuran_lebar",name:"ukuran_lebar"},
      {data:"ukuran_tinggi",name:"ukuran_tinggi"},
      {data:"tinggi_papan",name:"tinggi_papan"},
      {data:"jumlah_muka",name:"jumlah_muka"},
      {data:"tipe_bil",name:"tipe_bil"},
      {data:"aksi",name:"aksi"}
    ]
  });
});

</script>
@endsection