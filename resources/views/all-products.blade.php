@extends('master' )

@section('title', "Все продукты")

@section('content')

<nav id="navigation">
  <div class="container">
    <div id="responsive-nav">
      <ul class="main-nav nav navbar-nav">
        <li><a href="{{ route("index") }}">Главная страница</a></li>
        <li class="active"><a href="{{route('all-products')}}">Все товары</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- ASIDE -->
      <div id="aside" class="col-md-3">
        <!-- aside Widget -->
        <form class="aside">
          <h3 class="aside-title">Категории</h3>
          <div class="checkbox-filter">
            @foreach($categories as $category)
              <div class="input-checkbox">
                <input type="checkbox" id="category-{{$category->id}}">
                <label for="category-{{$category->id}}">
                  <span></span>
                  {{$category->name}}
                  <small>({{count($category->products)}})</small>
                </label>
              </div>
            @endforeach
            
          </div>
        </form>
        <!-- /aside Widget -->

        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Price</h3>
          <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
              <input id="price-min" type="number">
              <span class="qty-up">+</span>
              <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
              <input  id="price-max" type="number">
              <span class="qty-up">+</span>
              <span class="qty-down">-</span>
            </div>
          </div>
        </div>
        <!-- /aside Widget -->

        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Brand</h3>
          <div class="checkbox-filter">
            <div class="input-checkbox">
              <input type="checkbox" id="brand-1">
              <label for="brand-1">
                <span></span>
                SAMSUNG
                <small>(578)</small>
              </label>
            </div>
          </div>
        </div>
        <!-- /aside Widget -->
      </div>
      <!-- /ASIDE -->

      <!-- STORE -->
      <div id="store" class="col-md-9">
        <!-- store products -->
        <div class="row">
          @foreach($products as $product)
          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="{{Storage::url($product->image)}}" alt="">
                <div class="product-label">
                  {{-- <span class="sale">-30%</span>
                    <span class="new">NEW</span> --}}
                </div>
              </div>
              <div class="product-body">
                <p class="product-category">{{$product->category->name}}</p>
                <h3 class="product-name"><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a></h3>
                <h4 class="product-price">{{$product->price}} ₽ <del class="product-old-price">{{$product->price}} ₽ </del></h4>
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
          </div>
          <!-- /product -->
          @endforeach

        </div>
        <!-- /store products -->

        <!-- store bottom filter -->
        <div class="store-filter clearfix">
          {{$products->links()}}
          {{-- <ul class="store-pagination">
        
          </ul> --}}
        </div>
        <!-- /store bottom filter -->
      </div>
      <!-- /STORE -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<script>
  price_min = document.getElementById('price-min');
  price_max = document.getElementById('price-max');
  price_min.onchange = function(){console.log(price_min.value())};
</script>
@endsection
