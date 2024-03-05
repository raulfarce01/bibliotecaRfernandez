<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class loanController extends Controller
{

    protected $loan;

    public function __construct(Loan $loan){
        $this->loan = $loan;
    }

    public function index(){
        $allLoans = $this->loan->getAllLoans();
        return view('loan_show', ['loans' => $allLoans]);
    }

    public function showAddLoan(){
        $allBooks = Book::all();
        $allUsers = User::all();
        return view('loan_add', ['books' => $allBooks, 'users' => $allUsers]);
    }

    public function addLoan(Request $request){
        $book = $request->input('book');
        $user = $request->input('user');

        return Loan::addLoan($book, $user);
    }

    public function returnLoan($bookId){

        return Loan::returnLoan($bookId);

    }

}
