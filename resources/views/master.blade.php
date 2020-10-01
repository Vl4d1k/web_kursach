<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>@yield('title')</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="/kursach/public/css/bootstrap.min.css" />

  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="/kursach/public/css/slick.css" />
  <link type="text/css" rel="stylesheet" href="/kursach/public/css/slick-theme.css" />

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="/kursach/public/css/nouislider.min.css" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="/kursach/public/css/icons.css">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="/kursach/public/css/style.css" />

  <script src="/kursach/resources/js/jquery.min.js"></script>

</head>

<body>
  <header>
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-left">
          <li><a href="#"><i class="fa fa-phone"></i> +7 978 51-84</a></li>
          <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
        </ul>
        <ul class="header-links pull-right">
          <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
        </ul>
      </div>
    </div>

    <div id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="header-logo">
              <a href="{{route('index')}}" class="logo">
                <img src="/kursach/public/images/site_elems/logo.png" alt="">
              </a>
            </div>
          </div>

          <div class="col-md-6">
            <div class="header-search">
              <form>
                <select class="input-select">
                  <option value="0">Все категории</option>
                </select>
                <input class="input" placeholder="Search here">
                <button class="search-btn">Поиск</button>
              </form>
            </div>
          </div>

          <div class="col-md-3 clearfix">
            <div class="header-ctn">
              <div class="dropdown">
                @if(isset($wishList))
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-heart-o"></i>
                    <span>Избранное</span>
                  <div class="qty">{{count($wishList->products)}}</div>
                  </a>
                  <div class="cart-dropdown">
                    <div class="cart-list">
                      @foreach($wishList->products as $wish)
                        <div class="product-widget">
                          <div class="product-img">
                            <img src="{{Storage::url($wish->image)}}" alt="Продукт">
                          </div>
                          <div class="product-body">
                            <h3 class="product-name"><a href="#">{{$wish->name}}</a></h3>
                            <h4 class="product-price">{{$wish->price}} ₽</h4>
                          </div>
                          <form action="{{route('wishlist-remove', $wish)}}" method="POST">
                            <button class="delete"><i class="fa fa-close"></i></button>
                            @csrf
                          </form>
                        </div>
                      @endforeach
                    </div>
                  </div>
                @else
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-heart-o"></i>
                    <span>Избранное</span>
                  <div class="qty">0</div>
                  </a>
                  <div class="cart-dropdown">
                    <div class="cart-list">
                      В избранном ничего нет.
                    </div>
                  </div>
                @endif
              </div>

              <div class="dropdown">
                @if(isset($order))
                  @if(count($order->products) > 0)

                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                      <i class="fa fa-shopping-cart"></i>
                      <span>Корзина</span>
                      <div class="qty">{{count($order->products)}}</div>
                    </a>

                    <div class="cart-dropdown">
                      <div class="cart-list">
                        @foreach($order->products as $product)
                          <div class="product-widget">
                            <div class="product-img">
                              <img src="{{Storage::url($product->image)}}" alt="">
                            </div>
                            <div class="product-body">
                              <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                              <h4 class="product-price"><span class="qty">X{{$product->pivot->count}}</span>{{$product->price}} ₽</h4>
                            </div>
                            <form action="{{ route('basket-remove', $product) }}" method="POST">
                              <button class="delete"><i class="fa fa-close"></i></button>
                            @csrf
                            </form>
                          </div>
                        @endforeach
                      </div>

                    <div class="cart-summary">
                      <small>{{count($order->products)}} Товар(ов) выбрано</small>
                      <h5>Стоимость: {{$order->getFullPrice()}} </h5>
                    </div>
                    <div class="cart-btns">
                      <a href="{{route('basket')}}">Оформление заказа <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    
                  @else

                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                      <i class="fa fa-shopping-cart"></i>
                      <span>Корзина</span>
                    <div class="qty">0</div>
                    </a>

                    <div class="cart-dropdown">
                      <div class="cart-list">
                        Корзина пока еще пустая.
                      </div>
                    </div>

                  @endif
                  
                @else

                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                      <i class="fa fa-shopping-cart"></i>
                      <span>Корзина</span>
                    <div class="qty">0</div>
                    </a>

                    <div class="cart-dropdown">
                      <div class="cart-list">
                        Корзина пока еще пустая.
                      </div>
                    </div>

                @endif
            </div>
            <div class="menu-toggle">
              <a href="#">
                <i class="fa fa-bars"></i>
                <span>Menu</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  @if(session()->has('success'))
  <p class="alert alert-success text-center" style="margin: 0">{{ session()->get('success') }}</p>
  @endif
  @if(session()->has('warning'))
  <p class="alert alert-warning text-center" style="margin: 0">{{ session()->get('warning') }}</p>
  @endif

  @yield('content')
  
  <div id="newsletter" class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="newsletter">
            <p>Подписаться на <strong>НОВОСТИ</strong></p>
            <form>
              <input class="input" type="email" placeholder="Введите вашу электронную почту">
              <button class="newsletter-btn"><i class="fa fa-envelope"></i> Подписаться</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer id="footer">
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">О нас</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
              <ul class="footer-links">
                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                <li><a href="#"><i class="fa fa-phone"></i>+7 978 45-43</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Категории</h3>
              <ul class="footer-links">
                <li><a href="#">Ноутбуки</a></li>
                <li><a href="#">Телефоны</a></li>
                <li><a href="#">Умные устройства</a></li>
                <li><a href="#">Аккумуляторы</a></li>
                <li><a href="#">Аудио</a></li>
              </ul>
            </div>
          </div>

          <div class="clearfix visible-xs"></div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Информация</h3>
              <ul class="footer-links">
                <li><a href="#">О нас</a></li>
                <li><a href="#">Связаться с наси</a></li>
                <li><a href="#">Политика конфиденциальности</a></li>
                <li><a href="#">Условия и положения</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Услуги</h3>
              <ul class="footer-links">
                <li><a href="#">Корзина</a></li>
                <li><a href="#">Избраное</a></li>
                <li><a href="#">Отследить мой заказ</a></li>
                <li><a href="#">Помощь</a></li>
              </ul>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div id="bottom-footer" class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> Все права защищены | Мы в соц сетях: <a href="#"> <i class="fa fa-instagram"></i></a> <a href="#"><i class="fa fa-vk"></i></a>
          </div>
        </div>
      </div>

    </div>
  </footer>

  <script src="/kursach/resources/js/bootstrap.min.js"></script>
  <script src="/kursach/resources/js/slick.min.js"></script>
  <script src="/kursach/resources/js/nouislider.min.js"></script>
  <script src="/kursach/resources/js/jquery.zoom.min.js"></script>
  <script src="/kursach/resources/js/main.js"></script>

  <script>
    $(document).ready(function(){
      $(".alert-success").delay(3000).slideUp(300);
    });

    $(document).ready(function(){
      $(".alert-warning").delay(3000).slideUp(300);
    });
  </script>

</body>
</html>
