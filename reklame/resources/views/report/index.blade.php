@extends('templet.main')
@section('CSS')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@endsection
@section('content')
  <div class="row">
  <div class="card mt-1">
  <div class="card-header">
    Detail Bilboard
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
<!-- client -->
<div class="card mt-1">
  <div class="card-header">
    Client
  </div>
  <div class="card-body">
		<!-- tabel -->
    <div class="container mb-4 table-responsive" style="overflow-y: hidden;">
                <div data-role="main" class="ui-content">
                  <table data-role="table" class="table table-sm table-hover" id="datatable1">
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
<!-- Bilboard -->
<div class="card mt-1">
  <div class="card-header">
    Detail Bilboard
  </div>
  <div class="card-body">
    <!-- tabel -->
    <div class="container mb-4 table-responsive" style="overflow-y: hidden;">
                <div data-role="main" class="ui-content">
                  <table data-role="table" class="table table-sm table-hover" id="datatable2">
                   <thead>
                   <tr>
                   <th>Alamat</th>
                   <th>Kabupaten</th>
                   <th>Tipe</th>
                   <th>Jumlah Muka</th>
                   <th>Ukuran Lebar</th>
                   <th>Ukuran Tinggi</th>
				           <th>Tinggi Papan</th>
                  <th>Nomor Ijin</th>
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
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>

    $(document).ready(function(){
  $('#datatable').DataTable({
    processing:true,
    serverside:true,
    dom: 'Bfrtip',
    buttons: ['excel', 'pdf', 'print'],
    ajax:"{{route('data.trans')}}",
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
      {data:"tipe_bil",name:"tipe_bil"}
    ]
  });

  $('#datatable1').DataTable({
    processing:true,
    serverside:true,
    dom: 'Bfrtip',
    buttons: ['excel', 'pdf', 'print'],
    ajax:"{{route('data.client')}}",
    columns:[
      {data:"nama_PIC_cli",name:"nama_PIC_cli"},
      {data:"nama_perusahaan",name:"nama_perusahaan"},
      {data:"kota_kab_cli",name:"kota_kab_cli"},
      {data:"core_produk",name:"core_produk"},
      {data:"alamat_perusahaan_cli",name:"alamat_perusahaan_cli"},
      {data:"no_tlp_cli",name:"no_tlp_cli"},
      {data:"alamat_email_cli",name:"alamat_email_cli"},
      {data:"alamat_web_cli",name:"alamat_web_cli"}
    ]
  });

  $('#datatable2').DataTable({
    processing:true,
    serverside:true,
    dom: 'Bfrtip',
    buttons: ['excel', 'pdf', 'print'],
    ajax:"{{route('data.bil')}}",
    columns:[
      {data:"alamat_bil",name:"alamat_bil"},
      {data:"kota_kab_bil",name:"kota_kab_bil"},
      {data:"tipe_bil",name:"tipe_bil"},
      {data:"jumlah_muka",name:"jumlah_muka"},
      {data:"ukuran_lebar",name:"ukuran_lebar"},
      {data:"ukuran_tinggi",name:"ukuran_tinggi"},
      {data:"tinggi_papan",name:"tinggi_papan"},
      {data:"no_ijin",name:"no_ijin"}
    ]
  });

});

    </script>
    @endsection