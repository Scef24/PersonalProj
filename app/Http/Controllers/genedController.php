<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenEd;

class genedController extends Controller
{
    public function dashboard() {
        return view ('welcome');
    }
    public function index() {
        $gened = GenEd::all();
        return view('librarianhome')->with('geneds', $gened);
    }

    public function getGenEBooks(Request $request) {
        $query = $request->input('query');
        $categoryFilter = $request->input('category');

        $geneds = GenEd::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%$query%")
                             ->orWhere('author', 'like', "%$query%")
                             ->orWhere('category', 'like', "%$query%");
            })
            ->when($categoryFilter, function ($queryBuilder) use ($categoryFilter) {
                $queryBuilder->where('category', $categoryFilter);
            })
            ->paginate(4);

        $categories = GenEd::select('category')->distinct()->get();

        return view('librarianhome', ['geneds' => $geneds, 'query' => $query, 'categories' => $categories, 'selectedCategory' => $categoryFilter]);

    }
    public function save (Request $request)
    {

            $gened = new GenEd;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/image');

                // $imagepath = ;
                $gened->image = str_replace('public','storage', $imagePath);

            }


            $gened->accession_num = $request->input('accession_num');
            $gened->call_num = $request->input('call_num');
            $gened->title = $request->input('title');
            $gened->publisher = $request->input('publisher');
            $gened->author = $request->input('author');
            $gened->category = $request->input('category');


            $gened->save();

            // Redirect to the librarianhome route
            return redirect('librarianhome')->with('success', 'GenEd record created successfully!');
        }




    public function update(Request $request, $id) {
           $gened = GenEd::find($id);
           $input = $request->all();
           $gened->fill($input)->save();

           return redirect('librarianhome')->with('sucess','Succesfully Updated');
    }
    public function delete($id) {
            $gened= GenEd::find($id);
            $gened->delete();

            return redirect('librarianhome');

       }
       public function addCopy(Request $request, $id) {
            $gened = GenEd::find($id);
            $gened->increment('copy');
            $gened->save();

            return redirect('librarianhome')->with('success','Copy Adde Succesfully');
       }
}
