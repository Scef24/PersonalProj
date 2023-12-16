<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\genedController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\bookViewer;
use App\Http\Controllers\BorrowedBooksController;
use App\Http\Controllers\getAllStudent;
use App\Http\Controllers\PendingBooksController;
use App\Http\Controllers\BorrowedHistoryController;
use App\Http\Middleware\LibrarianMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function(Request $request){
    if(Auth::check())
    {
        if(strtolower($request->user()->role) == 'librarian')
            return redirect()->intended(route('librarianhome'));
        else
            return redirect()->intended(route('home'));
    }

    return redirect()->intended('login');
    // return view('login');
});

Route::get('/login',[AuthManager::class, 'login'])->name('login')->middleware('guest');
Route::post('login',[AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/books/{type}', [bookViewer::class, 'bookviewer'])->name('books');



Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthManager::class, 'logout'])->name('logout');

    Route::middleware('student')->group(function(){
    Route::get('books/New',[genedController::class, 'dashboard'])->name('home');
    Route::post('studentBooks',[BorrowedBooksController::class,'showStudentBook'])->name('studentBooks');
    Route::post('studentPending',[PendingBooksController::class,'studentPending'])->name('studentPending');
    Route::post('saveborrowedBooks/{book}',[BorrowedBooksController::class,'saveBorrowedBooks'])->name('saveborrowedBooks');
    Route::get('/books/{type}', [bookViewer::class, 'bookviewer'])->name('books');
    Route::get('/books/{type}', [bookviewer::class, 'bookviewer'])->name('bookViewer');



});
    Route::middleware('librarian')->group(function(){
        Route::get('/students/search', [getAllStudent::class, 'getAllStudent'])->name('students.search');
        Route::get('/borrowedhistory', [BorrowedHistoryController::class, 'getHistory'])->name('borrowedhistory');
        Route::get('/borrowedhistory/search', [BorrowedHistoryController::class, 'searchHistory'])->name('borrowedhistory.search');
        Route::get('librarianhome', [genedController::class, 'getGenEBooks'])->name('librarianhome');
        Route::post('/togglePending/{id}',[PendingBooksController::class, 'togglePending'])->name('togglePending');
        Route::post('/toggleBorrowed/{borrowedBooks}',[BorrowedHistoryController::class, 'toggleBorrowed'])->name('toggleBorrowed');
        Route::post('save', [genedController::class, 'save']);
        Route::patch('update/{id}', [genedController::class, 'update'])->name('book.update');
        Route::delete('/delete/{id}',[genedController::class,'delete'])->name('book.delete');
        Route::get('registration',[AuthManager::class, 'registration'])->name('registration');
        Route::post('registration',[AuthManager::class, 'registrationPost'])->name('registration.post');
        Route::get('borrowedBooks',[BorrowedBooksController::class,'getBorrowedBooks'])->name('borrowedBooks');
        Route::get('getAllStudent',[getAllStudent::class,'getAllStudent'])->name('getAllStudent');
        Route::get('pendingBooks',[PendingBooksController::class,'pendingBooks'])->name('pendingBooks');
        Route::post('denied/{id}', [PendingBooksController::class, 'deniedreq'])->name('denied');
        Route::patch('addCopy/{id}',[genedController::class,'addCopy'])->name('book.addCopy');
        Route::get('index', [genedController::class, 'index']);
    });
});






