<?php

namespace App\Exports;

use App\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class AbsenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('tbl_absen')
        ->join('tbl_siswa','tbl_siswa.id_siswa','=','tbl_absen.id_siswa')
        ->leftjoin('tbl_users','tbl_users.id_user','=','tbl_siswa.id_user')
        ->leftjoin('tbl_kelas','tbl_kelas.id_kelas','=','tbl_siswa.id_kelas')
        ->leftjoin('tbl_jurusan','tbl_jurusan.id_jurusan','=','tbl_kelas.id_jurusan')
        ->select('username as NIS','nama as Nama Lengkap','jenis_kelamin as Jenis Kelamin','alamat as Alamat','nama_kelas as Kelas','nama_jurusan as Jurusan','urutan as Urutan Kelas','masuk as Absen Masuk','keluar as Absen Pulang','keterangan as Keterangan')
        ->orderBy('tbl_kelas.id_kelas','asc')
        ->get();
    }
}
