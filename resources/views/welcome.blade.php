<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


<style>
  body{
    background-color: whitesmoke;
  }
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

</head>

<body class="antialiased">

  <center>
    @if (Route::has('login'))
    <div class="">
      <br><br>
      @auth
      <a class="a" href="{{ url('/dashboard') }}">Dashboard</a>
      @else
      <a class="a" href="{{ route('login') }}">Log in</a>

      @if (Route::has('register'))
      <a class="a" href="{{ route('register') }}">Register</a>
      @endif
      @endauth

      @endif


    </div>

    <br>
    <hr>
    <br><br><br>
    <img src="/image/2.jpg" class="rounded-circle" alt="" width="304" height="236">
    <br><br>
    <h4>(وارد حساب کاربری خود شده و برروی لینک زیر کلیک کنید)</h4>
    <br>
    <h4><a class="a" href="{{ route('home')}}"> &nbsp&nbspورود&nbsp&nbsp</a></h4>

  </center>





</body>

</html>