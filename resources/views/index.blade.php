@extends('master' )

@section('title', "Главная страница")

@section('content')
<nav id="navigation">
  <div class="container">
    <div id="responsive-nav">
      <ul class="main-nav nav navbar-nav">
        <li class="active"><a href="{{ route("index") }}">Главная страница</a></li>
        <li> <a href="{{route('all-products')}}">Все товары</a> </li>
      </ul>
    </div>
  </div>
</nav>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Актуальные предложения</h3>
          <div class="section-nav">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="products-tabs">
            <div id="tab1" class="tab-pane active">
              <div class="products-slick" data-nav="#slick-nav-1">
                @foreach ($products as $product)
                <div class="product">
                  <div class="product-img">
                    <img src="{{Storage::url($product->image)}}" alt="">
                    <div class="product-label">
                      {{-- <span class="sale">-30%</span> --}}
                      {{-- <span class="new">NEW</span> --}}
                    </div>
                  </div>
                  <div class="product-body">
                    <p class="product-category">{{$product->category->name}}</p>
                    <h3 class="product-name"><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a></h3>
                    <h4 class="product-price">{{$product->price}} ₽ <del class="product-old-price"> {{$product->price}} ₽</del></h4>
                    <div class="product-btns">
                      <form id="formadd{{$product->id}}" action="{{route('wishlist-add', $product)}}" method="POST"> 
                        @csrf
                      </form>
                      <form id="formremove{{$product->id}}" action="{{route('wishlist-remove', $product)}}" method="POST">
                        @csrf
                      </form>
                      @if(isset($wishList))
                        @if($wishList->products->contains($product))
                          <button onclick="javascript:$('#formremove{{$product->id}}').submit()" class="add-to-wishlist"><i class="fa fa-heart"></i><span class="tooltipp">удалить</span></button>
                        @else
                          <button onclick="javascript:$('#formadd{{$product->id}}').submit()" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">в избранное</span></button>
                        @endif
                      @else
                          <button onclick="javascript:$('#formadd{{$product->id}}').submit()" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">в избранное</span></button>
                      @endif
                      <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">просмотр</span></button>
                    </div>
                  </div>
                  <form action="{{route('basket-add', $product)}}" method="POST">
                    <div class="add-to-cart">
                      <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> добавить в корзину</button>
                    </div>
                    @csrf
                  </form>
                </div>
                @endforeach
              
              </div>
              <div id="slick-nav-1" class="products-slick-nav"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="hot-deal" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hot-deal" id="countdown">
          <ul class="hot-deal-countdown">
            <li>
              <div>
                <h3 id="days"></h3>
                <span>Дней</span>
              </div>
            </li>
            <li>
              <div>
                <h3 id="hours"></h3>
                <span>Часов</span>
              </div>
            </li>
            <li>
              <div>
                <h3 id="minutes"></h3>
                <span>Минут</span>
              </div>
            </li>
            <li>
              <div>
                <h3 id="seconds"></h3>
                <span>Секунд</span>
              </div>
            </li>
          </ul>
          <h2 class="text-uppercase">Лучшее предложение этой недели</h2>
          <p>Экономьте до 50% </p>
          <a class="primary-btn cta-btn" href="#">Купить сейчас</a>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- таймер акции --}}
<script src="/kursach/resources/js/timer.js"></script>

@endsection
