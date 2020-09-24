<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\WaliKelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WaliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth=Auth::user();
        $data=User::join('tbl_jabatan','tbl_users.id_jabatan','=','tbl_jabatan.id_jabatan')
              ->select('tbl_users.id_user','tbl_users.username','tbl_users.nama','tbl_users.alamat','tbl_users.jenis_kelamin','tbl_jabatan.nama_jabatan')
              ->where('tbl_users.id_jabatan','4')
              ->paginate(10);
         $ja=DB::select('select * from tbl_kelas,tbl_jurusan where tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan');
         $wali=DB::select('select * from tbl_wali,tbl_guru,tbl_kelas,tbl_users,tbl_jurusan where tbl_guru.id_guru=tbl_wali.id_guru and tbl_kelas.id_kelas=tbl_wali.id_kelas and tbl_users.id_user=tbl_guru.id_user and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan');
        return view('Guru.WaliKelas',['data'=>$data,'ja'=>$ja,'title'=>'User Page','wali'=>$wali,'user'=>$auth]);
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
            'kelas'=>'required'
           ]);
    
           if($request->kelas==0)
           {
            return redirect('/guru/walikelas');
           }
          $gur=DB::table('tbl_guru')->select('id_guru')->where('id_user','=',$request->id)->get();
           WaliKelas::create([
               'id_guru'=>$gur[0]->id_guru,
               'id_kelas'=>$request->kelas
           ]);
           return redirect('/guru/walikelas')->with('succe','Selamat Data Berhasil Di Simpan!');
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
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->kelas==0)
           {
            return redirect('/guru/walikelas');
           }
           $us=WaliKelas::find($id);
           $us->update(['id_kelas'=>$request->kelas]);
           return redirect('/guru/walikelas')->with('succe','Selamat Data Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $us=WaliKelas::find($id);
        $us->delete();
        return redirect('/guru/walikelas')->with('succe','Selamat Data Berhasil Di Hapus!');
    }
}
