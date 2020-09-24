<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  
    public function index(){
      $auth=Auth::user();
        $data=User::join('tbl_jabatan','tbl_users.id_jabatan','=','tbl_jabatan.id_jabatan')
              ->select('tbl_users.id_user','tbl_users.username','tbl_users.nama','tbl_users.alamat','tbl_users.jenis_kelamin','tbl_jabatan.nama_jabatan')
              ->paginate(10);
         $ja=DB::table('tbl_jabatan')->get();
        return view('Admin.Users',['data'=>$data,'ja'=>$ja,'title'=>'User Page','user'=>$auth]);
    }

    public function  update(Request $request, $id)
    {
       $request->validate([
        'jabatan'=>'required'
       ]);

       $us=User::find($id);
       if($request->jabatan==0)
       {
        return redirect('/admin/user');
       }else if($request->jabatan==4)
       {
          DB::table('tbl_guru')->insert(
            ['id_user'=>$id]
          );
       }
       if($us->id_jabatan==4)
       {
        DB::table('tbl_guru')->where('id_user','=',$id)->delete();
       }

       $us->id_jabatan=$request->jabatan;
       $us->save();
       return redirect('/admin/user')->with('succes','Selamat Data Berhasil Di Edit!');
    }

    public function destroy(User $user)
    {
      $us=$user->id_user;
      if($user->id_jabatan==4)
      {
        DB::table('tbl_guru')->where('id_user','=',$us)->delete();
      }
      $user->delete($us);
      return redirect('/admin/user')->with('succes','Selamat Data Berhasil Di Hapus!');
    }

    public function profile()
    {
      $level="guru/kaprog/murid";
      $val=null;
      $ex=null;
      $auth=Auth::user();
      $ja=DB::table('tbl_jabatan')->where('id_jabatan',$auth->id_jabatan)->get();
      $gur=DB::table('tbl_guru')->where('id_user',$auth->id_user)->count();
      if($gur>0)
      {
        $gr=DB::table('tbl_guru')->where('id_user',$auth->id_user)->get();
        $wl=DB::table('tbl_wali')->where('id_guru',$gr[0]->id_guru)->count();
        $kp=DB::table('tbl_kaprog')->where('id_guru',$gr[0]->id_guru)->count();
        if($wl>0)
        {
          //wali kelas
          $level=DB::select("select * from tbl_wali,tbl_guru,tbl_kelas,tbl_users,tbl_jurusan where tbl_guru.id_guru=tbl_wali.id_guru and tbl_kelas.id_kelas=tbl_wali.id_kelas and tbl_users.id_user=tbl_guru.id_user and tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan and tbl_users.id_user=".$auth->id_user."");
          $ex=DB::select('select * from tbl_kelas,tbl_jurusan where tbl_jurusan.id_jurusan=tbl_kelas.id_jurusan');         
          $val=1;
        }
        if($kp>0)
        {
          //kaprog
          $level=DB::select("select * from tbl_kaprog,tbl_guru,tbl_users,tbl_jurusan where tbl_guru.id_guru=tbl_kaprog.id_guru and tbl_users.id_user=tbl_guru.id_user and tbl_jurusan.id_jurusan=tbl_kaprog.id_jurusan and tbl_users.id_user=".$auth->id_user."");
          $ex=DB::select('select * from tbl_jurusan');
          $val=2;
        }         
      }
      
      return view('Profile.index',['title'=>'profile','user'=>$auth,'jabatan'=>$ja,'level'=>$level,'val'=>$val,'ex'=>$ex]);
    }

    public function edit(Request $req,$id)
    {
      $req->validate([
        'nama'=>'required',
        'alamat'=>'required'
      ]);
     $wl=0;
     $kp=0;
      
      $us=User::find($id);
      $xc=DB::table('tbl_guru')->where('id_user',$us->id_user)->count();
      if($xc>0)
      {
        $ex=DB::table('tbl_guru')->where('id_user',$us->id_user)->get();
        $wl=DB::table('tbl_wali')->where('id_guru',$ex[0]->id_guru)->count();
       $kp=DB::table('tbl_kaprog')->where('id_guru',$ex[0]->id_guru)->count();
      }
       

      if($files=$req->file('img'))
      {
        $req->validate([
          'img'=>'image|mimes:jpeg,png,jpg|max:10000'
        ]);

        $name=time().$us->nama.'.'.$files->getClientOriginalExtension();
        $files->move(public_path('images'),$name);
        
        $us->update([
          'nama'=>$req->nama,
          'alamat'=>$req->alamat,
          'jenis_kelamin'=>$req->jenis,
          'img'=>$name
        ]);
        return redirect('/user/profile')->with('success','Data Berhasil Diubah');
      }

      $us->update([
        'nama'=>$req->nama,
        'alamat'=>$req->alamat,
        'jenis_kelamin'=>$req->jenis,
      ]);

      if($wl>0)
      {
        $req->validate([
          'wali'=>'required'
        ]);
        DB::table('tbl_wali')
        ->where('id_guru',$ex[0]->id_guru)
        ->update([
          'id_kelas'=>$req->wali
        ]);
      }
      
      if($kp>0)
      {
        $req->validate([
          'kaprog'=>'required'
        ]);
        DB::table('tbl_kaprog')
        ->where('id_guru',$ex[0]->id_guru)
        ->update([
          'id_jurusan'=>$req->kaprog
        ]);
      }

      return redirect('/user/profile')->with('success','Data Berhasil Diubah');
    }
}
