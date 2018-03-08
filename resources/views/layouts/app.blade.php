<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ImagineBook.com</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

        <style type="text/css">
            .to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                
            }

            .to-top:hover{
                background: #d7d7d7;
                color: #000;
            }
        </style>

</head>
<body style="background-color: #2782b1;">
    <div id="app">
        <center><img src="https://pbs.twimg.com/media/DXmEgerU8AAPIJA.jpg" style="width: 100%;"></center>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                            <li>
                                    <form class="navbar-form" role="search" action="" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search"  name="search" style="width: 156%;" value="{{ isset($search) ? $search : '' }}">
                                            <div class="input-group-btn">
                                            </div>
                                        </div>
                                    </form>        
                            </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-registered"></i> Register</a></li>
                    </ul>
                        @else
                            
                            <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fas fa-cart-arrow-down"></i>
                                    Category <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Romance</a>
                                        <a href="#">Comedy</a>
                                        <a href="#">Action</a>
                                        <a href="#">Horror</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('product.shoppingCart') }}">
                                    <i class="fas fa-shopping-cart"></i> Shopping Cart
                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                </a>
                            </li>                       
                    <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fas fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('create') }}"><i class="fas fa-upload"></i> Tambah Data</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>   
                </div>
            </div>
        </nav>
        <div class="col">
        <a href="#top" class="to-top pull-right" id="scrollTop">
            <i class="fas fa-arrow-alt-circle-up fa-3x btn-warning" style="width: 50px; padding: 4px; height: 40px;"></i>
        </a>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                var offset = 250;
                var duration = 500;

                $(window).scroll(function(){
                    if($(this).scrollTop() > offset){
                        $('.to-top').fadeIn(duration);
                    }else{
                        $('.to-top').fadeOut(duration);
                    }
                });

                $('.to-top').click(function(){
                    $('body').animate({scrollTop: 0}, duration);
                });
            });
        </script>

        @yield('content')
    </div>
    <div id="container">
    <div id="footer">
        <nav class="nav navbar-default navbar-static-top">
        <center>Copyright &copy; 2018
        Designed by Rio Dewangga</center>
        </nav>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
