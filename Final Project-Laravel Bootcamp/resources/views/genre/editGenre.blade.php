@extends('layouts.master')
@section('judul')
Halaman Edit Genre
@endsection
@section('content')
<form action="/genre/{{$genre->id}}" method="POST">
    @method('put')
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
        <label>Nama</label>
        <input type="text"  value="{{$genre->nama}}" name="nama" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection