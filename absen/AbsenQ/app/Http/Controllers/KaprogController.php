<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kaprog;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KaprogController extends Controller
{
    public function index()
    {
        $auth=Auth::user();
        $data=User::join('tbl_jabatan','tbl_users.id_jabatan','=','tbl_jabatan.id_jabatan')
              ->select('tbl_users.id_user','tbl_users.username','tbl_users.nama','tbl_users.alamat','tbl_users.jenis_kelamin','tbl_jabatan.nama_jabatan')
              ->where('tbl_users.id_jabatan','4')
              ->paginate(10);
         $ja=DB::select('select * from tbl_jurusan');
         $kaprog=DB::select('select * from tbl_kaprog,tbl_guru,tbl_users,tbl_jurusan where tbl_guru.id_guru=tbl_kaprog.id_guru and tbl_users.id_user=tbl_guru.id_user and tbl_jurusan.id_jurusan=tbl_kaprog.id_jurusan');
        return view('Guru.Kaprog',['data'=>$data,'ja'=>$ja,'title'=>'User Page','kaprog'=>$kaprog,'user'=>$auth]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan'=>'required'
           ]);
    
           $gur=DB::table('tbl_guru')->select('id_guru')->where('id_user','=',$request->id)->get();
           if($request->jurusan==0)
           {
            return redirect('/guru/kaprog');
           }     
           Kaprog::create([
               'id_guru'=>$gur[0]->id_guru,
               'id_jurusan'=>$request->jurusan
           ]);
           return redirect('/guru/kaprog')->with('succe','Selamat Data Berhasil Di Simpan!');
    }

    public function update(Request $request, $id)
    {
        if($request->jurusan==0)
           {
            return redirect('/guru/kaprog');
           }
           $us=Kaprog::find($id);
           $us->update(['id_jurusan'=>$request->jurusan]);
           return redirect('/guru/kaprog')->with('succe','Selamat Data Berhasil Di Ubah!');
    }
    public function destroy($id)
    {
        $us=Kaprog::find($id);
        $us->delete();
        return redirect('/guru/kaprog')->with('succe','Selamat Data Berhasil Di Hapus!');
    }
}
