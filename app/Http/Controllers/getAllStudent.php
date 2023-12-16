<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class getAllStudent extends Controller
{
    public function getAllStudent(Request $request){
        $query = $request->input('query');

        if ($query) {
            $stud = User::where('role', 'Student')
                ->where(function ($q) use ($query) {
                    $q->where('idnum', 'like', '%' . $query . '%')
                      ->orWhere('name', 'like', '%' . $query . '%');
                })
                ->get();
        } else {
            $stud = User::where('role', 'Student')->get();
        }

        return view('getAllStudent')->with('stud', $stud);
    }

}
