<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;

use App\Client;
use App\Transaksi;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       
    }

    public function index()
    {
        $atc=[false,false,true,false,false,false,false,false,false,false];
        $d=['judul'=>'Client','aktif'=>$atc];
        return view('client.index',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'client'=>'required|max:50',
            'perusahaan'=>'required|max:50',
            'core'=>'required|max:50',
            'kotkab'=>'required|max:50',
            'notlp'=>'required|max:13',
            'web'=>'required|max:50',
            'email'=>'required|email',
            'alamat'=>'required'
        ]);
        $crt=Client::create([
        'nama_perusahaan'=>$request->perusahaan,
        'nama_PIC_cli'=>$request->client,
        'core_produk'=>$request->core,
        'alamat_perusahaan_cli'=>$request->alamat,
        'kota_kab_cli'=>$request->kotkab,
        'no_tlp_cli'=>$request->notlp,
        'alamat_web_cli'=>$request->web,
        'alamat_email_cli'=>$request->email
        ]);
        return redirect('/client')->with('succes','Selamat Data Berhasil Di Simpan!');
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
         $client=Client::select('*')->where('id_client',$id)->get();
         $data=[$client[0]->id_client,$client[0]->nama_perusahaan, $client[0]->nama_PIC_cli,$client[0]->core_produk,$client[0]->alamat_perusahaan_cli,$client[0]->kota_kab_cli,$client[0]->no_tlp_cli,$client[0]->alamat_web_cli,$client[0]->alamat_email_cli];
        return redirect('/client')->with('edit',$data);
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
            'client1'=>'required|max:50',
            'perusahaan1'=>'required|max:50',
            'core1'=>'required|max:50',
            'kotkab1'=>'required|max:50',
            'notlp1'=>'required|max:13',
            'web1'=>'required|max:50',
            'email1'=>'required|email',
            'alamat1'=>'required'
        ]);
        $data=Client::where('id_client',$id)->first();
        $data->nama_perusahaan=$request->perusahaan1;
        $data->nama_PIC_cli=$request->client1;
        $data->alamat_perusahaan_cli=$request->alamat1;
        $data->kota_kab_cli=$request->kotkab1;
        $data->core_produk=$request->core1;
        $data->no_tlp_cli=$request->notlp1;
        $data->alamat_web_cli=$request->web1;
        $data->alamat_email_cli=$request->email1;
        $data->save();

        return redirect('/client')->with('succes','Selamat Data Berhasil Di ubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy($id)
    {
        $cek=Transaksi::where('id_client',$id)->get();
        foreach($cek as $ck){
            if($ck->id_transaksi>0){
                return redirect('/client')->with('info',$id);
            }
        }   
        $data=Client::where('id_client',$id)->first();
        $data->delete();
        return redirect('/client')->with('succes','Selamat Data Berhasil Di Hapus!');
    }

    public function clean($id){
            $cek=Transaksi::where('id_client',$id)->delete();
            if($cek){
                $data=Client::where('id_client',$id)->first();
                $data->delete();
                return redirect('/client')->with('succes','Selamat Data Berhasil Di Hapus!');
            }else{
                return redirect('/client');
            }
    }

    // datatable
    public function DataTable(){
       $model=Client::query();
    return (new EloquentDataTable($model))
    ->addColumn('aksi',function($m){
        return "<a href='/client/".$m->id_client."' class='btn btn-warning btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>Hapus</a><a href='/client/edit/".$m->id_client."' class='btn btn-info btn-sm btn-block'>Edit</a>";
    })->rawColumns(['aksi'])
    ->toJson();
    }
    // select2
    public function Select2(Request $request){
        $data= Client::whereRaw("(nama_perusahaan LIKE '%".$request->get('q')."%' OR nama_PIC_cli LIKE '%".$request->get('q')."%')")
        ->limit(30)
        ->get();
        return response()->json($data);
    }
    //ajax
    public function Ajax(Request $request){
        $data= Client::where('id_client',$request->get('q'))
        ->get()
        ->toJson();
        return $data;
    }
}
