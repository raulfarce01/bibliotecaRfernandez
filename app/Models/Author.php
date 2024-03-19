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

    public static function addAuthor($author){

        $newAuthor = new Author();

        $newAuthor->name = $author;
        $newAuthor->save();

        return $newAuthor;

    }
}
