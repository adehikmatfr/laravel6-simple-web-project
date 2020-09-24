<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Absen;

class dashboardController extends Controller
{
    //
  
    public function __construct(){
      
      date_default_timezone_set('Asia/Jakarta');
      $us=DB::table('tbl_users')->where('id_jabatan','5')->get(); 
      $dt=date('Y-m-d');

      $waktu=date('h:i:s');
      $exs=explode(':',$waktu);
      $jammasuk='07:00';
      $jammkeluar='02:20';
      $exm=explode(':',$jammasuk);
      $exk=explode(':',$jammkeluar);

      $day=date('D');

      if($day!='Sat'||$day!='Sun')
      {

        // echo "$exs[0]<$exm[0]&&$exs[1]>$exm[1]&&$exs[0]<$exk[0]&&$exs[1]<$exk[1]";
        // return "$exs[0]<$exm[0]&&$exs[1]<$exm[1]";
          if($exs[0]>=$exm[0]){
        // return "$exs[0]>$exm[0]&&$exs[1]>$exm[1]&&$exs[0]<$exk[0]&&$exs[1]<$exk[1]";

              $absen=DB::table('tbl_absen')->where('masuk','like',"%".$dt."%")->get();
              $absen1=DB::table('tbl_absen')->where('masuk','like',"%".$dt."%")->count();
                       
              $siswa=DB::table('tbl_siswa')->get();   
              foreach($absen as $ab)
              {
                $row_a[]=$ab->id_siswa;
              }
              foreach($siswa as $sb)
              {
                $row_s[]=$sb->id_siswa;
              }
              if($absen1==0)
              {
                foreach($row_s as $b)
              {
                  Absen::insert([
                    'id_siswa'=>$b,
                    'masuk'=>$dt,
                    'keluar'=>null,
                    'keterangan'=>'Alfa',
                    'photo'=>'default.png',
                    'waktu'=>1
                  ]);
              }
              // return "ok";
              }else{
              $belum=array_diff($row_s,$row_a); //ambil id siswa yang tidak mengabsen membandingkan nilai yang tidak terdapat di array $row_a
              foreach($belum as $b)
              {
                  Absen::insert([
                    'id_siswa'=>$b,
                    'masuk'=>$dt,
                    'keluar'=>null,
                    'keterangan'=>'Alfa',
                    'photo'=>'default.png',
                    'waktu'=>1
                  ]);
              }
            }
              $sql="select * from tbl_absen,tbl_siswa,tbl_users,tbl_kelas,tbl_jurusan where tbl_siswa.id_siswa=tbl_absen.id_siswa and tbl_users.id_user=tbl_siswa.id_user and tbl_kelas.id_kelas=tbl_siswa.id_kelas and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_absen.masuk like '".$dt."%' and tbl_absen.keterangan='Alfa' Order by tbl_absen.id_absen DESC";
              $data=DB::select($sql);

              foreach($data as $dt)
              {
                $curl=curl_init();
                curl_setopt_array($curl,array(
                    CURLOPT_URL=>"https://panel.rapiwha.com/send_message.php?apikey=25S89Z7ZTT59KWKUBNU9&number=".$dt->no_tua."&text=Selamat Pagi Putra/i Yang Bernama ".$dt->nama." Tidak Masuk Sekolah dengan Keterangan Alfa",
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
      }

    }

    public function index()
    {
        //   return $row_a;   

        return view('dashboard.index');
    }
}
