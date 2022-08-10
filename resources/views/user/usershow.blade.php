@extends('layouts.m')
@section('onvan','usershow')
@section('mohtava')

<br><br>
<center>
  @if($cover_url=='/storage/files/' )
  <img src="/image/1.png" class="rounded-circle" alt="" width="304" height="236">
  @else
  <img src={{$cover_url}} class="rounded-circle" alt="error" width="304" height="236">
  @endif
  <br><br><br>
  <h2>{{$user->name}}</h2>
  <h2>{{$user->email}}</h2>
  <br><br>

  @if($count == 0)
  <a class="btn btn-xs btn-success" href="{{ route('userfollow',[$user]) }}"> &nbsp&nbsp&nbsp Follow &nbsp&nbsp&nbsp </a>
  @else
  <a class="btn btn-xs btn-danger" href="{{ route('userunfollow',[$user]) }}"> &nbsp&nbsp&nbsp UnFollow &nbsp&nbsp&nbsp </a>
  <br><br>
  <p>(شما این کاربر را دنبال میکنید)</p>
  @endif
  <br><br><br><br>


  @if(@Auth::user()->role == 'a')
  <a onclick="return confirm('از حذف این نظر مطمین هستید؟')" href="{{ route('destroyUser',[$user]) }}"> حذف این کاربر </a>
  @endif

  <br><br>
  <hr>
  <br><br>

</center>
<div class="row row-cols-1 row-cols-md-3">
  @foreach ($books as $book)

  @if($book->pivot->answer != 0)
  <div class="col mb-4">
    <div class="card">
      <center>
        <img style="width: 200px !important;" src={{$url2.$book->cover_file_name}} class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title ">{{$book->title}}</h5>
          <p class="card-text "> {{ Verta::instance($book->pivot->user_borrowed_at);}}</p>
          @if($book->pivot->answer==3)
          <p class="card-text "> {{ Verta::instance($book->pivot->user_refunds_at);}}</p>
          <p>وضعیت : خوانده شده</p>
          @else
          <p class="card-text "> ---</p>
          <p>وضعیت : در حال خواندن</p>
          @endif
          <a class="center btn btn-xs btn-info " href="{{ route('showbook',[$book]) }} ">مشاهده کتاب</a>
        </div>
      </center>
    </div>
  </div>
  @endif
  @endforeach
  <br><br><br><br>

  @endsection