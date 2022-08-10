  @extends('layouts.m')
  @section('onvan','home')
  @section('mohtava')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  <style>
      .cardn {

          width: 24rem;
          height: 36rem;
          border-radius: 10px;
          overflow: hidden;
          padding: 70px;
          position: relative;
          color: black;
          box-shadow: 0 10px 30px 5px rgba(0, 0, 0, 0.2);

      }

      main {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          padding: 50px;
          font-family: "Roboto", sans-serif;
      }

      .card {
          width: 24rem;
          height: 36rem;
          border-radius: 10px;
          overflow: hidden;
          cursor: pointer;
          position: relative;
          color: #f0f0f0;
          box-shadow: 0 10px 30px 5px rgba(0, 0, 0, 0.2);
      }

      .card img {
          position: absolute;
          object-fit: cover;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          opacity: 0.9;
          transition: opacity 0.2s ease-out;
      }

      .card h2 {
          position: absolute;
          inset: auto auto 30px 30px;
          margin: 0;
          transition: inset 0.3s 0.3s ease-out;
          font-family: "Roboto Condensed", sans-serif;
          font-weight: normal;
          text-transform: uppercase;
      }

      .card p,
      .card a {
          position: absolute;
          opacity: 0;
          max-width: 80%;
          transition: opacity 0.3s ease-out;
      }

      .card p {
          inset: auto auto 80px 30px;
      }

      .card a {
          inset: auto auto 40px 30px;
          color: inherit;
          text-decoration: none;
      }

      .card:hover h2 {
          inset: auto auto 220px 30px;
          transition: inset 0.3s ease-out;
      }

      .card:hover p,
      .card:hover a {
          opacity: 1;
          transition: opacity 0.5s 0.1s ease-in;
      }

      .card:hover img {
          transition: opacity 0.3s ease-in;
          opacity: 1;
      }

      .material-symbols-outlined {
          vertical-align: middle;
      }



      .material-symbols-outlined {
          vertical-align: middle;
      }
  </style>

  @foreach ($users as $u)
  @foreach ($u->req as $ur)

  @if($ur->pivot->answer != 0)
  <center>
      <main>
          <div class="row">
              <div class="cardn">


                  @if($url.$u->cover_file_name =='/storage/files/' )
                  <img src="/image/1.png" class="rounded-circle" alt="" width="100" height="100">
                  @else
                  <img class="rounded-circle" alt="error" width="100" height="100" src={{$url.$u->cover_file_name}}>
                  @endif
                  <p>{{$u->name}}</p>
                  <p>{{$u->email}}</p>
                  <p>
                      وضعیت:
                      @if($ur->pivot->answer == 1 || $ur->pivot->answer == 2)
                      در حال خواندن
                      @else
                      خوانده شده
                      @endif

                  </p>

                  <a class="btn btn-xs btn-info " href="{{route('userpro',[$u])}}"> مشاهده کاربر</a>
              </div>
              <div class="card">

                  <img src={{$url.$ur->cover_file_name}} alt="">
                  <div class="card-content">
                      <h2 class="text-dark">
                          {{$ur->title}}
                      </h2>

                      <a href="{{ route('showbook',[$ur]) }}" class="button text-dark">
                          مشاهده کتاب
                          <span class="material-symbols-outlined">
                              arrow_right_alt
                          </span>
                      </a>
                  </div>
              </div>
          </div>
      </main>
      <hr>
  </center>
  @endif
  @endforeach
  @endforeach

  @endsection