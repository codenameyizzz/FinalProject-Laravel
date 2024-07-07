@extends('layouts.master')
@section('judul')
Halaman Detail Cast
@endsection
@section('content')

<h1>{{$cast->nama}}</h1>
<p>{{$cast->umur}}</p>
<p>{{$cast->bio}}</p>

<a href="/cast" class="btn btn-secondary btn-sm">Kembali</a>

@endsection