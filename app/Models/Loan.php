<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Loan extends Model
{
    use HasFactory;

    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function getAllLoans(){
        return Loan::with('book', 'user')->get();
    }
    public static function getPendingLoans(){
        return Loan::where('returned', '!=', '1');
    }

    public static function getReturnedLoans(){
        return Loan::where('returned', '=', '1');
    }

    public static function addLoan($book, $user){
        $loan = new Loan();
        $now = now();
        $loanDate = $now->toDateTimeString();
        $returnDate = $now->addMonth()->toDateTimeString();
        $book = Book::getBookById($book);

        if($book->available == 1){
            $user = User::find($user);

            $loan->loan_date = $loanDate;
            $loan->return_date = $returnDate;
            $loan->user_id = $user[0]->id;
            $loan->book_id = $book->id;
            $loan->returned = 0;

            $loan->save();

            $book->available = 0;
            $book->save();

            return redirect('/loans');
        }

        return new Response(["success" => false, "message" => "Ese libro no se encuentra disponible"]);

    }

    public static function returnLoan($loanId){
        $loan = Loan::find($loanId);
        $book = Book::find($loan->user_id);

        if(isset($loan)){

            $loan->returned = 1;

            $loan->save();

            $book->available = 1;

            $book->save();

            return redirect('/loans');
        }

        return new Response(['success' => false, 'message' => "No se ha encontrado el préstamo"]);
    }

    public static function getUserLoans(){

        $userId = Auth::id();

        $userLoans = Loan::where('user_id', '=', $userId)->get();

        /* dd(json_encode($userLoans)); */

        return $userLoans;

    }
}
