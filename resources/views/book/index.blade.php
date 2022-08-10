@extends('layouts.m')
@section('onvan','book')
@section('h')
@if(@Auth::user()->role == 'a')
<a class="nav-link " href="{{ route('addbook') }} ">اضافه کردن کتاب</a>
@endif

@endsection
@section('mohtava')

<br><br><br>
<form class="example" action="{{ route('SearchBook') }}" method="post" style="margin:auto;max-width:300px">
  <fieldset>
    @csrf
    <input name="search" type="text" placeholder="جست و جو" required />
    <button><i class="fa fa-search"></i></button>
  </fieldset>
</form>
<br>


@foreach ($bks as $b)
<center>

  <div class="card" style="width: 50rem;">
    <img class="rounded mx-auto d-block card-img-top" src="{{$url.$b->cover_file_name}}" alt="Card image cap" style="height: 20%; width: 20%;">
    <div class="card-body">
      <h5 class="card-title">{{$b->title}}</h5>

      <br>
      @if(@Auth::user()->role == 'a')
      <a class="btn btn-xs btn-danger " href="{{ route('delbook',[$b]) }}" onclick="return confirm('از حذف این کتاب مطمین هستید؟')">حذف کتاب</a>
      @endif
      
      <a class="btn btn-xs btn-info " href="{{ route('showbook',[$b]) }} "> ادامه مطلب</a>

      @if(@Auth::user()->role == 'a')
      <a class="btn btn-xs btn-primary " href="{{ route('editbook',[$b]) }} "> ویرایش</a>
      @endif
      <br> <br>

    </div>
  </div>
<br><br>

</center>
@endforeach

@endsection