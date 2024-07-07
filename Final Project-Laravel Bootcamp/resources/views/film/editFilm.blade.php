@extends('layouts.master')
@section('judul')
Halaman Edit Film
@endsection
@section('content')
<form action="/film/{{$film->id}}" method="POST" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @method("PUT")
    @csrf
    <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control" id="">
            <option value="">Pilih Genre</opt>
                @forelse ($genre as $item)
                @if ($item->id === $film->genre_id)
            <option value={{$item->id}} selected>{{$item->nama}}</option>
            @else
            <option value={{$item->id}}>{{$item->nama}}</option>
            @endif
            @empty
            <option value="">Tidak ada Genre</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label>Judul</label>
        <input type="text" value="{{$film->judul}}" name="judul" class="form-control">
    </div>
    <div class="form-group">
        <label>Ringkasan</label> <br>
        <textarea name="ringkasan" class="form-control" rows="5">{{$film->ringkasan}}</textarea>
    </div>
    <div class="form-group">
        <label>Tahun</label>
        <input type="text" name="tahun" class="form-control">
    </div>
    <div class="form-group">
        <label>Poster</label>
        <input type="file" name="poster" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection