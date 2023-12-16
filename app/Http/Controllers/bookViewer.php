<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\GenEd;
use Illuminate\Support\Facades\DB;
class bookViewer extends Controller {
    function bookviewer(Request $request, $type){
        $query = GenEd::query();

        if ($type == "New") {
            $query->where(DB::raw('DATEDIFF(NOW(), created_at)'), '<=', 5);
        } else {
            $query->where('category', $type);
        }


        $search = $request->input('search');
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        $books = $query->paginate(3);

        return view('welcome', [
            'books' => $books,
            'type' => $type,
        ]);
    }
}
