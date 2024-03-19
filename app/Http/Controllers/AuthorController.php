<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{

    protected $author;

    public function __construct(Author $author){
        $this->author = $author;
    }

    public static function addAuthors($authors){

        $authorsResponse = Author::addAuthors($authors);

        return $authorsResponse;

    }

}
