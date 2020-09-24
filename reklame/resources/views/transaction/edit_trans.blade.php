@extends('templet.main')
@section('CSS')
<link rel="stylesheet" href="{{url('select2')}}/css/select2.min.css">
@endsection
@section('content')
<div class="row justify-content-center">
      <!-- form input --> 
      <div class="col-lg-8 card mb-4 py-3 border-bottom-success">
      <div class="card-body">
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
      <form action="{{route('upt.trans',$trans[0]->id_transaksi)}}" method="post">
      {{method_field('put')}}
            @csrf
            <input type="hidden" name="id_c" value="{{$trans[0]->id_client}}">
            <input type="hidden" name="id_b" value="{{$trans[0]->id_bilboard}}">
        <!-- input -->
         <div class="row">
            <div class="col-lg-6">
            <label for="nc" class="col-form-label">Client</label>
            <select name="client" id="client" class="itemName form-control"></select>
            <label for="np" class="mt-1 col-form-label">Bilboard</label>
            <select name="bilboard" id="bil" class="itemName form-control"></select>
            <label class="mt-1 col-form-label">Kontrak</label>
            <input type="text" id="dtp" value="{{$tgl[0]}}" name="kontrak" class="form-control" required>
            <label class="mt-1 col-form-label">Mulai Tayang</label>
            <input type="text" id="dtp1" value="{{$tgl[1]}}" name="mulai_tayang" class="form-control" required>
            <label class="mt-1 col-form-label">Akhir Tayang</label>
            <input type="text" id="dtp2" value="{{$tgl[2]}}" name="akhir_tayang" class="form-control" required>
            </div>
            <div class="col-lg-6">
                <div class="row mt-4">
                 <div class="col-12">
                 <img src="{{url('img')}}/bilboard/{{$trans[0]->gambar1}}" id="imgView" alt="" class="img-fluid">         
                 </div>
                </div>
                <dt>Detail Client</dt>
                <dd id="namaP">Perusahaan :{{$trans[0]->nama_perusahaan}}</dd>
                <dd id="namaPP">Pemilik :{{$trans[0]->nama_PIC_cli}}</dd>
                <dd id="pc">Alamat :{{$trans[0]->alamat_perusahaan_cli}}</dd>
                <dd id="cc">Core :{{$trans[0]->core_produk}}</dd>
                <dt>Detail Bilboard</dt>
                <dd id="ul">Ukuran :{{$trans[0]->ukuran_tinggi}}x{{$trans[0]->ukuran_lebar}}</dd>
                <dd id="ut">Kota/kab :{{$trans[0]->kota_kab_bil}}</dd>
                <dd id="jm">Jumlah Muka :{{$trans[0]->jumlah_muka}}</dd>
            </div>
          </div>
             <div class="row justify-content-center mt-4">
                <div class="col-lg-3"> 
                 <button type="submit" class="btn btn-primary btn-block">simpan</button>
                </div>
              </div>
         </div>
         </form>
        <!-- input -->
      </div>
      <!-- form input -->
</div>
<!-- table -->
<div class="card">
  <div class="card-header">
    Transaksi
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
@section('JS')
<script src="{{url('select2')}}/js/select2.min.js"></script>
<script>
$('#client').select2({
  placeholder:"cari client",
  ajax:{
    url:"{{route('select.clint')}}",
    dataType:"json",
    delay:250,
    data: function(params){
      return {
        q : params.term
      }
    },
    processResults:function(data){
      return{
        results:$.map(data,function(item){
          return{
          text: item.nama_perusahaan+' - '+item.nama_PIC_cli,
          id:item.id_client,
          value:item.id_client
          }
        })
      };
    },
    cache:true
  },
  templateSelection: function(selection){
    var result=selection.text.split('-');
    return result[0];
  }
});

$('#bil').select2({
  placeholder:"cari Bilboard",
  ajax:{
    url:"{{route('select.bil')}}",
    dataType:"json",
    delay:250,
    data: function(params){
      return {
        q : params.term
      }
    },
    processResults:function(data){
      return{
        results:$.map(data,function(item){
          return{
          text: item.alamat_bil+' - '+item.tipe_bil,
          id:item.id_bilboard,
          value:item.id_bilboard
          }
        })
      };
    },
    cache:true
  },
  templateSelection: function(selection){
    var result=selection.text.split('-');
    return result[0];
  }
})

$('#client').change(function(){
 var client=$('#client').val();
 $.ajax({
   url:"{{route('ajax.clint')}}",
   type :"GET",
   data:{
     q:client
   },
   success:function(dataResult){
     var res=JSON.parse(dataResult);
     $('#pc').text("Alamat : "+res[0].alamat_perusahaan_cli)
     $('#namaP').text("Nama Perusahaan : "+res[0].nama_perusahaan)
     $('#namaPP').text("Pemilik : "+res[0].nama_PIC_cli)
     $('#cc').text("Core Produk : "+res[0].core_produk)
   }
  })
  // console.log(dataUrl);
 })

$('#bil').change(function(){
 var bil=$('#bil').val();
 $.ajax({
   url:"{{route('ajax.bil')}}",
   type :"GET",
   data:{
     q:bil
   },
   success:function(dataResult){
     var res=JSON.parse(dataResult);
     $('#ul').text("Ukuran : "+res[0].ukuran_lebar+"x"+res[0].ukuran_tinggi)
     $('#ut').text("Kota/Kab : "+res[0].kota_kab_bil)
     $('#jm').text("Jumlah Muka : "+res[0].jumlah_muka)
     $('#imgView').attr('src', "<?=url('img')?>/bilboard/"+res[0].gambar1);
   }
  })
  // console.log(dataUrl);
 })


 $(document).ready(function(){
  $('#datatable').DataTable({
    processing:true,
    serverside:true,
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
      {data:"tipe_bil",name:"tipe_bil"},
      {data:"aksi",name:"aksi"}
    ]
  });
});

</script>

@if(session('succes'))
<script>
$(document).ready(function(){
  $('#to').toast('show');
});     

</script>
@endif

@endsection
