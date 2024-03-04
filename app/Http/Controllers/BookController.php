<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    protected $book;

    public function __construct(Book $book){
        $this->book = $book;
    }

    public function index(){
        $allBooks = $this->book->getAllBooks();
        return view('book_show', ['books' => $allBooks]);
    }

    public function showAddBook(){
        return view('book_add');
    }

    public function addBook(Request $request){
        $title = $request->input('title');
        $release = $request->input('release');

        return Book::saveBook($title, $release);
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
