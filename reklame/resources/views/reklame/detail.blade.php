@extends('templet.main')
@section('content')
<div class="row">
@foreach($bil as $b)
  <div class="col-lg-4 mb-4">
    <div class="card h-100">
    <div class="row">
      <div class="col-lg-12"><img src="{{url('img')}}/bilboard/{{$b->gambar1}}" class="card-img-top img-fluid" alt="..."></div>
    </div>
      <div class="card-body">
        <h5 class="card-title">Detail Bilboard</h5>
        Alamat : {{$b->alamat_bil}}<br>
        Tipe   : {{$b->tipe_bil}}<br>
        Ukuran : {{$b->ukuran_lebar}}x{{$b->ukuran_lebar}} Meter <br>
        Jumlah muka : {{$b->jumlah_muka}}<br>
        Nomor Ijin : {{$b->no_ijin}}<br>
        Status : @if($b->status>0)Di Pesan @endif @if($b->status==0)Belum Di Pesan @endif
        <a href='{{route("del.bil","$b->id_bilboard")}}' class='btn btn-warning btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>Hapus</a><a href='{{route("edit.bil","$b->id_bilboard")}}' class='btn btn-info btn-sm btn-block'>Edit</a>
      </div>
    </div>
    </div>
  @endforeach
  {{ $bil->links() }}
  </div>
@endsection
