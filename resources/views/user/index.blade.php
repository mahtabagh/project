@extends('layouts.m')
@section('onvan','users')
@section('mohtava')

<br><br>
<center>

<br>
<form class="example"  method="post" action="{{ route('SearchUser') }}" style="margin:auto;max-width:300px">
  <fieldset>
    @csrf
    <input name="search" type="text" placeholder="جست و جو" required/>
    <button><i class="fa fa-search"></i></button>
  </fieldset>
</form>

<br>
<br>

  <br>
  <table class="table table-striped table-responsive-sm table-bordered table table-hover">
    <thead>
      <tr align="center">
        <th> </th>
        <th>نوع عضویت</th>
        <th>ایمیل</th>
        <th>نام</th>
      </tr>
    </thead>

    @foreach ($u as $us)
    
    <tbody>
      <tr align="center">

        @if(@Auth::id() !== $us->id)
        <td><a class="btn btn-xs btn-primary" href="{{route('userpro',[$us])}}">  دیدن پروفایل </a></td>
        @else
        <td> </td>
        @endif

        @if($us->role=='u')
        <td>کاربر </td>
        @else
        <td>ادمین </td>
        @endif


        <td>{{$us->email}}</td>
        <td>{{$us->name}} </td>

      </tr>
    </tbody>

 
    @endforeach

  </table>
</center>
@endsection