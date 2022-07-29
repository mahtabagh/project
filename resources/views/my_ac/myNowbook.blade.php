@extends('layouts.m')
@section('onvan','book')
@section('mohtava')

<center>
<div class="mt-5" style=" background-color: whitesmoke;  width:70% ">
  @foreach ($mb as $m)
  <br>

    <span m-5>{{$m->title}}</span>
    <br><br>
    
    <a href="{{route('returnRequest',[$m->pivot->id , $m->id])}}"> &nbsp پس دادن کتاب &nbsp </a>

  <hr>
  @endforeach
  </div>

</center>
@endsection