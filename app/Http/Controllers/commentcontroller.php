<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\book;
use Illuminate\Http\Request;

class commentcontroller extends Controller
{

  public function store(Request $request)
  {
    $book = book::find($request->book_id);
    $book->us_comments()->attach(\Auth::id(), ['description' => $request->des]);
    return redirect()->back();
  }

  public function destroy($id, $book_id)
  {
    //dd($id);
    $book = book::find($book_id);
    $book->us_comments()->wherePivot('id', $id)->detach();
    return redirect()->back();
  }
}
