@extends('layouts.m')
@section('onvan','addbook')
@section('mohtava')

<br>
<center>

    @if ($errors->any())

    @foreach ($errors->all() as $error)
    <li style="color:#E74C3C">{{ $error }}</li>
    @endforeach

    @endif

    <form action="{{route('updatebook')}}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 7px;" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <h1>
                <br>
            </h1>
            <br><br>

            <div class="form-group">
                <label>نام کتاب</label>
                <input type="text" class="form-control" name="title" required value="{{$book->title}}" style="width: 50%;">
                <br><br>
                <label>نویسنده </label>
                <input type="text" class="form-control" name="author" required value="{{$book->author}}" style="width: 50%;">
                <br><br>
                <label>سال انتشار </label>
                <input type="text" class="form-control" name="puby" required value="{{$book->publication_year}}" style="width: 50%;">
                <br><br>
                <label>تعداد کتاب ها </label>
                <input type="text" class="form-control" name="number" required value="{{$book->number}}" style="width: 50%;">
                <br><br>
                <label>مختصر توضیح کتاب </label>
                <textarea cols="30" class="form-control" rows="10" name="des" style="width: 50%;"> {{$book->description}}</textarea>
                <br><br>
                <label>اپلود عکس </label>
                <input class="form-control" type="file" name="cover" id="cover" value=" {{$book->cover_file_name}}" style="width: 50%;"> 
                <br><br>
                
                <input type="hide" name="bookid" value={{$book->id}}>
                
                <button> ثبت ویرایش</button>
            </div>
        </fieldset>
    </form>

</center>


@endsection