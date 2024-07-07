@extends('layouts.master')
@section('judul')
Halaman Tampilan Cast
@endsection

@section('content')

<a href="/cast/create" class="btn btn-primary btn-sm">Tambah</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Umur</th>
            <th scope="col">Bio</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($cast as $key => $item)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$item->nama}}</td>
            <td>{{$item->umur}}</td>
            <td>{{$item->bio}}</td>
            <td>
                <form action="/cast/{{$item->id}}" method="post">
                    @csrf
                    @method('delete')

                    <a href="/cast/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/cast/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>Tidak ada kategori</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection