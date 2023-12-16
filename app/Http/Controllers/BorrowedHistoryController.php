<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\borrowedHistory;
use App\Models\BorrowedBooks;
use App\Models\GenEd;
class BorrowedHistoryController extends Controller
{
    public function getHistory(){
        $histories = borrowedHistory::paginate(5);
        return view('borrowedhistory',compact('histories'));
    }
    public function searchHistory(Request $request) {
        $searchQuery = $request->input('query');

        $histories = borrowedHistory::when($searchQuery, function ($query) use ($searchQuery) {
            $query->where('studName', 'LIKE', '%'.$searchQuery.'%')
                  ->orWhere('bookTitle', 'LIKE', '%'.$searchQuery.'%');
        })->paginate(5);

        return view('borrowedhistory', compact('histories'));
    }
    public function toggleBorrowed(Request $request, BorrowedBooks $borrowedBooks) {

        $history = new borrowedHistory();

        $history->idBook = $borrowedBooks->idBook;
        $history->studID = $borrowedBooks->studID;
        $history->studName = $borrowedBooks->studName;
        $history->bookTitle = $borrowedBooks->bookTitle;
        $history->date_borrowed = $borrowedBooks->date_reserved;
        $history->date_returned = $borrowedBooks->date_returned;


        $history->save();


        $gened = GenEd::find($borrowedBooks->idBook); //30


        $gened->increment('copy');


        $borrowedBooks->delete();

        $histories = borrowedHistory::paginate(5);
        return view('borrowedhistory', compact(['histories']))->with('success', 'Book returned successfully.');
    }


}
