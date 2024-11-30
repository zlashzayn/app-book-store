@extends('layouts.master')

@section('title', 'Detail Buku')

@section('content')
<div class="row">
    <!-- Kolom Gambar -->
    <div class="col-md-4">
        <img src="{{ asset('storage/image/' . $book->cover) }}" class="img-thumbnail img-fluid float-end" style="max-width: 100%; max-height: auto;" alt="Cover {{ $book->judul }}">
    </div>

    <!-- Kolom Detail -->
    <div class="col-md-8">
        <h3 class="card-title">{{ $book->judul }}</h3>
        <p><strong>Tahun Terbit:</strong> {{ $book->tahun }}</p>
        <p><strong>Genre:</strong> {{ $book->genre->nama }}</p>
        <p class="card-text">{{ $book->deskripsi }}</p>
        <p><strong>Harga: Rp {{ $book->harga }}</strong></p>
        <a href="{{ route('book.index') }}" class="btn btn-success">kembali</a>
    </div>
</div>
@endsection
