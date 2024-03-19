<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loanController extends Controller
{

    protected $loan;

    public function __construct(Loan $loan){
        $this->loan = $loan;
    }

    public function index(){
        $userLoans = Loan::getUserLoans();
        return view('loan_show', ['loans' => $userLoans]);
    }

    public function showAddLoan(){
        $allBooks = Book::all();
        return view('loan_add', ['books' => $allBooks]);
    }

    public function addLoan(Request $request){
        $book = $request->input('book');
        $user = Auth::user();

        return Loan::addLoan($book, $user);
    }

    public function returnLoan($bookId){

        return Loan::returnLoan($bookId);

    }

}
