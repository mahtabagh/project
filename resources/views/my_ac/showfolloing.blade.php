@extends('layouts.m')
@section('onvan','following')
@section('mohtava')

<center>
<br><br><br>
    <table class="table table-striped table-responsive-sm table-bordered table table-hover">
        <thead>
            <tr align="center">
                <th> </th>
                <th>ایمیل</th>
                <th>نام</th>
            </tr>
        </thead>

        @foreach ($user->follows as $uf)
        <tbody>
            <tr align="center">
                <td><a href="{{route('userpro',[$uf])}}"> پروفایل </a></td>

                <td>{{$uf->email}}</td>
                <td>{{$uf->name}} </td>

            </tr>
        </tbody>


        @endforeach
    </table>

  </center>
@endsection