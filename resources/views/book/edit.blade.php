@extends('layouts.master')

@section('title')
    Mengedit Data Buku
@endsection

@section('content')
<form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Judul Buku</label>
        <input name="judul" class="form-control" value="{{ $book->judul }}">
    </div>
    @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Penulis Buku</label>
        <input name="penulis" class="form-control" value="{{ $book->penulis }}">
    </div>
    @error('penulis')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Deskripsi Buku</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ $book->deskripsi }}</textarea>
    </div>
    @error('deskripsi')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Tahun Terbit</label>
        <select name="tahun" class="form-control" required>
            @for ($year = 1900; $year <= date('Y'); $year++)
                <option value="{{ $year }}" {{ $book->tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Harga Buku</label>
        <input name="harga" type="number" min="1" step="any" class="form-control" value="{{ $book->harga }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Cover Buku</label>
        <input name="cover" type="file" class="form-control">
    </div>
    @error('cover')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="genre_id">Genre</label>
        <select name="genre_id" id="genre_id" class="form-control">
            <option value="" disabled selected>Pilih Genre</option>
            @foreach ($genre as $item)
                <option value="{{ $item->id }}" {{ $book->genre_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection