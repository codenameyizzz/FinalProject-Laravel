@extends('layouts.master')
@section('judul')
Halaman Tambah Film
@endsection
@section('content')
<form action="/film" method="POST" enctype="multipart/form-data">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @csrf
    <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control" id="">
                <option value="">Pilih Genre</opt>
            @forelse ($genre as $item)
                <option value={{$item -> id}}>{{$item -> nama}}</option>
            @empty
                <option value="">Tidak ada Genre</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control">
    </div>
    <div class="form-group">
        <label>Ringkasan</label> <br>
        <textarea name="ringkasan" class="form-control" rows="5"></textarea>
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