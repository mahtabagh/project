@extends('layouts.m')
@section('onvan','showbook')
@section('mohtava')

<style>
  .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
  }

  .rating>input {
    display: none;
  }

  .rating>label {
    position: relative;
    width: 1em;
    font-size: 3vw;
    color: #FFD600;
    cursor: pointer;
  }

  .rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0;
  }

  .rating>label:hover:before,
  .rating>label:hover~label:before {
    opacity: 1 !important;
  }

  .rating>input:checked~label:before {
    opacity: 1;
  }

  .rating:hover>input:checked~label:before {
    opacity: 0.4;
  }

  .a {
    background-color: white;
    color: black;
    border: 2px solid black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }

  .a {
    background-color: whitesmoke;
    color: black;
  }
</style>

<center>

  <br><br>
  <div style="background-color: whitesmoke; border-radius: 200px">
    <br><br>
    <img src={{$cover_url}} class="img-thumbnail" alt="error" width="304" height="236">
    <br><br>
    <h3> عنوان کتاب :{{$book->title}}</h2>
      <br>
      <h5> نویسنده :{{$book->author}}</h4>
        <br>
        <h5> {{$book->publication_year}}: سال انتشار </h4>
          <br>
          <h5>
            @if($book->number == 0)
            در دسترس : خیر
            @else
            در دسترس : بله
            @endif
          </h5>
          <br>

          <h5>خلاصه :{{$book->description}}</h5>
          <br><br>
          <h5>
            تاریخ ثبت
            <br><br>
            {{Verta::instance($book->created_at);}}

          </h5>
          <br><br>
          @if($book->number != 0)
          <a class="btn btn-primary" href="{{route('storeborrow',[$book])}}"> درخواست برای امانت گرفتن کتاب</a>
          @else
          <a href="#" class="btn btn-outline-secondary disabled ">درخواست برای امانت گرفتن کتاب</a>
          @endif

          <br><br><br>

          <form style="width: 50%;" action="{{route('NewRateBook')}}" method="post">
            <fieldset >
              @csrf
              <div class="rating">

                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                <input type="hide" name="book_id" value={{$book->id}}>

              </div>
              @if($cnt !=0)
              
              <p class="text-danger">شما امتیاز خود را ثبت کرده اید</p>
              @else
              <button class="btn">
                ثبت امتیاز
              </button>

              @endif
            </fieldset>
          </form>

          @if($book->sumOfrate==0)
          <h5 class="mt-5">میانگین امتیاز : 0</h5>
          @else
          <h5 class="mt-5">میانگین امتیاز : {{$book->sumOfrate/$book->numberOfrate}}</h5>
          @endif
          <br><br>
          <a href="{{ route('bookindex') }}"> بازگشت</a>
          <br><br>
  </div>
  <br><br>
</center>
<hr>
<h3 style="text-align:center;"> : نظرات</h3>

@foreach ($book->us_comments as $c)

<br>
<div class="media border p-3" style="background-color:whitesmoke;">

  @if(@Auth::user()->role == 'a')

  <a href="{{ route('delcomm',[$c->pivot->id , $book->id]) }}" onclick="return confirm('از حذف این نظر مطمین هستید؟')"> حذف نظر</a>

  @endif

  <div class="media-body">
    <h6 style="text-align:right;">{{$c->email}}</h6>
    <P style="text-align:right;"> {{$c->pivot->description}}</P>
    <br>
    <p style="text-align:right;" class="mr-3">{{Verta::instance($c->created_at);}}</p>
  </div>
 
  <br>


  @if($cover_url_u.$c->cover_file_name =='/storage/files/' )
   <img src="/image/1.png" class="rounded-circle" alt="" width="100" height="100">
   @else
   <img  class="rounded-circle" alt="error" width="100" height="100" src={{$cover_url_u.$c->cover_file_name}}>
   @endif

</div>
@endforeach

<center>
  <br><br>
  <form action="{{route('storecomm')}}" method="post">
    @csrf

    <fieldset>
      <input type="hidden" value="{{$book->id}}" name="book_id">
      <textarea cols="30" class="form-control" rows="10" name="des" style="width: 50%;" placeholder="نظر خود را اینجا بنویسید"></textarea>
      <br><br><br>
      <button> ثبت نظر </button>
    </fieldset>
  </form>
  <br><br><br>
</center>
@endsection