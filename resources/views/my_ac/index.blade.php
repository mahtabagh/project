@extends('layouts.m')
@section('onvan','MyAccount')
@section('mohtava')
<style>
  .a {
    background-color: white;
    color: black;
    border: 2px solid black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }

  .a {
    background-color: whitesmoke;
    color: black;
  }
</style>

<br><br>
<center>
  
   @if($cover_url=='/storage/files/' )
   <img src="/image/1.png" class="rounded-circle" alt="" width="304" height="236">
   @else
   <img src={{$cover_url}} class="rounded-circle" alt="error" width="304" height="236">
   @endif
    
    <br><br><br>
    <a class="btn btn-xs btn-primary " href="{{route('edituser')}}" >edit profile</a>

    <br><br><br>
    <h2>{{$user->name}}</h2>
    <h2>{{$user->email}}</h2>
    <br><br>
    <a class="btn btn-xs btn-success" href="{{route('myfollowing')}}"> &nbsp کسانی که دنبال میکنید &nbsp </a>
    <a class="btn btn-xs btn-success" href="{{route('myfollowers')}}"> &nbspکسانی که شمارا دنبال میکنند &nbsp </a>
    <hr><br><br>

    <a class="btn btn-xs btn-info " href="{{route('showmybook')}}"> &nbsp کتاب خوانده شده&nbsp </a>
    <a class="btn btn-xs btn-dark " href="{{route('showmyNowbook')}}"> &nbsp کتاب های در حال خواندن&nbsp </a>
    <a class="btn btn-xs btn-warning " href="{{route('myborrowrequest')}}"> &nbsp درخواست ها &nbsp </a>
</center>

@endsection