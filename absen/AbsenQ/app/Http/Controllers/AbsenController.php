<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Absen;

class AbsenController extends Controller
{
    public function index()
    {
        $auth=Auth::user();
        $actv=DB::table('tbl_siswa')->where('id_user',Auth::user()->id_user)->count();
        $sis=DB::table('tbl_siswa')->where('id_user',Auth::user()->id_user)->get();

        if($actv==0)
        {
            $atv=1;
        }else
        {
            $atv=0;
        }
        $ja=DB::select('select * from tbl_kelas,tbl_jurusan where tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan');
        return view('Siswa.Absen',['title'=>'Absen','kelas'=>$ja,'aktif'=>$atv,'user'=>$auth,'sis'=>$sis]);
    }

    public function store(Request $req)
    {
        $req->validate([
            'kelas'=>'required',
            'angkatan'=>'required',
            'no_tua'=>'required|max:13',
            'no_me'=>'required|max:13'
        ]);

        $id1=str_split($req->no_tua);
        $id2=str_split($req->no_me);

        if($id1[0].$id1[1]!=62||$id2[0].$id2[1]!=62)
        {
            return redirect('siswa/absen')->with('notsucces','Harap isi nomor telpon dengsn Format 62**********'); 
        }

        $us=Auth::user();
        DB::table('tbl_siswa')->insert([
            'id_user'=>$us->id_user,
            'id_kelas'=>$req->kelas,
            'angkatan'=>$req->angkatan,
            'no_me'=>$req->no_me,
            'no_tua'=>$req->no_tua
        ]);
        return redirect('siswa/absen')->with('succes','Anda Berhasil Memperbaharui');
    }

    public function absen(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $dt=date('Y-m-d H:i:s');

       $at=Auth::user();
       $sis=DB::table('tbl_siswa')->where('id_user',$req->id_user)->count();
       $siswa=DB::table('tbl_siswa')->where('id_user',Auth::user()->id_user)->get();

       if($sis>0)
       {
        $img=$req->imgbst;
        $nm=uniqid().'-'.$at->nama.'.png';
        $img=str_replace('data:image/png;base64,','',$img);
        $img=str_replace(' ','+',$img);
        $data=base64_decode($img);
        $file=public_path('images').'/absen/'.$nm;
        file_put_contents($file,$data);
        Absen::insert([
            'id_siswa'=>$siswa[0]->id_siswa,
            'masuk'=>$dt,
            'keluar'=>null,
            'keterangan'=>$req->ket,
            'photo'=>$nm,
            'waktu'=>1
            ]);

            $no=$siswa[0]->no_tua;

            $curl=curl_init();
            curl_setopt_array($curl,array(
                CURLOPT_URL=>"https://panel.rapiwha.com/send_message.php?apikey=25S89Z7ZTT59KWKUBNU9&number=".$no."&text=".$file,
                CURLOPT_RETURNTRANSFER=>true,
                CURLOPT_ENCODING=>"",
                CURLOPT_MAXREDIRS=>10,
                CURLOPT_TIMEOUT=>30,
                CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST=>"GET"
            ));
            $response=curl_exec($curl);
            $er=curl_error($curl);
            curl_close($curl);
        }   
    }

    // absen
    public function absis($id)
    {
        if($id==1)
        {
        $usid=Auth::user()->id_user;
        $cek=DB::table('tbl_guru')->where('id_user',$usid)->count();
        $sis=DB::table('tbl_siswa')->where('id_user',$usid)->count();
        $ds=DB::table('tbl_siswa')->where('id_user',$usid)->get();

        if($cek>0)//guru
        {
            $idg=DB::table('tbl_guru')->where('id_user',$usid)->get();
            $rol=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->count();
            $rol2=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->count();
            if($rol>0)//wali kelas
            {
                $wl=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Hadir' and tbl_kelas.id_kelas=".$wl[0]->id_kelas." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else if($rol2>0)//kaprog
            {
                $kp=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Hadir' and tbl_jurusan.id_jurusan=".$kp[0]->id_jurusan." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else //selain walikelas dan kaprog
            {
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Hadir' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }
        }else if($sis>0)//murid
        {
            $wl=DB::table('tbl_siswa')->where('id_siswa',$ds[0]->id_siswa)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Hadir' and tbl_absen.id_siswa=".$wl[0]->id_siswa." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
        }else //admin //wakasek //bk
        {
            $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Hadir' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
            $data=DB::select($sql);
        }
// return $data;
        return view('Absen.hadir',['title'=>'hadir','user'=>Auth::user(),'data'=>$data]);

       }else if($id==2)
       { 
        $usid=Auth::user()->id_user;
        $cek=DB::table('tbl_guru')->where('id_user',$usid)->count();
        $sis=DB::table('tbl_siswa')->where('id_user',$usid)->count();
        $ds=DB::table('tbl_siswa')->where('id_user',$usid)->get();

        if($cek>0)//guru
        {
            $idg=DB::table('tbl_guru')->where('id_user',$usid)->get();
            $rol=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->count();
            $rol2=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->count();
            if($rol>0)//wali kelas
            {
                $wl=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Alfa' and tbl_kelas.id_kelas=".$wl[0]->id_kelas." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else if($rol2>0)//kaprog
            {
                $kp=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Alfa' and tbl_jurusan.id_jurusan=".$kp[0]->id_jurusan." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else //selain walikelas dan kaprog
            {
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Alfa' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }
        }else if($sis>0)//murid
        {
            $wl=DB::table('tbl_siswa')->where('id_siswa',$ds[0]->id_siswa)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Alfa' and tbl_absen.id_siswa=".$wl[0]->id_siswa." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
        }else //admin //wakasek //bk
        {
            $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Alfa' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
            $data=DB::select($sql);
        }

        return view('Absen.alfa',['title'=>'Alfa','user'=>Auth::user(),'data'=>$data]);
       }else if($id==3)
       {
        $usid=Auth::user()->id_user;
        $cek=DB::table('tbl_guru')->where('id_user',$usid)->count();
        $sis=DB::table('tbl_siswa')->where('id_user',$usid)->count();
        $ds=DB::table('tbl_siswa')->where('id_user',$usid)->get();

        if($cek>0)//guru
        {
            $idg=DB::table('tbl_guru')->where('id_user',$usid)->get();
            $rol=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->count();
            $rol2=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->count();
            if($rol>0)//wali kelas
            {
                $wl=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Ijin' and tbl_kelas.id_kelas=".$wl[0]->id_kelas." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else if($rol2>0)//kaprog
            {
                $kp=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Ijin' and tbl_jurusan.id_jurusan=".$kp[0]->id_jurusan." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else //selain walikelas dan kaprog
            {
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Ijin' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }
        }else if($sis>0)//murid
        {
            $wl=DB::table('tbl_siswa')->where('id_siswa',$ds[0]->id_siswa)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Ijin' and tbl_absen.id_siswa=".$wl[0]->id_siswa." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
        }else //admin //wakasek //bk
        {
            $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Ijin' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
            $data=DB::select($sql);
        }

        return view('Absen.ijin',['title'=>'Ijin','user'=>Auth::user(),'data'=>$data]);
       }else
       {$usid=Auth::user()->id_user;
        $cek=DB::table('tbl_guru')->where('id_user',$usid)->count();
        $sis=DB::table('tbl_siswa')->where('id_user',$usid)->count();
        $ds=DB::table('tbl_siswa')->where('id_user',$usid)->get();

        if($cek>0)//guru
        {
            $idg=DB::table('tbl_guru')->where('id_user',$usid)->get();
            $rol=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->count();
            $rol2=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->count();
            if($rol>0)//wali kelas
            {
                $wl=DB::table('tbl_wali')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Sakit' and tbl_kelas.id_kelas=".$wl[0]->id_kelas." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else if($rol2>0)//kaprog
            {
                $kp=DB::table('tbl_kaprog')->where('id_guru',$idg[0]->id_guru)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Sakit' and tbl_jurusan.id_jurusan=".$kp[0]->id_jurusan." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }else //selain walikelas dan kaprog
            {
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Sakit' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
            }
        }else if($sis>0)//murid
        {
            $wl=DB::table('tbl_siswa')->where('id_siswa',$ds[0]->id_siswa)->get();
                $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.keterangan='Sakit' and tbl_absen.id_siswa=".$wl[0]->id_siswa." Order by tbl_absen.id_absen DESC";
                $data=DB::select($sql);
        }else //admin //wakasek //bk
        {
            $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_absen.keterangan='Sakit' and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan Order by tbl_absen.id_absen DESC";
            $data=DB::select($sql);
        }

        return view('Absen.sakit',['title'=>'Sakit','user'=>Auth::user(),'data'=>$data]);
       }

    }


}
