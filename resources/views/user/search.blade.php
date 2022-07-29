@extends('layouts.m')
@section('onvan','usersSearch')
@section('mohtava')

<br><br>


<a class="a" href="{{ route('userindex') }}">بازگشت</a>
<br><br>
<center>
  <table class="table table-striped table-responsive-sm table-bordered table table-hover">
    <thead>
      <tr align="center">
        <th> </th>
        <th>نوع عضویت</th>
        <th>ایمیل</th>
        <th>نام</th>
      </tr>
    </thead>

    @foreach ($users as $us)
    @if($us->role=='u')
    <tbody>
      <tr align="center">

        @if(@Auth::id() !== $us->id)
        <td><a href="{{route('userpro',[$us])}}"> پروفایل </a></td>
        @else
        <td> </td>
        @endif

        <td>کاربر </td>

        <td>{{$us->email}}</td>
        <td>{{$us->name}} </td>

      </tr>
    </tbody>

    @endif
    @endforeach

  </table>
</center>
@endsection