<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('auth.auth'): @yield('title')</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">
                @lang('auth.back')
            </a>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav"
                @if(Auth::user() !== null)
                    @if(Auth::user()->isAdmin())
                        style=""
                    @else
                        style="display:none"
                    @endif
                @else 
                style="display:none"
                @endif
                >
                <li> <a href="{{route('categories.index')}}">Категории</a></li>
                    <li><a href="{{ route('products.index') }}">Товары</a>
                    </li>
                    <li ><a href="{{route('home')}}">Заказы</a></li>
                    <li ><a href="{{route('messages')}}">Обращения</a></li>
                </ul>

                @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> @lang('auth.login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('auth.register')</a>
                    </li>
                </ul>
                @endguest

                @auth
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">

                    </li>
                    <li class="nav-item">
                        <li><a href="{{route('get-logout')}}"><span class="glyphicon glyphicon-log-user"></span> @lang('auth.logout')</a></li>
                        @csrf
                    </li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"></div>
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>