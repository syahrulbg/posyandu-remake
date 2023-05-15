<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\balita;
use App\Models\penimbangan;
use App\Models\Ibu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        $user1 = User::count();
        // $saran = TbDaran::count();
        // $user = DB::table('users')
        // ->join('ibus', 'users.ibu_id', '=', 'ibus.id')
        // ->get();
        return view('lamanhome.home')->with([
            'user' => Auth::user(),
            'pengguna' => user::count(),
            'anak' => balita::count(),
            'timbang' => penimbangan::count(),
            'title' => 'Home'
        ], compact('user1'));
    }
}
