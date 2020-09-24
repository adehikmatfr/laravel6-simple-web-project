<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('owner')->orderBy('id_owner','desc')->limit(1)->get();
        $atc=[false,true,false,false,false,false,false,false,false,false];
        $d=['judul'=>'Company','aktif'=>$atc,'data'=>$data];
        return view('company.index',$d);
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
            'owner'=>'required|max:50',
            'perusahaan'=>'required|max:50',
            'kotkab'=>'required|max:50',
            'notlp'=>'required|max:13',
            'web'=>'required|max:50',
            'email'=>'required|email',
            'alamat'=>'required'
        ]);
        $crt=Owner::create([
        'nama_perusahaan_owner'=>$request->perusahaan,
        'nama_PIC'=>$request->owner,
        'alamat'=>$request->alamat,
        'kota_kab'=>$request->kotkab,
        'no_tlp'=>$request->notlp,
        'alamat_web'=>$request->web,
        'alamat_email'=>$request->email
        ]);
        return redirect('/company')->with('succes','Selamat Data Berhasil Di Simpan!');
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
        $request->validate([
            'edit_owner'=>'required|max:50|alpha',
            'edit_perusahaan'=>'required|max:50',
            'edit_kotkab'=>'required|max:50',
            'edit_notlp'=>'required|max:13',
            'edit_web'=>'required|max:50',
            'edit_email'=>'required|email',
            'edit_alamat'=>'required'
        ]);

        $data=Owner::where('id_owner',$id)->first();
        $data->nama_perusahaan_owner=$request->edit_perusahaan;
        $data->nama_PIC=$request->edit_owner;
        $data->alamat=$request->edit_alamat;
        $data->kota_kab=$request->edit_kotkab;
        $data->no_tlp=$request->edit_notlp;
        $data->alamat_web=$request->edit_web;
        $data->alamat_email=$request->edit_email;
        $data->save();
        return redirect('/company')->with('succes','Selamat Data Berhasil Di ubah!');
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
