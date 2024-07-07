<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function create()
    {
        return view("cast.tambahCast");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        DB::table('cast')->insert([
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
            'bio' => $request->input('bio'),
        ]);

        return redirect('/cast');
    }

    public function index()
    {
        $cast = DB::table('cast')->get();

        return view('cast.tampilCast', ['cast' => $cast]);
    }

    public function show($id) {
        $cast = DB::table('cast')->find($id);

        return view('cast.detailCast', ['cast' => $cast]);
    }

    public function edit($id) {
        $cast = DB::table('cast')->find($id);

        return view('cast.editCast', ['cast' => $cast]);
    }

    public function update($id, Request $request) {
        $request->validate([
            'nama' => 'required|min:3',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        DB::table('cast')
              ->where('id', $id)
              ->update([
                'nama'=> $request->input('nama'),
                'umur'=> $request->input('umur'),
                'bio'=> $request->input('bio')
              ]);
        
        return redirect('/cast');
    }

    public function destroy($id) {
        DB::table('cast')->where('id', '=', $id)->delete();

        return redirect('/cast');
    }
}
