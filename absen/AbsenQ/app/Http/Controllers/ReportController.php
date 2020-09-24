<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Exports\AbsenExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a1=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-01-%')->count();
        $a2=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-02-%')->count();
        $a3=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-03-%')->count();
        $a4=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-04-%')->count();
        $a5=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-05-%')->count();
        $a6=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-06-%')->count();
        $a7=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-07-%')->count();
        $a8=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-08-%')->count();
        $a9=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-09-%')->count();
        $a10=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-10-%')->count();
        $a11=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-11-%')->count();
        $a12=DB::table('tbl_absen')->where('keterangan','Alfa')->where('masuk','like',date('Y').'-12-%')->count();
        $alfa=[$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12];
        $h1=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-01-%')->count();
        $h2=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-02-%')->count();
        $h3=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-03-%')->count();
        $h4=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-04-%')->count();
        $h5=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-05-%')->count();
        $h6=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-06-%')->count();
        $h7=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-07-%')->count();
        $h8=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-08-%')->count();
        $h9=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-09-%')->count();
        $h10=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-10-%')->count();
        $h11=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-11-%')->count();
        $h12=DB::table('tbl_absen')->where('keterangan','Hadir')->where('masuk','like',date('Y').'-12-%')->count();
        $hadir=[$h1,$h2,$h3,$h4,$h5,$h6,$h7,$h8,$h9,$h10,$h11,$h12];
        $i1=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-01-%')->count();
        $i2=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-02-%')->count();
        $i3=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-03-%')->count();
        $i4=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-04-%')->count();
        $i5=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-05-%')->count();
        $i6=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-06-%')->count();
        $i7=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-07-%')->count();
        $i8=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-08-%')->count();
        $i9=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-09-%')->count();
        $i10=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-10-%')->count();
        $i11=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-11-%')->count();
        $i12=DB::table('tbl_absen')->where('keterangan','Ijin')->where('masuk','like',date('Y').'-12-%')->count();
        $ijin=[$i1,$i2,$i3,$i4,$i5,$i6,$i7,$i8,$i9,$i10,$i11,$i12];
        $s1=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-01-%')->count();
        $s2=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-02-%')->count();
        $s3=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-03-%')->count();
        $s4=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-04-%')->count();
        $s5=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-05-%')->count();
        $s6=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-06-%')->count();
        $s7=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-07-%')->count();
        $s8=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-08-%')->count();
        $s9=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-09-%')->count();
        $s10=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-10-%')->count();
        $s11=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-11-%')->count();
        $s12=DB::table('tbl_absen')->where('keterangan','Sakit')->where('masuk','like',date('Y').'-12-%')->count();
        $sakit=[$s1,$s2,$s3,$s4,$s5,$s6,$s7,$s8,$s9,$s10,$s11,$s12];
        $ket=[$hadir,$ijin,$sakit,$alfa];
        $auth=Auth::user();
        return view('Admin.Report',['title'=>'Report','user'=>$auth,'ket'=>$ket]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function down()
    {
        return Excel::download(new AbsenExport,'Absen'.date('Y-m-d').'.xlsx');
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
        //
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
