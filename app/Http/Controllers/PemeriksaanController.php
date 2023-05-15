<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\balita;
use App\Models\penimbangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $pemeriksaan = DB::table('balitas')
        ->where('balitas.ibu_id', '=', $id)
        ->get();
        foreach ($pemeriksaan as $p) {
            $cek = DB::table('penimbangans')
            ->join('balitas', 'penimbangans.balita_id', '=', 'balitas.id')
            ->where('penimbangans.balita_id', '=', $p->id)
            ->get();
            // print_r($cek);
            return view ('lamanpemeriksaan.index',['title' => 'Pemeriksaan'], compact('cek','user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
