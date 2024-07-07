@extends('layouts.master')
@section('judul')
Halaman Tampilan Genre
@endsection

@section('content')

<a href="/genre/create" class="btn btn-primary btn-sm">Tambah</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($genre as $key => $item)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$item->nama}}</td>
            <td>
                <form action="/genre/{{$item->id}}" method="post">
                    @csrf
                    @method('delete')

                    <a href="/genre/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/genre/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
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