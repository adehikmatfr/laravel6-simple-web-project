<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
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
        $data=Jurusan::paginate(10);
        return view('Admin.Jurusan',['data'=>$data,'title'=>'Jurusan','user'=>$auth]);
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
        $request->validate([
            'nama_jurusan'=>'required|unique:tbl_jurusan'
        ]);

        // DB::table('tbl_jabatan')->insert([
        //     'nama_jurusan'=>$request->nama_jabatan
        // ]);

         Jurusan::create($request->all());

        return redirect('/jurusan')->with('succes','Selamat Data Berhasil Di Simpan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        $data=[$jurusan->nama_jurusan,$jurusan->id_jurusan];
        return redirect('/jurusan')->with('edit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        //
        return $jurusan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan, $id)
    {
        $request->validate([
            'nama_jurusan'=>'required|unique:tbl_jurusan'
        ]);
        
        $jr = Jurusan::find($id);
        $jr->update($request->all());
         return redirect('/jurusan')->with('succes','Selamat Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jab=$jurusan->id_jurusan;
        $jurusan->delete($jab);
        return redirect('/jurusan')->with('succes','Selamat Data Berhasil Di Hapus!');
    }
}
