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
        $data = request()->validate([
            'date' => 'required|date|after_or_equal:today',
        ]);

        $date = $data['date'];
        $Bbook = GenEd::find($book);

        if (!$Bbook) {
            return redirect(route('home'))->with('error', 'The book cannot be found.');
        }

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



            return redirect(route('home'))->with('success', 'Success! Please claim the book at the library.');
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
