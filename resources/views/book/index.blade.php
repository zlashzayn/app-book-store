@extends('layouts.master')

@section('title')
    Daftar Buku
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@auth
    <a href="{{ route('book.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
@endauth
<div class="row">
    @forelse ($book as $item)
        <div class="col-3">
            <div class="card">
                <img src="{{ asset('storage/image/' . $item->cover) }}" class="card-img-top img-fluid img-thumbnail" style="max-width: 100%" alt="Poster {{ $item->judul }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $item->judul }}</h3>
                    <span class="badge badge-success">{{ $item->genre->nama }}</span>
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
        <h4 class="text-center">Tidak ada data Buku</h4>
    @endforelse
</div>
@endsection