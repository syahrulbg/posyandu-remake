<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ibu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('pages.setting')->with([
        //     'user' => Auth::user(),
        //     'title' => 'Setting'
        // ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $ibu = Ibu::all();
        $user1 = DB::table('users')
        ->join('ibus', 'users.ibu_id', '=', 'ibus.id')
        ->select('users.*', 'ibus.*')
        ->where('users.id', '=', $id)
        ->get();
        // $user = User::find($id);
        // $cek = $id;
        return view ('settings.edit',['title'=>'Settings'], compact('user', 'ibu', 'user1'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ibu $ibu)
    {
        $request->validate([
            'name' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'alamat' => 'required',
            'nomorHP' => 'required',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        
            DB::table('users')->where('id',$request->id)->update([
                'ibu_id' => $request->ibu_id,
            ]);
            DB::table('ibus')->where('id',$request->id)->update([
                'name' => $request->name,
                // 'image' => $image->hashName(),
                'alamat' => $request->alamat,
                'nomorHP' => $request->nomorHP,
                'ttl' => $request->ttl,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        
        return redirect('/')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
