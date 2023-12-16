<?php

namespace App\Http\Controllers;

use App\Models\PendingBooks;
use App\Models\BorrowedBooks;
use App\Models\GenEd;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PendingBooksController extends Controller
{
    public function pendingBooks(){
            $pending = PendingBooks::all();
        return view('pendingBooks')->with('pendingbook',$pending);
    }
    public function deadline(){

        $pending = new PendingBooks();
        $pending->date_borrowed = Carbon::now();
        $pending->save();
        $pending->calculatDeadline();
    }
    public function togglePending(Request $request,$id){
        $borrowed = new BorrowedBooks();
        $status = 'NOT YET RETURNED';

        $borrowed->idBook= $request->input('idBook');
        $borrowed->studID = $request->input('studID');
        $borrowed->studName =$request->input('studName');
        $borrowed->bookTitle = $request->input('bookTitle');
        $borrowed->status = $status;
        $borrowed->date_borrowed= $request->input('date_borrowed');
        $borrowed->date_returned= $request->input('date_returned');

        $borrowed->save();

        $pending = PendingBooks::find($id);
        $pending->delete();
        return redirect('borrowedBooks')->with('Sucess','');
    }
    public function studentPending(Request $request)
    {
        $user = $request->user();


        $user->load('pendingBooks');

        // Access the pending books
        $pendingBooks = $user->pendingBooks;

        return view('studentPending', ['pendingBooks' => $pendingBooks]);
    }

    public function deniedreq(Request $request,$id) {
        $gened = new GenEd();
        $pending= PendingBooks::find($id);
        $pending->delete();

        $gened->increment('copy');
        return redirect(route('pendingBooks'));

   }

}
