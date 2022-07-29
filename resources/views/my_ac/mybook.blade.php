@extends('layouts.m')
@section('onvan','book')
@section('mohtava')

<center>
<div class="mt-5" style=" background-color: whitesmoke;  width:70% ">
  @foreach ($mb as $m)
  <br>
    {{$m->title}}
<hr>

تاریخ قرض گرفتن
<br>
 {{ Verta::instance($m->pivot->user_borrowed_at);}}
 <br>
<br>
 تاریخ پس دادن
 <br>
 {{ Verta::instance($m->pivot->user_refundes_at);}}


  <hr>
  @endforeach
  </div>
</center>
@endsection