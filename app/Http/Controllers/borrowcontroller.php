<?php
namespace App\Http\Controllers;
use App\Models\borrow;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\book;
use Carbon\Carbon;

class borrowcontroller extends Controller
{

    public function store(book $book)
    {

        $user = \Auth::user();
        $user->req()->attach($book->id);
        $book->update(["number" => $book->number - 1]);
        return redirect()->back();
    }

    public function destroy($id, book $book, user $user)
    {

        $book->update(["number" => $book->number + 1]);
        $user = User::find($user->id);
        $user->req()->wherePivot('id', $id)->detach();
        return redirect()->back();
    }

    public function borrowindex()
    {
        $requ = User::has('req')->get();
        $requ->load('req');
        return view('borrow.index', ['requ' => $requ]);
    }

    public function accept($id, book $book, user $user)
    {

        $user = User::find($user->id);
        $user->req()->wherePivot('id', $id)->updateExistingPivot($book->id, [
            'answer' => 1, 'user_borrowed_at' => $start_at = Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function showmybook()
    {

        $user = \Auth::user();
        $mb = $user->req()->where('answer', 3)->get();
        return view('my_ac.mybook', ['mb' => $mb]);
    }

    public function showmyNowbook()
    {

        $user = \Auth::user();
        $mb = $user->req()->where('answer', 1)->get();
        return view('my_ac.myNowbook', ['mb' => $mb]);
    }


    public function myborrowrequest()
    {

        $user = \Auth::user();
        $mb1=$user->load("req");
       return view('my_ac.myrequ', ['mb1' => $mb1]);
    }


    public function returnRequest($id, $book_id)
    {
        $user = User::find(\Auth::user()->id);
        $user->req()->wherePivot('id', $id)->updateExistingPivot($book_id, [
            'answer' => 2,
        ]);
        return redirect()->back();
    }

    public function backBookaccept($id, book $book, user $user)
    {

        $user = User::find($user->id);
        $user->req()->wherePivot('id', $id)->updateExistingPivot($book->id, [
            'answer' => 3, 'user_refunds_at' => $start_at = Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function  backBookreject($id, book $book, user $user)
    {

        $user = User::find($user->id);
        $user->req()->wherePivot('id', $id)->updateExistingPivot($book->id, [
            'answer' => 1,
        ]);
        return redirect()->back();
    }
    public function  DelBorrowReq($id)
    {
        $user = \Auth::user();
        $us=User::find($user->id);
        $us->req()->wherePivot('id',$id)->detach();
         return redirect()->back();
    }

  
    public function  DelRefudsReq(book $book , $id)
    {
        $user = \Auth::user();
        $us=User::find($user->id);
        $user->req()->wherePivot('id', $id)->updateExistingPivot($book->id, [
            'answer' => 1
        ]);
        
         return redirect()->back();
    }
}
