<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    public function book(){
        return $this->belongsToMany(Book::class, 'author_book', 'author_id', 'book_id');
    }
}
