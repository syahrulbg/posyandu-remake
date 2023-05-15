<?php

namespace App\Http\Controllers;

use App\Models\ibu;
use App\Models\User;
use App\Models\balita;
use App\Models\penimbangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balitas = balita::all();
        $user = Auth::user();
        $users = user::all();
        $ibu = ibu::all();
        $penimbangan = DB::table('penimbangans')
        ->join('balitas', 'penimbangans.balita_id', '=', 'balitas.id')
        ->join('ibus', 'balitas.ibu_id', '=', 'ibus.id')
        ->get();
        return view('penimbangan.index',['title' => 'Penimbangan'],compact('penimbangan', 'balitas', 'user', 'ibu', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $balitas = balita::all();
        $user = Auth::user();
        $users = user::all();
        $ibu = ibu::all();
        return view ('penimbangan.create',['title' => 'Tambah Data'],compact('balitas', 'user', 'ibu', 'users'));
    }

    function hitungZScore($berat_badan, $umur, $jenis_kelamin)
    {
        // Nilai median berdasarkan umur dan jenis kelamin
        $median = 0;
        if ($jenis_kelamin == "laki-laki") {
            if ($umur == 0) {
                $median = 3.3;
            } else if ($umur == 1) {
                $median = 4.5;
            } else if ($umur == 2) {
                $median = 5.6;
            } else if ($umur == 3) {
                $median = 6.4;
            } else if ($umur == 4) {
                $median = 7.0;
            } else if ($umur == 5) {
                $median = 7.5;
            } else if ($umur == 6) {
                $median = 7.9;
            } else if ($umur == 7) {
                $median = 8.3;
            } else if ($umur == 8) {
                $median = 8.6;
            } else if ($umur == 9) {
                $median = 8.9;
            } else if ($umur == 10) {
                $median = 9.2;
            } else if ($umur == 11) {
                $median = 9.4;
            } else if ($umur == 12) {
                $median = 9.6;
            } else if ($umur == 13) {
                $median = 10.1;
            } else if ($umur == 14) {
                $median = 10.3;
            } else if ($umur == 15) {
                $median = 10.5;
            } else if ($umur == 16) {
                $median = 10.5;
            } else if ($umur == 17) {
                $median = 10.7;
            } else if ($umur == 18) {
                $median = 10.9;
            } else if ($umur == 19) {
                $median = 11.1;
            } else if ($umur == 20) {
                $median = 11.3;
            } else if ($umur == 21) {
                $median = 11.5;
            } else if ($umur == 22) {
                $median = 11.8;
            } else if ($umur == 23) {
                $median = 12.0;
            } else if ($umur == 24) {
                $median = 12.2;
            } else if ($umur == 25) {
                $median = 12.4;
            } else if ($umur == 26) {
                $median = 12.5;
            } else if ($umur == 27) {
                $median = 12.7;
            } else if ($umur == 28) {
                $median = 12.9;
            } else if ($umur == 29) {
                $median = 13.1;
            } else if ($umur == 30) {
                $median = 13.3;
            } else if ($umur == 31) {
                $median = 13.5;
            } else if ($umur == 32) {
                $median = 13.7;
            } else if ($umur == 33) {
                $median = 13.8;
            } else if ($umur == 34) {
                $median = 14.0;
            } else if ($umur == 35) {
                $median = 14.2;
            } else if ($umur == 36) {
                $median = 14.3;
            } else if ($umur == 37) {
                $median = 14.5;
            } else if ($umur == 38) {
                $median = 14.7;
            } else if ($umur == 39) {
                $median = 14.8;
            } else if ($umur == 40) {
                $median = 15.0;
            } else if ($umur == 41) {
                $median = 15.2;
            } else if ($umur == 42) {
                $median = 15.3;
            } else if ($umur == 43) {
                $median = 15.5;
            } else if ($umur == 44) {
                $median = 15.7;
            } else if ($umur == 45) {
                $median = 15.8;
            } else if ($umur == 46) {
                $median = 16.0;
            } else if ($umur == 47) {
                $median = 16.2;
            } else if ($umur == 48) {
                $median = 16.3;
            } else if ($umur == 49) {
                $median = 16.5;
            } else if ($umur == 50) {
                $median = 16.7;
            } else if ($umur == 51) {
                $median = 16.8;
            } else if ($umur == 52) {
                $median = 17.0;
            } else if ($umur == 53) {
                $median = 17.2;
            } else if ($umur == 54) {
                $median = 17.3;
            } else if ($umur == 55) {
                $median = 17.5;
            } else if ($umur == 56) {
                $median = 17.7;
            } else if ($umur == 57) {
                $median = 17.8;
            } else if ($umur == 58) {
                $median = 18.0;
            } else if ($umur == 59) {
                $median = 18.2;
            } else if ($umur == 60) {
                $median = 18.3;
            }
        } else if ($jenis_kelamin == "perempuan") {
            if ($umur == 0) {
                $median = 3.3;
            } else if ($umur == 1) {
                $median = 4.2;
            } else if ($umur == 2) {
                $median = 5.1;
            } else if ($umur == 3) {
                $median = 5.8;
            } else if ($umur == 4) {
                $median = 6.4;
            } else if ($umur == 5) {
                $median = 6.9;
            } else if ($umur == 6) {
                $median = 7.3;
            } else if ($umur == 7) {
                $median = 7.6;
            } else if ($umur == 8) {
                $median = 7.9;
            } else if ($umur == 9) {
                $median = 8.2;
            } else if ($umur == 10) {
                $median = 8.5;
            } else if ($umur == 11) {
                $median = 8.7;
            } else if ($umur == 12) {
                $median = 8.9;
            } else if ($umur == 13) {
                $median = 9.2;
            } else if ($umur == 14) {
                $median = 9.4;
            } else if ($umur == 15) {
                $median = 9.6;
            } else if ($umur == 16) {
                $median = 9.8;
            } else if ($umur == 17) {
                $median = 10.0;
            } else if ($umur == 18) {
                $median = 10.2;
            } else if ($umur == 19) {
                $median = 10.4;
            } else if ($umur == 20) {
                $median = 10.6;
            } else if ($umur == 21) {
                $median = 10.9;
            } else if ($umur == 22) {
                $median = 11.1;
            } else if ($umur == 23) {
                $median = 11.3;
            } else if ($umur == 24) {
                $median = 11.5;
            } else if ($umur == 25) {
                $median = 11.7;
            } else if ($umur == 26) {
                $median = 11.9;
            } else if ($umur == 27) {
                $median = 12.1;
            } else if ($umur == 28) {
                $median = 12.3;
            } else if ($umur == 29) {
                $median = 12.5;
            } else if ($umur == 30) {
                $median = 12.7;
            } else if ($umur == 31) {
                $median = 12.9;
            } else if ($umur == 32) {
                $median = 13.1;
            } else if ($umur == 33) {
                $median = 13.3;
            } else if ($umur == 34) {
                $median = 13.5;
            } else if ($umur == 35) {
                $median = 13.7;
            } else if ($umur == 36) {
                $median = 13.9;
            } else if ($umur == 37) {
                $median = 14.0;
            } else if ($umur == 38) {
                $median = 14.2;
            } else if ($umur == 39) {
                $median = 14.4;
            } else if ($umur == 40) {
                $median = 14.6;
            } else if ($umur == 41) {
                $median = 14.8;
            } else if ($umur == 42) {
                $median = 15.0;
            } else if ($umur == 43) {
                $median = 15.2;
            } else if ($umur == 44) {
                $median = 15.3;
            } else if ($umur == 45) {
                $median = 15.5;
            } else if ($umur == 46) {
                $median = 15.7;
            } else if ($umur == 47) {
                $median = 15.9;
            } else if ($umur == 48) {
                $median = 16.1;
            } else if ($umur == 49) {
                $median = 16.3;
            } else if ($umur == 50) {
                $median = 16.4;
            } else if ($umur == 51) {
                $median = 16.6;
            } else if ($umur == 52) {
                $median = 16.8;
            } else if ($umur == 53) {
                $median = 17.0;
            } else if ($umur == 54) {
                $median = 17.2;
            } else if ($umur == 55) {
                $median = 17.3;
            } else if ($umur == 56) {
                $median = 17.5;
            } else if ($umur == 57) {
                $median = 17.7;
            } else if ($umur == 58) {
                $median = 17.9;
            } else if ($umur == 59) {
                $median = 18.0;
            } else if ($umur == 60) {
                $median = 18.2;
            }
        }

        // Nilai standar deviasi berdasarkan umur
        $sd = 0;
        $ruj = $berat_badan - $median;
        if ($jenis_kelamin == "laki-laki") {

            if ($umur == 0) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 3.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 4.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 5.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 2.9;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 2.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 2.1;
                }
            } else if ($umur == 1) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 5.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 5.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 6.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 3.9;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 3.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 2.9;
                }
            } else if ($umur == 2) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 6.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 7.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 8.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 4.9;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 4.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 3.8;
                }
            } else if ($umur == 3) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 7.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 8.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 9.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 5.7;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 5.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 4.4;
                }
            } else if ($umur == 4) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 7.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 8.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 9.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 6.2;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 5.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 4.9;
                }
            } else if ($umur == 5) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 8.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 9.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 10.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 6.7;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.3;
                }
            } else if ($umur == 6) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 8.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 9.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 10.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.1;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.7;
                }
            } else if ($umur == 7) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 9.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 10.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 11.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.4;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.9;
                }
            } else if ($umur == 8) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 9.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 10.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 11.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.7;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.2;
                }
            } else if ($umur == 9) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 9.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 11.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 12.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.0;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.4;
                }
            } else if ($umur == 10) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 10.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 11.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 12.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.2;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.6;
                }
            } else if ($umur == 11) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 10.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 11.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 13.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.4;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.8;
                }
            } else if ($umur == 12) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 10.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 13.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.6;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.9;
                }
            } else if ($umur == 13) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 13.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.1;
                }
            } else if ($umur == 14) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 14.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.2;
                }
            } else if ($umur == 15) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 14.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.4;
                }
            } else if ($umur == 16) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.7;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 13.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 14.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.5;
                }
            } else if ($umur == 17) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 13.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 14.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.7;
                }
            } else if ($umur == 18) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 13.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 15.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.8;
                }
            } else if ($umur == 19) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 13.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 15.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.0;
                }
            } else if ($umur == 20) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.7;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 14.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 15.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.1;
                }
            } else if ($umur == 21) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 14.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 16.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.2;
                }
            } else if ($umur == 22) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 14.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 16.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.4;
                }
            } else if ($umur == 23) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 15.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 16.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.5;
                }
            } else if ($umur == 24) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 15.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 17.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.6;
                }
            } else if ($umur == 25) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 15.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 17.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.8;
                }
            } else if ($umur == 26) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 15.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 17.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.9;
                }
            } else if ($umur == 27) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 18.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.0;
                }
            } else if ($umur == 28) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 18.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.1;
                }
            } else if ($umur == 29) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 18.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.2;
                }
            } else if ($umur == 30) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 19.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.4;
                }
            } else if ($umur == 31) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 19.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.5;
                }
            } else if ($umur == 32) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 19.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.6;
                }
            } else if ($umur == 33) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 19.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.7;
                }
            } else if ($umur == 34) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 20.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.8;
                }
            } else if ($umur == 35) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 18.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 20.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.9;
                }
            } else if ($umur == 36) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 18.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 20.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.0;
                }
            } else if ($umur == 37) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 18.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 21.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.9; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.7;
                }
            } else if ($umur == 38) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 18.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 21.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.2;
                }
            } else if ($umur == 39) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 21.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.3;
                }
            } else if ($umur == 40) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 21.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.4;
                }
            } else if ($umur == 41) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 22.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.5;
                }
            } else if ($umur == 42) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 22.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.6;
                }
            } else if ($umur == 43) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 22.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.7;
                }
            } else if ($umur == 44) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 23.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.8;
                }
            } else if ($umur == 45) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 23.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.9;
                }
            } else if ($umur == 46) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 23.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.0;
                }
            } else if ($umur == 47) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 23.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.1;
                }
            } else if ($umur == 48) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 24.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.2;
                }
            } else if ($umur == 49) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 24.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.2;
                }
            } else if ($umur == 50) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 24.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.4;
                }
            } else if ($umur == 51) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 25.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.5;
                }
            } else if ($umur == 52) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 22.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 25.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.6;
                }
            } else if ($umur == 53) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 22.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 25.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.7;
                }
            } else if ($umur == 54) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 22.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 26.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.8;
                }
            } else if ($umur == 55) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 22.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 26.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.9;
                }
            } else if ($umur == 56) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 23.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 26.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 12.0;
                }
            } else if ($umur == 57) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 23.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 26.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 12.1;
                }
            } else if ($umur == 58) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 23.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 27.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 12.2;
                }
            } else if ($umur == 59) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 23.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 27.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.9; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 14.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 12.3;
                }
            } else if ($umur == 60) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 21.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 24.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 27.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 16.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 14.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 12.4;
                }
            }
        } else if ($jenis_kelamin == "perempuan") {
            if ($umur == 0) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 3.7;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 4.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 4.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 2.8;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 2.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 2.0;
                }
            } else if ($umur == 1) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 4.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 5.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 6.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 3.6;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 3.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 2.7;
                }
            } else if ($umur == 2) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 5.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 6.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 7.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 4.5;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 3.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 3.4;
                }
            } else if ($umur == 3) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 6.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 7.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 8.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 5.2;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 4.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 4.0;
                }
            } else if ($umur == 4) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 7.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 8.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 9.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 5.7;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 5.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 4.4;
                }
            } else if ($umur == 5) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 7.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 8.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 10.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 6.1;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 5.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 4.8;
                }
            } else if ($umur == 6) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 8.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 9.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 10.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 6.5;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 5.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.1;
                }
            } else if ($umur == 7) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 8.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 9.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 11.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 6.8;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.3;
                }
            } else if ($umur == 8) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 9.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 10.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 11.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.0;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.6;
                }
            } else if ($umur == 9) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 9.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 10.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 12.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.3;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.8;
                }
            } else if ($umur == 10) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 9.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 10.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 12.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.5;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 5.9;
                }
            } else if ($umur == 11) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 9.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 11.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 12.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.7;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 6.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.1;
                }
            } else if ($umur == 12) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 10.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 11.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 13.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 7.9;
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.3;
                }
            } else if ($umur == 13) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 10.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 11.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 13.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.4;
                }
            } else if ($umur == 14) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 10.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 13.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.6;
                }
            } else if ($umur == 15) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 10.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 14.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.7;
                }
            } else if ($umur == 16) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 14.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 6.9;
                }
            } else if ($umur == 17) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 12.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 14.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 8.9; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 7.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.0;
                }
            } else if ($umur == 18) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 13.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 15.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.2;
                }
            } else if ($umur == 19) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 11.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 13.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 15.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.3;
                }
            } else if ($umur == 20) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 13.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 15.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.5;
                }
            } else if ($umur == 21) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 14.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 16.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.6;
                }
            } else if ($umur == 22) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 14.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 16.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 9.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.8;
                }
            } else if ($umur == 23) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 12.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 14.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 16.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 8.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 7.9;
                }
            } else if ($umur == 24) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 14.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 17.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.1;
                }
            } else if ($umur == 25) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 15.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 17.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.2;
                }
            } else if ($umur == 26) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 15.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 17.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.4;
                }
            } else if ($umur == 27) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 13.7;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 15.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 18.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.5;
                }
            } else if ($umur == 28) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 18.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 10.9; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.6;
                }
            } else if ($umur == 29) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 18.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 9.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.8;
                }
            } else if ($umur == 30) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 19.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 8.9;
                }
            } else if ($umur == 31) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.7;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 16.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 19.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.0;
                }
            } else if ($umur == 32) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 14.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 19.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.1;
                }
            } else if ($umur == 33) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.3;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 20.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.3;
                }
            } else if ($umur == 34) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 20.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 11.9; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.4;
                }
            } else if ($umur == 35) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 17.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 20.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.5;
                }
            } else if ($umur == 36) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 15.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 18.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 20.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.6;
                }
            } else if ($umur == 37) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 18.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 21.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 10.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.7;
                }
            } else if ($umur == 38) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 18.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 21.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 9.8;
                }
            } else if ($umur == 39) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.0;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 22.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.3;
                }
            } else if ($umur == 40) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.7;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 22.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 12.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.1;
                }
            } else if ($umur == 41) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 16.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 22.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.2;
                }
            } else if ($umur == 42) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 19.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 23.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.3;
                }
            } else if ($umur == 43) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 23.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.4;
                }
            } else if ($umur == 44) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 23.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.4; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 11.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.5;
                }
            } else if ($umur == 45) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 17.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.7;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 24.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.6;
                }
            } else if ($umur == 46) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 20.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 24.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.7; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.1;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.7;
                }
            } else if ($umur == 47) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 24.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 13.9; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.8;
                }
            } else if ($umur == 48) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.5;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 25.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.0; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 10.9;
                }
            } else if ($umur == 49) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 18.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 25.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.0;
                }
            } else if ($umur == 50) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 21.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 25.9;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.1;
                }
            } else if ($umur == 51) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 22.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 26.3;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.2;
                }
            } else if ($umur == 52) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.4;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 22.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 26.6;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.8;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.3;
                }
            } else if ($umur == 53) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.7;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 22.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 27.0;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 12.9;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.4;
                }
            } else if ($umur == 54) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 19.9;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 23.2;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 27.4;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 14.9; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.0;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.5;
                }
            } else if ($umur == 55) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.1;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 23.5;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 27.7;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.1; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.2;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.6;
                }
            } else if ($umur == 56) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.3;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 23.8;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 28.1;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.2; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.3;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.7;
                }
            } else if ($umur == 57) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.6;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 24.1;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 28.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.3; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.4;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.8;
                }
            } else if ($umur == 58) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 20.8;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 24.4;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 28.8;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.5; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.5;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 11.9;
                }
            } else if ($umur == 59) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 21.0;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 24.6;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 29.2;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.6; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.6;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 12.0;
                }
            } else if ($umur == 60) {
                if ($ruj <= 1 && $ruj > 0) {
                    $sd = 21.2;
                } else if ($ruj <= 2 && $ruj > 1) {
                    $sd = 24.9;
                } else if ($ruj >= 3 && $ruj > 2) {
                    $sd = 29.5;
                } else if ($ruj >= -1 && $ruj < 0) {
                    $sd = 15.8; //sampe sini
                } else if ($ruj >= -2 && $ruj < -1) {
                    $sd = 13.7;
                } else if ($ruj <= -3 && $ruj < -2) {
                    $sd = 12.1;
                }
            }
        }

        // Hitung z-score
        if ($ruj > 0) {
            $sdruj = $sd - $median;
        } else {
            $sdruj = $median - $sd;
        }
        $zScore = ($berat_badan - $median) / $sdruj;

        return $zScore;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'balita_id' => 'required|string',
            'penimbangan_id' => 'required',
            'tanggal' => 'required',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
            'berat_badan' => 'required|numeric',
        ]);

        $umur = $request->input('umur');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $berat_badan = $request->input('berat_badan');

        $zScore = $this->hitungZScore($berat_badan, $umur, $jenis_kelamin);

        if ($zScore < -3) {
            $display = "Berat badan sangat kurang";
        } elseif ($zScore >= -3 && $zScore < -2) {
            $display = "Berat badan kurang";
        } else if ($zScore >= -2 && $zScore <= 1) {
            $display = "Berat badan normal";
        } elseif ($zScore > 1) {
            $display = "Resiko berat badan lebih";
        }
        
        $penimbangan = new Penimbangan([
            'balita_id' => $request->balita_id,
            'penimbangan_id' => $request->penimbangan_id,
            'tanggal' => $request->tanggal,
            'p_umur' => $umur,
            'kelamin' => $request->jenis_kelamin,
            'berat' => $request->berat_badan,
            'status' => $display,
            'z_indeks' => $zScore,
        ]);
        
        // $grafik = new Grafik([
        //     'id' => $request->penimbangan_id,
        //     'tanggal' => $request->tanggal,
        // ]);
        
        // dd($penimbangan);
        $penimbangan->save();
        // $grafik->save();
        return redirect('penimbangan')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Display the specified resource.
     */
    public function show(penimbangan $penimbangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $test = DB::table('balitas')
        ->where('balitas.ibu_id', '=', $id)
        ->get();
        foreach ($test as $p) {
            $penimbangan = DB::table('penimbangans')
            ->join('balitas', 'penimbangans.balita_id', '=', 'balitas.id')
            ->join('ibus', 'balitas.ibu_id', '=', 'ibus.id')
            ->where('penimbangans.balita_id', '=', $p->id)
            ->get();
            // print_r($penimbangan);
            return view ('penimbangan.edit', compact('penimbangan'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penimbangan $penimbangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penimbangan $penimbangan)
    {
        //
    }
}
