<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bookcontroller extends Controller
{

    public function index()
    {
        $bks = Book::all();
        $url = Storage::url('public/files/' );
        return view('book.index', ['bks' => $bks, 'url'=>$url]);
    }

    public function store(Request $request)
    {
    
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|int|min:0',
            'puby' => 'required|int|min:0|max:2022',
            'cover' => 'required|mimes:jpg,bmp,png|max:2048'
        ]);


        $coverfile = $request->file('cover');
        $coverfilename = $coverfile->getClientOriginalName();
        $extension = $coverfile->extension();
        $newcoverfilename = sha1(time() . '_' . rand(1000000000, 1999999999) . '_' . rand(1000000000, 1999999999) . '_' . $coverfilename);
        $newcoverfilename = $newcoverfilename . '.' . $extension;

        Storage::disk('local')->putFileAs(
            'public/files',
            $coverfile,
            $newcoverfilename
        );

        book::create(["title" => $request->title, "author" => $request->author, "publication_year" => $request->puby, "description" => $request->des, "number" => $request->number, 'cover_file_name' => $newcoverfilename, 'original_cover_file_name' => $coverfilename]);

        $bks = Book::all();
        $url = Storage::url('public/files/' );
        return view('book.index', ['bks' => $bks, 'url'=>$url]);
    }


    public function show(book $book)
    {
        $count = Book::find($book->id)->rate()->where('users.id', \Auth::user()->id)->count();
        $book->load('us_comments');
        $url = Storage::url('public/files/' . $book->cover_file_name);
        $url_u = Storage::url('public/files/' );
        return view('book.show', ['book' => $book, 'cover_url' => $url , 'cover_url_u'=>$url_u, 'cnt'=>$count]);
    }


    public function edit(book $book)
    {
        return view('book.edit', ['book' => $book]);
        // book::update(["title" => $request->title, "author" => $request->author, "publication_year" => $request->puby, "description" => $request->des, "number" => $request->number]);
    }


    public function update(Request $request, book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'puby' => 'required|int|min:0|max:2022',
            'number' => 'required|int|min:0',
            'cover' => 'required|mimes:jpg,bmp,png|max:2048'
        ]);


        $coverfile = $request->file('cover');
        $coverfilename = $coverfile->getClientOriginalName();
        $extension = $coverfile->extension();
        $newcoverfilename = sha1(time() . '_' . rand(1000000000, 1999999999) . '_' . rand(1000000000, 1999999999) . '_' . $coverfilename);
        $newcoverfilename = $newcoverfilename . '.' . $extension;

        Storage::disk('local')->putFileAs(
            'public/files',
            $coverfile,
            $newcoverfilename
        );

        $book->update(["title" => $request->title, "author" => $request->author, "publication_year" => $request->puby, "description" => $request->des, "number" => $request->number, 'cover_file_name' => $newcoverfilename, 'original_cover_file_name' => $coverfilename]);
        $bks = Book::all();
        $url = Storage::url('public/files/' );
        return view('book.index', ['bks' => $bks, 'url'=>$url]);
        
    
    }

    public function destroy(book $book)
    {
        $book->delete();
        $bks = Book::all();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $books = book::query()->where('title', 'like', "%{$search}%")->get();
        return view('book.search', ['bks' => $books]);
    }

    public function NewRateBook(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|int|min:1|max:5',
        ]);

     
        $book=book::find($request->book_id);
        $book->update(["numberOfrate"=>$book->numberOfrate+1, "sumOfrate"=>$book->sumOfrate+$request->rating]);
        $user = \Auth::user();
        $book->rate()->attach($user->id, ['rate_num'=>$request->rating]);
        return redirect()->back();
       
    }
    

}
