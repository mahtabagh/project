<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class usercontroller extends Controller
{
   
    public function index()
    {
        $u = user::all();
        return view('user.index', ['u' => $u]);
    }

    public function profile(user $user)
    {
        $url = Storage::url('public/files/' . $user->cover_file_name);
       
        $count = \Auth::user()->follows()->where('users.id', $user->id)->count();
        $books=$user->req()->where('answer',3 )->get();

        $url2 = Storage::url('public/files/' );
        return view('user.usershow', ['user' => $user ,'count' => $count , 'books' => $books,'cover_url' => $url,'url2' => $url2]);
    }

    public function follow(user $user)
    {
        $u = User::find(\Auth::id());
        $u->follows()->attach($user->id);
        return redirect()->back();
    }

    public function unfollow(user $user)
    {
        $u = User::find(\Auth::id());
        $u->follows()->detach($user->id);
        return redirect()->back();
    }

    public function  my_index()
    {
        $url = Storage::url('public/files/' . \Auth::user()->cover_file_name);
        return view('my_ac.index', ['user' =>\Auth::user(),'cover_url' => $url]);
    }
    
    public function  my_following()
    {
        $u = \Auth::user();
        $u->load('follows');
        return view('my_ac.showfolloing', ['user' => $u]);
    }

    public function  my_followers()
    {
        $u = \Auth::user();
        $u->load('follow_me');
        return view('my_ac.showfollowers', ['user' => $u]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = user::query()->where('email', 'like', "%{$search}%")->get();
        return view('user.search', ['users' => $users]);
    }
   
    public function destroy(user $user)
    {
        $user->delete();
        $u = user::all();
        return view('user.index', ['u' => $u]);
        
    }

    public function edit()
    {
        return view('my_ac.edit');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
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
        $user = \Auth::user();
        $user->update(["name" => $request->name, 'cover_file_name' => $newcoverfilename, 'original_cover_file_name' => $coverfilename]);
        $url = Storage::url('public/files/' . \Auth::user()->cover_file_name);
        return view('my_ac.index', ['user' =>\Auth::user(),'cover_url' => $url]);
    }
}
