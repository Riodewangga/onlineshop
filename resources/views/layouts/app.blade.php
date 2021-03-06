<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ImagineBook.com</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <style type="text/css">
        .user-header{
            padding: 30px;
            padding-right: 70px;
            padding-left: 70px;
            background-color: black;
        }

        .user-header p {
            color: white;
            font-size: 18px;
            text-align: center;
        }

        .img-circle {
            border: 2px white solid;
        }
    </style>


</head>
<body>
    <div id="app">
        <center><img src="{{ asset('storage/header/header.jpg') }}" style="width: 100%;"></center>
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
                    <ul class="nav navbar-nav navbar-left" >
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fas fa-search fa-1x"></i></button>
                                </a>

                            <ul class="dropdown-menu" style="width: 300px;">
                                <li>
                                        <form class="navbar-form" role="search" action="" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search"  name="search" style="width: 100%;" value="{{ isset($search) ? $search : '' }}">
                                            </div>
                                        </form>        
                                </li>
                        </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right"  style="float: left; display: inline-block;">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-registered"></i> Register</a></li>
                    </ul>
                        @else
                            
                            <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <ul class="nav navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fas fa-caret-square-down"></i>
                                    Categori 
                                </a>

                                @php 
                                    $category = \App\Category::orderBy('name', 'asc')->get();
                                @endphp

                                <ul class="dropdown-menu">
                                    @foreach( $category as $cat )
                                        <li><a href="{{ route('product.show-by-category',$cat->id) }}"> {{ ucfirst($cat->name) }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul> 
                            <li>
                                <a href="{{ route('product.shoppingCart') }}">
                                    <i class="fas fa-shopping-cart"></i> Shopping Cart
                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                </a>
                            </li>                       
                    <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><img class="img-circle" src="{{ asset('storage/'.auth()->user()->avatar) }}" style="height: 25px; width: 25px;">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <a href="{{ route('user.edit') }}" style="background-color: black;">
                                            <img src="{{ asset('storage/'.auth()->user()->avatar) }}" class="img-circle avatar" style="height: 150px; width: 150px;">
                                            <p>{{ Auth::user()->name }}</p>
                                        </a>
                                    </li>
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
        
        @yield('content')
    </div>
    <div id="container">
    <div id="footer">
        <nav class="nav navbar-default navbar-fixed-bottom">
        <center>Copyright &copy; 2018
        Designed by Rio Dewangga</center>
        </nav>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
