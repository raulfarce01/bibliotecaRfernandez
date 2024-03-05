<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function book(){
        return $this->belongsToMany(Book::class, 'genre_book', 'genre_id', 'book_id');
    }
}
