@extends('layouts.master')
@section('judul')
Halaman Tambah Cast
@endsection
@section('content')
<form action="/cast" method="POST">
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
        <label>Name</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
        <label>Umur</label>
        <input type="text" name="umur" class="form-control">
    </div>
    <div class="form-group">
        <label>Bio</label> <br>
        <textarea name="bio" class="form-control" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection