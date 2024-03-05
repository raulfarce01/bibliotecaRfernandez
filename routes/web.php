<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\loanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class, 'index']);

Route::get('/add_book', [BookController::class, 'showAddBook'])->name("showAddBook");
Route::post('/add_book_post', [BookController::class, 'addBook'])->name("addBook");
Route::get('/delete_book/{bookId}', [BookController::class, 'deleteBook'])->name("deleteBook");
Route::get('/edit_book/{bookId}', [BookController::class, 'showEditBook'])->name("editBook");
Route::post('/edit_book_post/{bookId}', [BookController::class, 'editBook'])->name("editBookPost");

Route::get('/loans', [loanController::class, 'index'])->name('loans');
Route::get('/add_loan', [loanController::class, 'showAddLoan'])->name('showAddLoan');
Route::post('/add_loan_post', [loanController::class, 'addLoan'])->name('addLoan');
Route::get('/return_loan/{loanId}', [loanController::class, 'returnLoan'])->name('returnLoan');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
