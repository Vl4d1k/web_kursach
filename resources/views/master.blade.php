<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@lang('main.online_shop'): @yield('title')</title>
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link href="/kursach/public/css/started.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('index') }}">@lang('main.online_shop')</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
          <li @routeactive('categor*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
          </li>
          <li @routeactive('basket*')><a href="{{ route('basket') }}">@lang('main.cart')</a></li>
          <li @routeactive('contact-place')><a href="{{ route('contact-place') }}">@lang('main.feedback')</a></li>
          <li @routeactive('about*') class="dropdown">
            <a href="#" @routeactive('about*') class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">@lang('main.about')<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{route('map')}}">@lang('main.map')</a></li>
              <li class="divider"></li>
              <li><a href="{{route('links')}}">@lang('main.contacts')</a></li>
              <li class="divider"></li>
              <li><a href="{{route('history')}}">@lang('main.history')</a></li>
            </ul>
          </li>
          <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @guest
          <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-user"></span> @lang('main.login')</a></li>
          <li><a style="display:none" href="{{route('get-logout')}}"><span class="glyphicon glyphicon-log-in"></span> @lang('main.logout')</a></li>
          @endguest

          @auth
          @if(Auth::user()->isAdmin())
          <li><a href="{{route('home')}}">@lang('main.admin_panel')</a></li>
          @else
          <li><a href="{{route('orders.index')}}">@lang('main.my_orders')</a></li>
          @endif
          <li><a href="{{route('get-logout')}}"><span class="glyphicon glyphicon-log-in"></span> @lang('main.logout')</a></li>
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
