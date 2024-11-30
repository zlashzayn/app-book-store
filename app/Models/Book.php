<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['judul', 'penulis', 'deskripsi', 'tahun', 'harga', 'cover', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
