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

    <form action="{{route('storebook')}}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 7px;" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <h1>
                <br> اضافه کردن کتاب جدبد
            </h1>
            <br><br>

            <div class="form-group">
                <label>نام کتاب</label>
                <input type="text" class="form-control" name="title" style="width: 50%;" require>
                <br><br>
                <label>نویسنده </label>
                <input type="text" class="form-control" name="author" style="width: 50%;" require>
                <br><br>
                <label>سال انتشار </label>
                <input type="text" class="form-control" name="puby" style="width: 50%;" require>
                <br><br>
                <label> تعداد کتاب ها </label>
                <input type="text" class="form-control" name="number"  style="width: 50%;" require>
                <br><br>
                <label>مختصر توضیح کتاب </label>
                <textarea cols="10" class="form-control" rows="3" name="des" style="width: 50%;" require></textarea>
                <br><br>
                <label>اپلود عکس </label>
                <input class="form-control" type="file" name="cover" id="cover" style="width: 50%;" require> 
                <br><br>
                <button> اضافه کردن</button>
            </div>
        </fieldset>
    </form>
   <br><br><br><br>
</center>


@endsection