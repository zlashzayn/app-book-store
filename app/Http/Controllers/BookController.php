<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    public function index()
    {
        $book = Book::with('genre')->get();
        return view('book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view('book.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $filename = null;
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('image', 'public');
            $filename = basename($path);
            Log::info("File path: $path, Filename: $filename");
        }

        $book = new Book;

        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->deskripsi = $request->deskripsi;
        $book->tahun = $request->tahun;
        $book->harga = $request->harga;
        $book->genre_id = $request->genre_id;
        $book->cover = $filename;

        $book->save();

        return redirect()->route('book.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('genre')->find($id);
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::with('genre')->find($id);
        $genre = Genre::all();
        return view('book.edit', compact('book', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'deskripsi' => 'required',
            'tahun' => 'required',
            'harga' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book = Book::find($id);

        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->deskripsi = $request->deskripsi;
        $book->tahun = $request->tahun;
        $book->harga = $request->harga;
        $book->genre_id = $request->genre_id;
        
        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::delete('public/image/' . $book->cover);
            }
            $path = $request->file('cover')->store('image', 'public');
            $filename = basename($path);

            $book->cover = $filename;
        }

        $book->save();
        return redirect()->route('book.index')->with('success', 'Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Buku berhasil dihapus!');
    }
}
