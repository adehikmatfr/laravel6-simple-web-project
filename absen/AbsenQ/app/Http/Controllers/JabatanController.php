<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth=Auth::user();
        $data=Jabatan::all();
        return view('Admin.Jabatan',['title'=>'Jabatan','data'=>$data,'user'=>$auth]);
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
        //validation
        $request->validate([
            'nama_jabatan'=>'required|unique:tbl_jabatan'
        ]);

        DB::table('tbl_jabatan')->insert([
            'nama_jabatan'=>$request->nama_jabatan
        ]);
        return redirect('/jabatan')->with('succes','Selamat Data Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        $data=[$jabatan->nama_jabatan,$jabatan->id_jabatan];
        return redirect('/jabatan')->with('edit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
        return $jabatan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan,$id)
    {
        $request->validate([
            'nama_jabatan'=>'required|unique:tbl_jabatan'
        ]);
        $jr = Jabatan::find($id);
        $jr->update($request->all());
        return redirect('/jabatan')->with('succes','Selamat Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        $jab=$jabatan->id_jabatan;
        $jabatan->delete($jab);
        return redirect('/jabatan')->with('succes','Selamat Data Berhasil Di Hapus!');
    }
}
