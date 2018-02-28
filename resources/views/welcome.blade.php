<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NovelShop.com</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: rgb(222, 218, 75);
                color: gray;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            img {
                max-height: 200px; 
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 50px;
                top: 5%;
                text-align: right;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-color: white;
            }

            .links > a {
                color: gray;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/index') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <center><img src="https://images.pottermore.com/bxd3o8b291gf/2jrSxh9R6IUOwgMKEk00Su/05289da72c3cde29287bb3d22e27d609/wizarding-world-book-club-logo-small.png" style="max-height: 400px;"></center>
            </div>
        </div>
    </body>
</html>
