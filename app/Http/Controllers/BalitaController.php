<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\balita;
use App\Models\ibu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balitas = balita::latest()->paginate(5);
        $user = Auth::user();
        $users = user::all();
        $ibu = ibu::all();

        return view('lamananak.dataAnak',[
            'title' => 'Data Anak'
        ],compact('balitas', 'user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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

        return view ('lamananak.tambahDataAnak',[
            'title' => 'Tambah Data Anak'
        ],compact('balitas', 'user', 'users', 'ibu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_balita' => 'required|string',
            'ibu_id' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        // balita::create($request->all());
        $balita = new balita([
            'nama_balita' => $request->nama_balita,
            'ibu_id' => $request->ibu_id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        // $balita = new balita($request->all());
        // dd($balita);
        $balita->save();

        return redirect()->route('data-anak.index')->with('success', 'Data Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(balita $balita)
    {
        return view ('balitas.show', compact('balita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(balita $balita)
    // {
    //     $user = Auth::user();
    //     dd($balita);
    //     return view ('lamananak.editDataAnak', ['title' => 'Edit Data Anak'],compact('balita', 'user'));
    // }

    public function edit($id)
    {
        $user = Auth::user();
        $ibu = Ibu::all();
        $balita = DB::table('balitas')
        ->join('ibus', 'balitas.ibu_id', '=', 'ibus.id')
        ->select('balitas.*', 'ibus.*')
        ->where('balitas.id', '=', $id)
        ->get();
        // dd($balita);
        return view ('lamananak.editDataAnak', ['title' => 'Edit Data Anak'],compact('balita', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, balita $balita)
    {
        $request->validate([
            'nama_balita' => 'required|string',
            // 'ibu_id' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        DB::table('balitas')->where('id',$request->id)->update([
            'nama_balita' => $request->nama_balita,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        dd($balita);
        
        // $balita->update($request->all());

        return redirect()->route('data-anak.index')->with('success', 'Data Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $balita = DB::table('balitas')
        // ->join('ibus', 'balitas.ibu_id', '=', 'ibus.id')
        // ->select('balitas.*', 'ibus.*')
        // ->where('balitas.id', '=', $id)
        // ->get();
        $balita = DB::table('balitas')->select('balitas.*')->where('balitas.id', '=', $id)->delete();;
        // DB::delete('delete users where name = ?', ['John'])
        // $balita->delete();
        // dd($balita);
        return redirect('data-anak')->with('sukses', 'Data berhasil dihapus');
    }
}
