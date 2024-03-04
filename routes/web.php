<?php

use App\Http\Controllers\BookController;
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

