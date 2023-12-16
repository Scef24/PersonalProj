<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenEd;

class BookController extends Controller
{

    public function newArrivals() {

    }
    public function getBooksByCategory($category)
    {
        $books = GenEd::where('category', $category)->simplePaginate(5);
        return view('books.index', ['books' => $books]);
    }
}
