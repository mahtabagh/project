
@extends('layouts.m')
@section('onvan','search')
@section('h')
@if(@Auth::user()->role == 'a')
<a class="nav-link " href="{{ route('addbook') }} ">اضافه کردن کتاب</a>
@endif

@endsection
@section('mohtava')

<br>
<a class="a" href="{{ route('bookindex') }}">بازگشت</a>
<br><br>
@foreach ($bks as $b)
<center>
  <br>
  <div style=" background-color:whitesmoke;">
    <br>
    <h2> {{$b->title}} </h2>

    <br>
    @if(@Auth::user()->role == 'a')
    <a href="{{ route('delbook',[$b]) }}" onclick="return confirm('از حذف این کتاب مطمین هستید؟')">حذف کتاب</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    @endif
    <a href="{{ route('showbook',[$b]) }} "> ادامه مطلب</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    @if(@Auth::user()->role == 'a')
    <a href="{{ route('editbook',[$b]) }} "> ویرایش</a>
    @endif
    <br> <br>

  </div>

</center>
@endforeach

@endsection