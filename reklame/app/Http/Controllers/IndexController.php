<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Bilboard;
use App\Transaksi;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level=="goest"){
            Auth::logout();
            return view('logout');
        }
        $client=Client::all()->count();
        $free=Bilboard::where('status',0)->count();
        $prog=Bilboard::where('status',1)->count();
        $trans=Transaksi::all()->count();
        $th=date('Y');
        $arr=[];
        for($a=1;$a<13;$a++){
            if($a>9){
                $bln=$th.'-'.$a.'-%';
                $arr[$a]=Transaksi::where('tgl_kontrak','like',$bln)->count();
            }else{
                $bln=$th.'-0'.$a.'-%';
                $arr[$a]=Transaksi::where('tgl_kontrak','like',$bln)->count();
            }
        }

        $ds=[$client,$free,$prog,$trans];
        $atc=[true,false,false,false,false,false,false,false,false,false];
        $d=['judul'=>'Home','aktif'=>$atc,'count'=>$ds,'cart'=>$arr];
        return view('users.index',$d);
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
