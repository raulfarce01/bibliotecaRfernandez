<?php

namespace App\Models;

use App\Models\Loan;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";

    //Preguntar Belongs y eso en tablas N:N
    public function author(){
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }

    public function genre(){
        return $this->belongsToMany(Genre::class, 'genre_book', 'book_id', 'genre_id');
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public static function getAllBooks(){
        return Book::all();
    }

    public static function getBookByClause($clause){
        return Book::where("title", "=", $clause)
                    ->orWhere("release", "LIKE", "%".$clause."%")
                    ->orWhere("id", "=", $clause);
        //Preguntar consultas con claves foraneas
    }

    public static function getBookById($id){
        return Book::find($id);
        //Preguntar consultas con claves foraneas
    }

    public static function saveBook($title, $release){
        $book = new Book();
        $allBooks = Book::all();

        $book->title = $title;
        $book->release = $release;
        $book->save();

        return redirect('/');
    }

    public static function updateBook($id, $title, $release){
        $book = Book::find($id);
        $allBooks = Book::all();

        if(isset($book)){
            $book->title = $title;
            $book->release = $release;
            $book->save();

            return redirect('/');
        }

        return new Response(["success" => false, "message" => "No se ha podido encontrar el libro"]);
    }

    public static function deleteBook($bookId){
        $book = Book::find($bookId);

        if(isset($book)){
            $book->delete();
            return redirect('/');
        }

        return new Response(["success" => false, "message" => "No se ha podido encontrar el libro"]);
    }
}
