<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = ['nama'];

    public function Book()
    {
        return $this->hasMany(Book::class, 'genre_id');
    }
}
