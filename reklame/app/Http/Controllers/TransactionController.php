<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\QueryDataTable;
use App\Bilboard;
use App\Owner;
use App\Client;
use App\Transaksi;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atc=[false,false,false,false,true,false,false,false,false,false];
        $bil=Bilboard::all();
        $client=Client::all();
        $d=['judul'=>'Transaction','aktif'=>$atc,'bil'=>$bil,'client'=>$client];
        return view('transaction.index',$d);
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
            'client'=>'required',
            'bilboard'=>'required',
            'kontrak'=>'required',
            'mulai_tayang'=>'required',
            'akhir_tayang'=>'required',   
        ]);

        $mulai=$this->tgl($request->mulai_tayang);
        $akhir=$this->tgl($request->akhir_tayang);
        $kontrak=$this->tgl($request->kontrak);
        $id=$request->client;
        $data=Transaksi::orderBy('id_transaksi','desc')->get();
        $idt=1;
        foreach($data as $da){
            if($da->id_transaksi>0){
                $idt=$da->id_transaksi+1;
            }
        }
        $str='TR/'.$id.'-B'.$request->bilboard.'/'.$mulai.'/'.$idt;

        $tr=Transaksi::create([
            'code_transaksi'=>$str,
            'id_client'=>$request->client,
            'id_bilboard'=>$request->bilboard,
            'tgl_kontrak'=>$kontrak,
            'tgl_mulai'=>$mulai,
            'tgl_akhir'=>$akhir
        ]);

        $bil=Bilboard::find($request->bilboard);
        $bil->status=1;
        $bil->save();
        return redirect('/transaction')->with('succes','Selamat Data Berhasil Di Simpan!');
    }

    public function tgl($dt){
        $date=explode('/',$dt);
        return $date[2].'-'.$date[0].'-'.$date[1];
    }
    public function tgl2($dt){
        $date=explode('-',$dt);
        return $date[2].'/'.$date[1].'/'.$date[0];
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
        $tr=DB::table('transaksi')->join('client','client.id_client','=','transaksi.id_client')
        ->join('bilboard','bilboard.id_bilboard','=','transaksi.id_bilboard')
        ->where('id_transaksi',$id)->get();

        $tgl_k=$this->tgl2($tr[0]->tgl_kontrak);
        $tgl_m=$this->tgl2($tr[0]->tgl_mulai);
        $tgl_a=$this->tgl2($tr[0]->tgl_akhir);
        $tgl=[$tgl_k,$tgl_m,$tgl_a];
        $atc=[false,false,false,false,true,false,false,false,false,false];
        $bil=Bilboard::all();
        $client=Client::all();
        $d=['judul'=>'Transaction','aktif'=>$atc,'bil'=>$bil,'client'=>$client,'trans'=>$tr,'tgl'=>$tgl];
        return view('transaction.edit_trans',$d);
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
            'kontrak'=>'required',
            'mulai_tayang'=>'required',
            'akhir_tayang'=>'required',   
        ]);
        if($request->client){
            $tr=Transaksi::find($id);
            $tr->id_client=$request->client;
            $tr->save();
        }
        if($request->bilboard){
            $tr=Transaksi::find($id);
            $tr->id_bilboard=$request->bilboard;
            $tr->save();
            $bil=Bilboard::find($request->bilboard);
            $bil->status=1;
            $bil->save();
            $bil_edit=Bilboard::find($request->id_b);
            $bil_edit->status=0;
            $bil_edit->save();
        }
        $mulai=$this->tgl($request->mulai_tayang);
        $akhir=$this->tgl($request->akhir_tayang);
        $kontrak=$this->tgl($request->kontrak);
        
        $trans=Transaksi::find($id);
        $trans->tgl_kontrak=$kontrak;
        $trans->tgl_mulai=$mulai;
        $trans->tgl_akhir=$akhir;
        $trans->save();
        return redirect('/transaction')->with('succes','Selamat Data Berhasil Di ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trans=Transaksi::find($id);
        $bil=Bilboard::find($trans->id_bilboard);
        $bil->status=0;
        $bil->save();
        $trans->delete();
        return redirect('/transaction')->with('succes','Selamat Data Berhasil Di Hapus!');
    }


    public function detail(){
            $atc=[false,false,false,false,false,false,true,false,false,false];
            $tr=DB::table('transaksi')->join('client','client.id_client','=','transaksi.id_client')
            ->join('bilboard','bilboard.id_bilboard','=','transaksi.id_bilboard')
            ->orderBy('id_transaksi','desc')
            ->paginate(20);
            $d=['judul'=>'Detail Transaksi','aktif'=>$atc,'trans'=>$tr];
            return view('transaction.detail_trans',$d);
    }

    public function DataTable(){
     $data=DB::table('transaksi')->join('client','client.id_client','=','transaksi.id_client')
     ->join('bilboard','bilboard.id_bilboard','=','transaksi.id_bilboard');
     return (new QueryDataTable($data))
     ->addColumn('aksi',function($m){
         return "<a href='/transaction/".$m->id_transaksi."' class='btn btn-warning btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>Hapus</a><a href='/transaction/edit/".$m->id_transaksi."' class='btn btn-info btn-sm btn-block'>Edit</a>";
     })->rawColumns(['aksi'])
     ->toJson();
     }

     public function expaired()
     {
        $dat=date('Y-m-d');
        $data=DB::table('transaksi')->join('client','client.id_client','=','transaksi.id_client')
        ->join('bilboard','bilboard.id_bilboard','=','transaksi.id_bilboard')
        ->where('tgl_akhir','>',$dat)
        ->where('status',1);
        return (new QueryDataTable($data))
        ->addColumn('aksi',function($m){
            return "<a href='/bilboard/Nonaktive/".$m->id_bilboard."' class='btn btn-warning btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>Nonaktifkan</a><a href='/transaction/edit/".$m->id_transaksi."' class='btn btn-info btn-sm btn-block'>Perpanjang Kontrak</a>";
        })->rawColumns(['aksi'])
        ->toJson();
     }

}
