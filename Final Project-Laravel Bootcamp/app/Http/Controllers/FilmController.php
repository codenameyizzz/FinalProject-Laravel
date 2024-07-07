<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GenreModel;
use App\Models\FilmModel;
use File;

class FilmController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function create()
    {
        $genre = GenreModel::all();

        return view("film.tambahFilm", ['genre' => $genre]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:1',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required|mimes:png,jpg,jpeg|max:2048',
            'genre_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->poster->extension();

        $request->poster->move(public_path('image'), $imageName);

        FilmModel::create([
            'judul' => $request->input('judul'),
            'ringkasan' => $request->input('ringkasan'),
            'tahun' => $request->input('tahun'),
            'poster' => $imageName,
            'genre_id' => $request->input('genre_id'),
        ]);

        return redirect('/film');
    }

    public function index()
    {
        $film = FilmModel::all();

        return view('film.tampilFilm', ['film' => $film]);
    }

    public function show($id)
    {
        $film = FilmModel::find($id);

        return view('film.detailFilm', ['film' => $film]);
    }

    public function edit(String $id)
    {
        $film = FilmModel::find($id);
        $genre = GenreModel::all();

        return view('film.editFilm', ['film' => $film, 'genre' => $genre]);
    }

    public function update(string $id, Request $request)
    {
        $request->validate([
            'judul' => 'required|min:1',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'mimes:png,jpg,jpeg|max:2048',
            'genre_id' => 'required',
        ]);

        $film = FilmModel::find($id);

        if ($request->has('poster')) {
            File::delete('image/' . $film->poster);

            $imageName = time().'.'. $request->poster->extension();

            $request->poster->move(public_path('image'), $imageName);

            $film->poster = $imageName;
        }

        $film->judul = $request->input('judul');
        $film->ringkasan = $request->input('ringkasan');
        $film->tahun = $request->input('tahun');
        $film->genre_id = $request->input('genre_id');

        $film->save();

        return redirect('/film');
    }

    public function destroy($id)
    {
        $film = FilmModel::find($id);

        File::delete('image/' . $film->poster);
 
        $film->delete();

        return redirect('/film');
    }
}
