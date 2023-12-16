<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBooks;
use Illuminate\Http\Request;
use App\Models\PendingBooks;
use App\Models\GenEd;
use App\Models\borrowedHistory;
use Carbon\Carbon;
use App\Models\User;
class BorrowedBooksController extends Controller
{
    public function viewModal(){
        return view('borrowModal')->with('borrowModal');
    }
    public function getBorrowedBooks() {
        $borrowedBooks = BorrowedBooks::all();
        return view('borrowedBooks')->with('borrowedbooks',$borrowedBooks);
    }
    public function saveBorrowedBooks($book)
    {
        $user = auth()->user();
        $date = request('date');

        $Bbook = GenEd::find($book);

        if ($Bbook->copy > 1) {
            $pending = "pending";

            PendingBooks::create([
                'idBook' => $Bbook->id,
                'studID' => $user->id,
                'studName' => $user->name,
                'status' => $pending,
                'bookTitle' => $Bbook->title,
                'publisher' => $Bbook->publisher,
                'date_borrowed' => $date,
                'date_returned' => Carbon::parse($date)->addDays(3),

            ]);

            $Bbook->decrement('copy');

            return redirect(route('home'))->with('success','Success Please claim to the Library');
        } else {

            return redirect(route('home'))->with('error', 'Sorry, this book is not available for borrowing.');
        }
    }
    public function showStudentBook(Request $request)
    {
        $user = $request->user();

        $borrowedBooks = $user->borrowedBooks;

        return view('studentBooks', ['borrowedBooks' => $borrowedBooks]);
    }




}
