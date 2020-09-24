@extends('templet.main')
@section('content')
<div class="row mt-1">
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
<div class="card">
  <div class="card-header">
   Data User
  </div>
  <div class="card-body">
  <div class="container mb-4 table-responsive" style="overflow-y: hidden;">
                <div data-role="main" class="ui-content">
                  <table data-role="table" class="table table-sm table-hover" id="datatable">
                   <thead>
                   <tr>
                   <th>Username</th>
                   <th>Nama</th>
                   <th>Level</th>
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
		<!-- tabel -->
</div>
@endsection
@section('JS')
<script>
$(document).ready(function(){
  $('#datatable').DataTable({
    processing:true,
    serverside:true,
    ajax:"{{route('data.users')}}",
    columns:[
      {data:"email",name:"email"},
      {data:"name",name:"name"},
      {data:"level",name:"level"},
      {data:"aksi",name:"aksi"}
    ]
  });
});
@if(session('succes'))
$(document).ready(function(){
  $('#to').toast('show');
});     
@endif
</script>
@endsection
