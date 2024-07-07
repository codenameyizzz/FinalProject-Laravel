@extends('layouts.master')
@section('judul')
Halaman Detail Genre
@endsection
@section('content')

<h1>{{$genre->nama}}</h1>

<div class="row">
@forelse ($genre->listGenre as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('image/'. $item->poster)}}" width="150px" class="card-img-top" alt="...">
            <div class="card-body">
                <h2>{{$item -> judul}}</h2>
                <p class="card-text">{{ Str::limit($item->ringkasan, 100)}}</p>
                <a href="/film/{{$item->id}}" class="btn btn-primary btn-block">Detail</a>
            </div>
        </div>
    </div>
@empty
    <h4>Tidak ada Film di Genre ini</h4>
@endforelse
</div>

<a href="/genre" class="btn btn-secondary btn-sm">Kembali</a>

@endsection