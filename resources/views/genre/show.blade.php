@extends('layouts.master')

@section('title')
    Daftar Film Berdasarkan Genre
@endsection

@section('content')
<h3>Genre {{ $genre->nama }}</h3>
<div class="row">
    @forelse ($genre->book as $item)
        <div class="col-3">
            <div class="card">
                <img src="{{ asset('storage/image/' . $item->cover) }}" class="card-img-top img-fluid" style="max-width: 100%s;" alt="Cover {{ $item->judul }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $item->judul }}</h3>
                    <p class="card-text">{{ Str::limit($item->deskripsi, 200) }}</p>
                    <form action="{{ route('book.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('book.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                        @auth
                            <a href="{{ route('book.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Buku ini?')">
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    @empty
        <h5 class="text-center">Genre ini tidak memiliki Buku</h5>
    @endforelse
</div>
@endsection