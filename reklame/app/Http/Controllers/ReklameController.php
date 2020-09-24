<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\EloquentDataTable;
use App\Owner;
use App\Bilboard;
use App\Transaksi;

class ReklameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
         $atc=[false,false,false,true,false,false,false,false,false,false];
         $bil=Bilboard::all();
        $d=['judul'=>'Bilboard','aktif'=>$atc,'bil'=>$bil];
        return view('reklame.bilboard',$d);
    }
   
    public function maps()
    {
        $atc=[false,false,false,true,false,false,false,false,false,false];
        $bil=Bilboard::all();
        $d=['judul'=>'Maps','aktif'=>$atc,'bil'=>$bil];
        return view('reklame.maps',$d);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar1'=>'required|file|image|mimes:jpeg,jpg,png,img',
            'gambar2'=>'required|file|image|mimes:jpeg,jpg,png,img',
            'gambar3'=>'required|file|image|mimes:jpeg,jpg,png,img',
            'lat'=>'required',
            'lng'=>'required',
            'alamat'=> 'required',
            'kotkab'=> 'required|max:50',
            'bilboard'=> 'required',
            'lebar'=> 'required',
            'tinggi'=> 'required',
            'muka'=> 'required',
            'tpapan'=> 'required',
            'ijin'=> 'required'
        ]);

        $img1=$request->file('gambar1');
        $img2=$request->file('gambar2');
        $img3=$request->file('gambar3');
        $nama_img1='bilboard-'.uniqid().".".$img1->getClientOriginalExtension();
        $nama_img2='bilboard-'.uniqid().".".$img2->getClientOriginalExtension();
        $nama_img3='bilboard-'.uniqid().".".$img3->getClientOriginalExtension();
        $url='img/bilboard';
        $img1->move($url,$nama_img1);
        $img2->move($url,$nama_img2);
        $img3->move($url,$nama_img3);

        $id_owr=Owner::orderBy('id_owner','desc')->limit(1)->get();
        $id_owr=$id_owr[0]->id_owner;
        $crt=Bilboard::create([
        'alamat_bil'=>$request->alamat,
        'kota_kab_bil'=>$request->kotkab,
        'id_owner'=>$id_owr,
        'tipe_bil'=>$request->bilboard,
        'jumlah_muka'=>$request->muka,
        'ukuran_lebar'=>$request->lebar,
        'ukuran_tinggi'=>$request->tinggi,
        'tinggi_papan'=>$request->tpapan,
        'longitude'=>$request->lng,
        'latitude'=>$request->lat,
        'gambar1'=>$nama_img1,
        'gambar2'=>$nama_img2,
        'gambar3'=>$nama_img3,
        'status'=>0,
        'no_ijin'=>$request->ijin
        ]);
       
        return redirect('/bilboard')->with('succes','Selamat Data Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bilboard=Bilboard::select('*')->where('id_bilboard',$id)->get();
        $atc=[false,false,false,true,false,false,false,false,false,false];
        $d=['judul'=>'Edit Bilboard','aktif'=>$atc,'bil'=>$bilboard];
        return view('reklame.edit_bil',$d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'lat'=>'required',
            'lng'=>'required',
            'alamat'=> 'required',
            'kotkab'=> 'required|max:50',
            'bilboard'=> 'required',
            'lebar'=> 'required',
            'tinggi'=> 'required',
            'muka'=> 'required',
            'tpapan'=> 'required',
            'ijin'=> 'required'
        ]);
        $data=Bilboard::where('id_bilboard',$id)->get();
        $url='img/bilboard/';
        $target1=$url.$data[0]->gambar1;
        $target2=$url.$data[0]->gambar2;
        $target3=$url.$data[0]->gambar3;
        if($request->gambar1!=null){
           if(file_exists($target1)){
               unlink($target1);
               $img1=$request->file('gambar1');
               $nama_img1='bilboard-'.uniqid().".".$img1->getClientOriginalExtension();
               $img1->move($url,$nama_img1);
               $upt1=Bilboard::where('id_bilboard',$id)->first();
               $upt1->gambar1=$nama_img1;
               $upt1->save();
           }
        }
        if($request->gambar2!=null){
           if(file_exists($target2)){
               unlink($target2);
               $img2=$request->file('gambar2');
               $nama_img2='bilboard-'.uniqid().".".$img2->getClientOriginalExtension();
               $img1->move($url,$nama_img2);
               $upt2=Bilboard::where('id_bilboard',$id)->first();
               $upt2->gambar2=$nama_img2;
               $upt2->save();
           }
        }
        if($request->gambar3!=null){
           if(file_exists($target3)){
               unlink($target3);
               $img3=$request->file('gambar3');
               $nama_img3='bilboard-'.uniqid().".".$img3->getClientOriginalExtension();
               $img1->move($url,$nama_img3);
               $upt3=Bilboard::where('id_bilboard',$id)->first();
               $upt3->gambar3=$nama_img3;
               $upt3->save();
           }
        }
        $upt=Bilboard::where('id_bilboard',$id)->first();
        $upt->alamat_bil=$request->alamat;
        $upt->kota_kab_bil=$request->kotkab;
        $upt->tipe_bil=$request->bilboard;
        $upt->jumlah_muka=$request->muka;
        $upt->ukuran_lebar=$request->lebar;
        $upt->ukuran_tinggi=$request->tinggi;
        $upt->tinggi_papan=$request->tpapan;
        $upt->longitude=$request->lng;
        $upt->latitude=$request->lat;
        $upt->save();

          return redirect('/bilboard')->with('succes','Selamat Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek=Transaksi::where('id_bilboard',$id)->get();
        foreach($cek as $ck){
            if($ck->id_bilboard>0){
                return redirect('/bilboard')->with('info',$id);
            }
        }   
        $data=Bilboard::where('id_bilboard',$id)->first();
        $data->delete();
        return redirect('/bilboard')->with('succes','Selamat Data Berhasil Di Hapus!');
    }

    public function clean($id){
        $cek=Transaksi::where('id_bilboard',$id)->delete();
        if($cek){
            $data=Bilboard::where('id_bilboard',$id)->first();
            $data->delete();
            return redirect('/bilboard')->with('succes','Selamat Data Berhasil Di Hapus!');
        }else{
            return redirect('/bilboard');
        }
    }

    // 
    public function detail(){
        $atc=[false,false,false,true,false,false,false,false,false,false];
        $bil=Bilboard::orderBy('id_bilboard','desc')->paginate(20);
        $d=['judul'=>'Detail Bilboard','aktif'=>$atc,'bil'=>$bil];
        return view('reklame.detail',$d);
    }

    // datatable
    public function DataTable(){
        $model=Bilboard::query();
     return (new EloquentDataTable($model))
     ->addColumn('aksi',function($m){
        if($m->status==0){
            $atc="Aktive";
            $nam="Nonaktive";
        }else{
            $atc="Nonaktive";
            $nam="Aktive";
        }
         return "<a href='/bilboard/".$m->id_bilboard."' class='btn btn-warning btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>Hapus</a><a href='/bilboard/edit/".$m->id_bilboard."' class='btn btn-info btn-sm btn-block'>Edit</a><a href='/bilboard/".$atc."/".$m->id_bilboard."' class='btn btn-primary btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>".$nam."</a>";
     })->rawColumns(['aksi'])
     ->toJson();
     }
     // select2
    public function Select2(Request $request){
        $data= Bilboard::whereRaw("(alamat_bil LIKE '%".$request->get('q')."%' OR tipe_bil LIKE '%".$request->get('q')."%')")
        ->where('status','=',0)
        ->limit(30)
        ->get();
        return response()->json($data);
    }
    //ajax
    public function Ajax(Request $request){
        $data= Bilboard::where('id_bilboard',$request->get('q'))
        ->get()
        ->toJson();
        return $data;
    }

    public function nonaktive($id){
        $data=Bilboard::find($id);
        $data->status=0;
        $data->save();
        return redirect('/bilboard')->with('succes','Selamat Bilboard Berhasil Di nonaktifkan!');
    }

    public function aktive($id){
        $data=Bilboard::find($id);
        $data->status=1;
        $data->save();
        return redirect('/bilboard')->with('succes','Selamat Bilboard Berhasil Di aktifkan!');
    }


}
