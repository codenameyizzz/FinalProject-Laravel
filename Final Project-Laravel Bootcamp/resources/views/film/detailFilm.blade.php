@extends('layouts.master')
@section('judul')
Halaman Detail Film
@endsection
@section('content')

<img src="{{asset('image/'.$film->poster)}}" width="50%"  alt="{{$film->poster}}">
<h1 class="text-primary">{{$film->judul}}</h1>  
<p>{{$film->ringkasan}}</p>
<p>Tahun Rilis : {{$film->tahun}}</p>

<hr>
<h4>List Review</h4>
@forelse ($film->critics as $item)
    <div class="card">
    <div class="card-header">
        {{$item->user->name}}
    </div>
    <div class="card-body">
        <p class="card-text">{{$item->content}}</p>
        <p class="card-text">Review/Bintang : {{$item->point}}</p>
    </div>
</div>
    
@empty
    <h4>Tidak ada Review di Film ini</h4>
@endforelse

@auth
<hr>
<h4>Tambah Review</h4>
    <form action="/critics/{{$film->id}}" method="POST" class="mb-5">
        @csrf
        <textarea name="content" rows="10" id="" class="form-control" placeholder="Berikan kritik/komentar"></textarea> <br>
        <input type="number" name="point" class="form-control" placeholder="Berikan Rating (Skala 1-5). Keterangan : 1 = Buruk Sekali, 5 = Baik Sekali">
        <input type="submit" value="Beri komentar" class="btn btn-block btn-primary my-3">
    </form>
@endauth

<a href="/film" class="btn btn-secondary btn-sm">Kembali</a>

@endsection