@extends('layouts.m')
@section('onvan','following')
@section('mohtava')

<center>
    <br><br><br>
    <table class="table table-striped table-responsive-sm table-bordered table table-hover">
        <thead>
            <tr align="center">
                <th> </th>

                <th>نوع درخواست </th>
                <th> کتاب</th>
            </tr>
        </thead>
        
        @foreach ($mb1->req as $m)
       
        @if($m->pivot->answer == 0 || $m->pivot->answer==2 )
        <tbody>
            <tr align="center">
                @if($m->pivot->answer==0 )
                <td><a class="btn btn-xs btn-danger" href="{{ route('DelBorrowReq',[ $m->pivot->id , $m]) }}" onclick="return confirm('از لغو درخواست خود مطمِن هستید؟')">لغو درخواست</a></td>
                <td> امانت گرفتن</td>
                @endif

                @if($m->pivot->answer==2 )
                <td><a class="btn btn-xs btn-danger" href="{{ route('DelRefudsReq',[$m, $m->pivot->id]) }}" onclick="return confirm('از لغو درخواست خود مطمِن هستید؟')">لغو درخواست</a></td>
                <td> پس دادن</td>
                @endif

                <td>{{$m->title}}</td>


                
            </tr>
        </tbody>
        @endif
        @endforeach





    </table>

</center>
@endsection