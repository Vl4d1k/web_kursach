<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Интернет Магазин: @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    
    <!--<link href="/kursach/public/css/bootstrap.css" rel="stylesheet">-->

    <!--For SLider-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="/kursach/public/css/started.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('index') }}">Интернет Магазин</a>
            </div>
            <!--Сделать кнопку для открытия меню в мобильной версии-->
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li @routeactive('index')><a href="{{ route('index') }}">Все товары</a></li>
                    <li @routeactive('categor*')><a href="{{ route('categories') }}">Категории</a>
                    </li>
                    <li @routeactive('basket*')><a href="{{ route('basket') }}">В корзину</a></li>
                    <li @routeactive('contact-place')><a href="{{ route('contact-place') }}">Обратная связь</a></li>
                    <li @routeactive('about*') class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">О нас<span class="caret"></span></a>
                         <ul class="dropdown-menu" role="menu">
                         <li ><a href="{{route('map')}}" >Схема проезда</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('links')}}" >Контакты</a></li>
                            <li class="divider"></li>
                            <li><a href="{{route('history')}}" >История компании</a></li>
                         </ul>
                     </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-user"></span> Войти</a></li>
                        <li><a style="display:none" href="{{route('get-logout')}}"><span class="glyphicon glyphicon-log-in"></span> Выйти</a></li>
                    @endguest

                    @auth
                        @if(Auth::user()->isAdmin())
                            <li><a href="{{route('home')}}">Панель администратора</a></li>
                        @else       
                            <li><a href="{{route('orders.index')}}">Мои заказы</a></li>
                        @endif
                        <li><a href="{{route('get-logout')}}"><span class="glyphicon glyphicon-log-in"></span> Выйти</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="starter-template">
            @if(session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success') }}</p>
            @endif
            @if(session()->has('warning'))
                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
            @endif
                @yield('content')
        </div>
    </div>
</body>

</html>