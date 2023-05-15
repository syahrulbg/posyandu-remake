<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\balita;
use App\Models\ibu;
use App\Models\user;

class BalitaUserController extends Controller
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
        $ibu = Ibu::all();
        $user = Auth::user();
        $balita = DB::table('balitas')
        ->join('ibus', 'balitas.ibu_id', '=', 'ibus.id')
        ->where('balitas.ibu_id', '=', $id)
        ->get();
        // $user = User::find($id);
        // $cek = $id;
        return view ('lamananakuser.index',['title' => 'Data Anak'], compact('balita', 'ibu','user'));
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
