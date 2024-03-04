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
    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function loans(){
        return $this->belogsToOne(Loan::class);
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

        $book->title = $title;
        $book->release = $release;
        $book->save();

        return new Response(["success" => true, "message" => "Se ha creado el libro correctamente"]);
    }

    public static function updateBook($id, $title, $release){
        $book = Book::find($id);

        if(isset($book)){
            $book->title = $title;
            $book->release = $release;
            $book->save();

            return new Response(["success" => true, "message" => "Se ha actualizado el libro correctamente"]);
        }

        return new Response(["success" => false, "message" => "No se ha podido encontrar el libro"]);
    }

    public static function deleteBook($oldClause){
        $book = Book::where("title", "=", $oldClause)
                    ->orWhere("release", "LIKE", "%".$oldClause."%")
                    ->orWhere("id", "=", $oldClause);

        if($book){
            $book->delete();
            return new Response(["success" => true, "message" => "Se ha eliminado el libro correctamente"]);
        }

        return new Response(["success" => false, "message" => "No se ha podido encontrar el libro"]);
    }
}
