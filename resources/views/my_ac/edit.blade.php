@extends('layouts.m')
@section('onvan','editMyAccont')
@section('mohtava')

<br>
<center>

    <form action="{{route('updateuser')}}" method="post" style="background-color: rgb(236, 236, 236); border-radius: 7px;" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <h1>
                <br>
            </h1>
            <br><br>

            <div class="form-group">
                <label>نام</label>
                <input type="text" class="form-control" name="name" required value="{{Auth::user()->name}}" style="width: 50%;">
                <br><br>
                
                <label> اپلود عکس شما </label>
                <input class="form-control" type="file" name="cover" id="cover" style="width: 50%;"> 
                <br><br>
                <button> ثبت ویرایش</button>
            </div>
        </fieldset>
    </form>

</center>


@endsection