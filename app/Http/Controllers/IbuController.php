<?php

namespace App\Http\Controllers;

use App\Models\ibu;
use App\Models\User;
use App\Models\balita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IbuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balita = balita::all();
        $user = Auth::user();
        $ibu = DB::table('ibus')
        ->join('balitas', 'ibus.id', '=', 'balitas.ibu_id')
        ->get();
        return view ('lamanibu.dataIbu',['title' => 'Data Ibu'], compact('ibu','user'));
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
    public function show(ibu $ibu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ibu $ibu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ibu $ibu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ibu $ibu)
    {
        //
    }
}
