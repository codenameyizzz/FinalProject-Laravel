@extends('layouts.master')
@section('judul')
Halaman Tampilan Film
@endsection

@section('content')

@auth()
<a href="/film/create" class="btn btn-primary btn-sm my-3">Tambah</a>
@endauth

<div class="row">
    @forelse ($film as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('image/'. $item->poster)}}" width="150px" class="card-img-top" alt="...">
            <div class="card-body">
                <h2>{{$item -> judul}}</h2>
                <span class="badge badge-info">{{$item->genre->nama}}</span>
                <p class="card-text">{{ Str::limit($item->ringkasan, 100)}}</p>
                <a href="/film/{{$item->id}}" class="btn btn-primary btn-block">Detail</a>

                @auth()
                <div class="row my-3">
                    <div class="col">
                        <a href="/film/{{$item->id}}/edit" class="btn btn-warning btn-block">Edit</a>
                    </div>
                    <div class="col">
                        <form action="/film/{{$item->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </div>
    @empty
    <h4>Tidak ada Film</h4>
    @endforelse
</div>
@endsection