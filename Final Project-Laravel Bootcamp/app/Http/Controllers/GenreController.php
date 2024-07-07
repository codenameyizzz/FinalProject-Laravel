<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GenreModel;

class GenreController extends Controller
{
    public function create()
    {
        return view("genre.tambahGenre");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5'
        ]);

        DB::table('genre')->insert([
            'nama' => $request->input('nama')
        ]);

        return redirect('/genre');
    }

    public function index()
    {
        $genre = DB::table('genre')->get();

        return view('genre.tampilGenre', ['genre' => $genre]);
    }

    public function show($id)
    {
        $genre = GenreModel::find($id);

        return view('genre.detailGenre', ['genre' => $genre]);
    }

    public function edit($id)
    {
        $genre = DB::table('genre')->find($id);

        return view('genre.editGenre', ['genre' => $genre]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5'
        ]);

        DB::table('genre')
            ->where('id', $id)
            ->update([
                'nama' => 'required|min:5'
            ]);

        return redirect('/genre');
    }

    public function destroy($id)
    {
        DB::table('genre')->where('id', '=', $id)->delete();

        return redirect('/genre');
    }
}
