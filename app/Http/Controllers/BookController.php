<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;

class BookController extends Controller
{

    protected $book;
    protected $author;

    public function __construct(Book $book, Author $author){
        $this->book = $book;
        $this->author = $author;
    }

    public function index(){
        $allBooks = $this->book->getAllBooks();
        /*foreach ($allAuthors as $author){
            $allBooks = Book::whereHas('author', function($q) {
                $q->where('id', '=', $author->id);
            });
        }*/
        $res = [];

        foreach($allBooks as $book){
            $allAuthorsFormBook =  $book->author;
            $res[$book->id] = ["id" => $book->id,
                                "title" => $book->title,
                                "release" => $book->release,
                                "authors" => $book->author
                            ];
        }

        return view('book_show', ['books' => $res]);
    }

    public function showAddBook(){
        return view('book_add');
    }

    public function addBook(Request $request){
        $title = $request->input('title');
        $release = $request->input('release');
        $authors = $request->input('authors', []);

        return Book::saveBook($title, $release, $authors);
    }

    public function deleteBook($bookId){

        return Book::deleteBook($bookId);
    }

    public function showEditBook($bookId){

        $book = Book::getBookById($bookId);

        return view('book_edit', ['book' => $book]);
    }

    public function editBook($bookId, Request $request){

        $newTitle = $request->input("title");
        $newRelease = $request->input("release");

        return Book::updateBook($bookId, $newTitle, $newRelease);
    }
}
