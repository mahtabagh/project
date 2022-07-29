@extends('layouts.m')
@section('onvan','requests')
@section('mohtava')

<center>
  <br><br>
  @foreach ($requ as $r)
  @foreach ($r->req as $b)
  
  @if($b->pivot->answer == 0 || $b->pivot->answer == 2)

  <div style="background-color: whitesmoke;  width:70% "> <br>

    <p> {{$r->email}} </p>

    @if($b->pivot->answer == 0)

    <p> درخواست امانت دارد برای کتاب</p>

    {{$b->title}}<br><br>

    <a href="{{route('borrowaccept',[$b->pivot->id , $b , $r])}}"> تایید درخواست</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <a href="{{route('borrowreject',[$b->pivot->id , $b , $r])}}">رد درخواست</a> <br><br>
    @endif

    @if($b->pivot->answer == 2)

    <p> درخواست برگردادن دارد برای کتاب</p>

    {{$b->title}}<br><br>

    <a href="{{route('backBookaccept',[$b->pivot->id , $b , $r])}}"> تایید درخواست</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <a href="{{route('backBookreject',[$b->pivot->id , $b , $r])}}">رد درخواست</a> <br><br>
    @endif

  </div>
  <hr>
  @endif

  @endforeach
  @endforeach

</center>
@endsection