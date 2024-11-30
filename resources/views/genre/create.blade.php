@extends('layouts.master')

@section('title')
    Menambah Genre Buku
@endsection

@section('content')
<form action="{{ route('genre.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Genre</label>
        <input name="nama" type="name" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection