<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('onvan')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <script src="/js/jquery.min.js">
    </script>
    <script src="/js/popper.min.js">
    </script>
    <script src="/js/bootstrap.min.js">
    </script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
    body {
        font-family: Arial;

    }

    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.example button:hover {
        background: #0b7dda;
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
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

    body {
        margin: 0;
        font-family: "Lato", sans-serif;
    }

    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #e9ecef;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: #262a2e;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .sidebar a {
            float: left;
        }

        div.content {
            margin-left: 0;
        }
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>
</head>

<body>

    <body>
        <style>
            @font-face {
                font-family: 'byekan';
                src: url('../fonts/BYekan.eot');
                src: url('..//fonts/BYekan.woff') format('woff');
                font-weight: normal;
                font-style: normal;
            }

            body {
                font-family: "byekan";
            }
        </style>

        <div class="fixed-top">

            <div class="jumbotron text-center" style="margin-bottom:0; height: 4cm;">
                <center>
                    <h1>کتابخانه جوانان</h1>
                    <br>
                </center>
            </div>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto ">



                        <li>
                            @yield('h')

                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{route('welcom')}}"> welcom</a>

                        </li>

                    </ul>
                </div>
            </nav>
        </div>

        <div class="ml-auto" style="margin-top: 5.5cm;">
            <div class="sidebar">
                <center>
                    <a href="{{ route('bookindex')}}"> کتاب ها</a>
                    <a href="{{ route('userindex')}}">کاربران</a>
                    <a href="{{ route('myaccountindex')}}">حساب کاربری من</a>
                    @if(@Auth::user()->role == 'a')
                    <a href="{{route('borrowindex')}}">درخواست ها</a>
                    @endif

                </center>
            </div>

            <div class="content">
                @yield('mohtava')
            </div>

        </div>

    </body>

</html>