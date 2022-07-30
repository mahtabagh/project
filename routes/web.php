<?php

use app\models\book;
use app\models\comment;
use App\Http\Controllers\bookcontroller;
use App\Http\Controllers\commentcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\borrowcontroller;


Route::get('/', function () {
    return view('welcome');
})->name('welcom');
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users/index', function () {
    return view('user.index');
})->middleware(['auth'])->name('userindex');

Route::get('/books/add', function () {
    return view('book.add');
})->middleware(['auth'])->name('addbook');

Route::post('/books/index/search', [bookcontroller::class, 'search'])->middleware(['auth'])->name('SearchBook');
Route::get('/books/index', [bookcontroller::class, 'index'])->middleware(['auth'])->name('bookindex');
Route::get('/books/show/{book}', [bookcontroller::class, 'show'])->middleware(['auth'])->name('showbook');
Route::post('/books/show/rate', [bookcontroller::class, 'NewRateBook'])->middleware(['auth'])->name('NewRateBook');



Route::post('/comments/add', [commentcontroller::class,'store'])->middleware(['auth'])->name('storecomm');

Route::get('/users/index', [usercontroller::class, 'index'])->middleware(['auth'])->name('userindex');
Route::get('/follows/profile/{user}', [usercontroller::class,'profile'])->middleware(['auth'])->name('userpro');
Route::get('/follows/follow/{user}', [usercontroller::class,'follow'])->middleware(['auth'])->name('userfollow');
Route::get('/follows/unfollow/{user}', [usercontroller::class,'unfollow'])->middleware(['auth'])->name('userunfollow');
Route::post('/users/index/search', [usercontroller::class, 'search'])->middleware(['auth'])->name('SearchUser');
Route::get('/myaccount/index', [usercontroller::class,'my_index'])->middleware(['auth'])->name('myaccountindex');
Route::get('/myfollowing/following', [usercontroller::class,'my_following'])->middleware(['auth'])->name('myfollowing');
Route::get('/myfollowers/followers', [usercontroller::class,'my_followers'])->middleware(['auth'])->name('myfollowers');




Route::get('/borrow/book/{book}', [borrowcontroller::class,'store'])->middleware(['auth'])->name('storeborrow');
Route::get('/borrowindex/book', [borrowcontroller::class,'borrowindex'])->middleware(['auth'])->name('borrowindex');
Route::get('/mybook/book', [borrowcontroller::class,'showmybook'])->middleware(['auth'])->name('showmybook');
Route::get('/myNowbook/book', [borrowcontroller::class,'showmyNowbook'])->middleware(['auth'])->name('showmyNowbook');
Route::get('/myborrowrequest/book', [borrowcontroller::class,'myborrowrequest'])->middleware(['auth'])->name('myborrowrequest');
Route::get('/returnRequest /book/{id}/{book_id}', [borrowcontroller::class,'returnRequest'])->middleware(['auth'])->name('returnRequest');
Route::get('/borrow/destroy/request/{id}/{book}', [borrowcontroller::class,'DelBorrowReq'])->middleware(['auth'])->name('DelBorrowReq');
Route::get('/borrow/back/destroy/request/{book}/{id}', [borrowcontroller::class,'DelRefudsReq'])->middleware(['auth'])->name('DelRefudsReq');



Route::get('/user/edit', [usercontroller::class, 'edit'])->middleware(['auth'])->name('edituser');
Route::post('/user/update', [usercontroller::class, 'update'])->middleware(['auth'])->name('updateuser');


Route::middleware(['admin'])->group(function(){

    Route::get('/borrowreject/borrow/{id}/{book}/{user}', [borrowcontroller::class,'destroy'])->middleware(['auth'])->name('borrowreject');
    Route::get('/borrowaccept/borrow/{id}/{book}/{user}', [borrowcontroller::class,'accept'])->middleware(['auth'])->name('borrowaccept');
    Route::get('/backBookaccept/borrow/{id}/{book}/{user}', [borrowcontroller::class,'backBookaccept'])->middleware(['auth'])->name('backBookaccept');
    
    Route::get('/backBookreject/borrow/{id}/{book}/{user}', [borrowcontroller::class,'backBookreject'])->middleware(['auth'])->name('backBookreject');
    Route::get('/user/delete/{user}', [usercontroller::class,'destroy'])->middleware(['auth'])->name('destroyUser');
    Route::post('/books/add', [bookcontroller::class, 'store'])->middleware(['auth'])->name('storebook');
    Route::get('/books/delete/{book}', [bookcontroller::class, 'destroy'])->middleware(['auth'])->name('delbook');
    Route::get('/books/edit/{book}', [bookcontroller::class, 'edit'])->middleware(['auth'])->name('editbook');
    Route::post('/books/update', [bookcontroller::class, 'update'])->middleware(['auth'])->name('updatebook');
    Route::get('/comments/delete/{c}/{b}', [commentcontroller::class,'destroy'])->middleware(['auth'])->name('delcomm');
});

require __DIR__ . '/auth.php';
