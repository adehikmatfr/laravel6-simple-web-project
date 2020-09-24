<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bilboard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $owr=\App\Owner::orderBy('id_owner','desc')->first();
        $data=Bilboard::all();
        return view('home2',['bil'=>$data,'owr'=>$owr]);
    }
}
