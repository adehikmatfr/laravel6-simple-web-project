<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active=Auth::user();
        date_default_timezone_set('Asia/Jakarta');
        $sis=DB::table('tbl_siswa')->where('id_user',$active->id_user)->count();
        $dt=date('Y-m-d');
        if($active->id_jabatan==5&&$sis>0){
            
            $sisi=DB::table('tbl_siswa')->where('id_user',$active->id_user)->get();
            
            $abs=DB::table('tbl_absen')->where('masuk','like',$dt.'%')->where('id_siswa',$sisi[0]->id_siswa)->count();
            $i=DB::table('tbl_absen')->where('keterangan','Ijin')->where('id_siswa',$sisi[0]->id_siswa)->count();
            $s=DB::table('tbl_absen')->where('keterangan','Sakit')->where('id_siswa',$sisi[0]->id_siswa)->count();
            $a=DB::table('tbl_absen')->where('keterangan','Alfa')->where('id_siswa',$sisi[0]->id_siswa)->count();
            $h=DB::table('tbl_absen')->where('keterangan','Hadir')->where('id_siswa',$sisi[0]->id_siswa)->count();
            $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.masuk like '".$dt."%' and tbl_absen.id_siswa=".$sisi[0]->id_siswa;   
        }else{
        $sis=DB::table('tbl_siswa')->count();
        $abs=DB::table('tbl_absen')->where('masuk','like',$dt.'%')->count();
        $i=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',$dt.'%')->count();
        $s=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',$dt.'%')->count();
        $a=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',$dt.'%')->count();
        $h=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',$dt.'%')->count();
        $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.masuk like '".$dt."%' Order by tbl_absen.id_absen DESC";
        }
        
        $siswa=DB::select($sql);
        $kel=DB::table('tbl_kelas')->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_kelas.id_jurusan')->get();

       

        $data=[$i,$s,$a,$h];
        return view('Home.index',['title'=>'home','active'=>$active,'user'=>$active,'sis'=>$sis,'abs'=>$abs,'ket'=>$data,'siswa'=>$siswa,'kelas'=>$kel]);
    }
 
     public function cari(Request $req)
     {
        $active=Auth::user();
        date_default_timezone_set('Asia/Jakarta');
        $dt=date('Y-m-d');
        $sis=DB::table('tbl_siswa')->count();
        $abs=DB::table('tbl_absen')->where('masuk','like',$dt.'%')->count();
        $i=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',$dt.'%')->count();
        $s=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',$dt.'%')->count();
        $a=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',$dt.'%')->count();
        $h=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',$dt.'%')->count();
        if($req->kelas==null&&$req->nama!=null)
        {
            $sql="select DISTINCT tbl_absen.id_absen, tbl_users.nama,tbl_users.alamat,tbl_users.jenis_kelamin,tbl_kelas.nama_kelas,tbl_kelas.urutan,tbl_jurusan.nama_jurusan,tbl_absen.masuk,tbl_absen.keluar,tbl_absen.keterangan,tbl_absen.keterangan,tbl_absen.photo,tbl_absen.waktu from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.masuk like '2020-01-13%' and tbl_users.nama like '%".$req->nama."%' Order by tbl_absen.id_absen DESC";
        }else if($req->nama!=null || $req->kelas!=null){
        $sql="select DISTINCT tbl_absen.id_absen, tbl_users.nama,tbl_users.alamat,tbl_users.jenis_kelamin,tbl_kelas.nama_kelas,tbl_kelas.urutan,tbl_jurusan.nama_jurusan,tbl_absen.masuk,tbl_absen.keluar,tbl_absen.keterangan,tbl_absen.keterangan,tbl_absen.photo,tbl_absen.waktu from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.masuk like '2020-01-13%' and tbl_users.nama like '%".$req->nama."%' and tbl_kelas.id_kelas=".$req->kelas." Order by tbl_absen.id_absen DESC";
        }else
        {
            $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.masuk like '".$dt."%' Order by tbl_absen.id_absen DESC";
        }

        $siswa=DB::select($sql);

        $kel=DB::table('tbl_kelas')->join('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_kelas.id_jurusan')->get();

        $data=[$i,$s,$a,$h];
        return view('Home.index',['title'=>'home','active'=>$active,'user'=>$active,'sis'=>$sis,'abs'=>$abs,'ket'=>$data,'siswa'=>$siswa,'kelas'=>$kel]);
     }

}
