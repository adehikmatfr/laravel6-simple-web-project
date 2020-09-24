<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
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
        $data=Kelas::join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_kelas.id_jurusan')
                    ->select('tbl_kelas.nama_kelas','tbl_jurusan.nama_jurusan','tbl_kelas.urutan','tbl_kelas.id_kelas')
                    ->get();
        $jurusan=Jurusan::all();
        return view('Admin.Kelas',['title'=>'Kelas','jurusan'=>$jurusan,'user'=>$auth],compact('data'));
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
            'nama'=>'required',
            'id_jurusan'=>'required',
            'urutan'=>'required|max:1'
        ]);
         Kelas::create([
            'nama_kelas'=>$request->nama,
            'id_jurusan'=>$request->id_jurusan,
            'urutan'=>$request->urutan
        ]);
     
        return redirect('/kelas')->with('succes','Selamat Data Berhasil Di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //

        $jr=Jurusan::find($kelas->id_jurusan);
         $data=[$kelas->nama_kelas,$kelas->urutan,$jr->nama_jurusan,$kelas->id_kelas];
       return redirect('/kelas')->with('edit',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        
        return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama'=>'required',
            'id_jurusan'=>'required',
            'urutan'=>'required|max:1'
        ]);

        if($request->id_jurusan==0)
        {
            return redirect('/kelas');
        }

        $kel=Kelas::find($id);
        $kel->update($request->all());
      return redirect('/kelas')->with('succes','Selamat Data Berhasil Di Ubah!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $jab=$kelas->id_kelas;
        $kelas->delete($jab);
        return redirect('/kelas')->with('succes','Selamat Data Berhasil Di Hapus!');
    }
}
