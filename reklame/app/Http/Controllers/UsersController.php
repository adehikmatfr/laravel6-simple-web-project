<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atc=[false,false,false,false,false,false,false,false,false,true];
        $d=['judul'=>'Daftar User','aktif'=>$atc];
        return view('users.daftar_user',$d);
    }

    public function profile(){
        $atc=[false,false,false,false,false,false,false,true,false,false];
        $d=['judul'=>'Profile','aktif'=>$atc];
        return view('users.profile',$d);
    }
    public function editPassword(){
        $atc=[false,false,false,false,false,false,false,false,true,false];
        $d=['judul'=>'Ganti Password','aktif'=>$atc];
        return view('users.ganti_pasword',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id=Auth::user()->id;
        $request->validate([
            'name'=>'required'
        ]);
        $dat=User::find($id);
        $dat->name=$request->name;
        $dat->update();
        return redirect('/profile')->with('succes','Selamat User Berhasil Di Ubah!');
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
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
    public function edit($id)
    {
      $usr=User::find($id);
      $usr->level='admin';
      $usr->save();
      return redirect('/users')->with('succes','Selamat User Berhasil Di ubah!');
    }

    public function manager($id)
    {
      $usr=User::find($id);
      $usr->level='manager';
      $usr->save();
      return redirect('/users')->with('succes','Selamat User Berhasil Di ubah!');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usr=User::find($id);
        $usr->delete();
        return redirect('/users')->with('succes','Selamat User Berhasil Di Hapus!');
    }

    public function DataTable(){
        $model=User::query();
    return (new EloquentDataTable($model))
    ->addColumn('aksi',function($m){
            $ret= "<a href='/users/".$m->id."' class='btn btn-warning btn-sm btn-block' onclick='return confirm(".'"apakah anda yakin ?"'.")'>Hapus</a>";
            if($m->level=="manager"){
             $ret.="<a href='/users/admin/".$m->id."' class='btn btn-info btn-sm btn-block'>Admin</a>";
            }
            if($m->level=="goest"){
                $ret.="<a href='/users/manager/".$m->id."' class='btn btn-info btn-sm btn-block'>Manager</a>";
            }
       return $ret;
    })->rawColumns(['aksi'])
    ->toJson();
        }

}
