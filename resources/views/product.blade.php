@extends('master')

@section('title', 'Товар')

@section('content')
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- Product main img -->
      <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
          <div class="product-preview">
            <img src="{{Storage::url($product->image)}}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{Storage::url($product->slide1)}}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{Storage::url($product->slide2)}}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{Storage::url($product->image)}}" alt="">
          </div>
        </div>
      </div>
      <!-- /Product main img -->

      <!-- Product thumb imgs -->
      <div class="col-md-2  col-md-pull-5">
        <div id="product-imgs">
          <div class="product-preview">
            <img src="{{Storage::url($product->image)}}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{Storage::url($product->slide1)}}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{Storage::url($product->slide2)}}" alt="">
          </div>

          <div class="product-preview">
            <img src="{{Storage::url($product->image)}}" alt="">
          </div>
        </div>
      </div>
      <!-- /Product thumb imgs -->

      <!-- Product details -->
      <div class="col-md-5">
        <div class="product-details">
          <h2 class="product-name">{{$product->name}}</h2>
          <div>
            <h3 class="product-price">{{$product->price}} ₽ <del class="product-old-price">{{$product->price}} ₽</del></h3>
            <!-- <span class="product-available">In Stock</span> -->
          </div>
          <p>{{$product->description}}</p>

          <form action="{{route('basket-add', $product)}}" method="POST">
            <div class="add-to-cart">
              <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> добавить в корзину</button>
            </div>
            @csrf
          </form>

          {{-- <div class="product-btns">
            <form id="formadd{{$product->id}}" action="{{route('wishlist-add', $product)}}" method="POST">
                @csrf
            </form>
            <form id="formremove{{$product->id}}" action="{{route('wishlist-remove', $product)}}" method="POST">
            @csrf
            </form>
            @if(isset($wishList))
              @if($wishList->products->contains($product))
                <a onclick="javascript:$('#form{{$product->id}}').submit()" class="fa fa-heart" style="font-size: 20px;"></a><a style="font-size: 18px;" onclick="javascript:$('#form{{$product->id}}').submit()" class="tooltipp"> Удалить из избранного</a>
              @else
                <a onclick="javascript:$('#form{{$product->id}}').submit()" class="fa fa-heart-o" style="font-size: 20px;"></a><a style="font-size: 18px;" onclick="javascript:$('#form{{$product->id}}').submit()" class="tooltipp"> В избранное</a>
              @endif
            @else
              <a onclick="javascript:$('#form{{$product->id}}').submit()" class="fa fa-heart-o" style="font-size: 20px;"></a><a style="font-size: 18px;" onclick="javascript:$('#form{{$product->id}}').submit()" class="tooltipp"> В избранное</a>
            @endif
          </div> --}}

        </div>
      </div>
      <!-- /Product details -->

      <!-- Product tab -->
      <div class="col-md-12">
        <div id="product-tab">
          <!-- product tab nav -->
          <ul class="tab-nav">
            <li class="active"><a data-toggle="tab" href="#tab1">Описание</a></li>
            <li><a data-toggle="tab" href="#tab2">Характеристики</a></li>
          </ul>
          <!-- /product tab nav -->

          <!-- product tab content -->
          <div class="tab-content">
            <!-- tab1  -->
            <div id="tab1" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-12">
                  <p>{{$product->description}}</p>
                </div>
              </div>
            </div>
            <!-- /tab1  -->
            <!-- tab2  -->
            <div id="tab2" class="tab-pane fade in">
              <div class="row">
                <div class="col-md-12">
                  <p>{{$product->description}}</p>
                </div>
              </div>
            </div>
            <!-- /tab2  -->
          </div>
          <!-- /product tab content  -->
        </div>
      </div>
      <!-- /product tab -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-12">
        <div class="section-title text-center">
          <h3 class="title">Похожие продукты</h3>
        </div>
      </div>

      <!-- product -->
      @foreach($product->category->products()->take(4)->get() as $recomend)
      <div class="col-md-3 col-xs-6">
        <div class="product">
          <div class="product-img">
            <img src="{{Storage::url($recomend->image)}}" alt="">
            <div class="product-label">
              {{-- <span class="sale">-30%</span> --}}
            </div>
          </div>
          <div class="product-body">
            <h3 class="product-name"><a href="#">{{$recomend->name}}</a></h3>
            <h4 class="product-price">{{$recomend->price}} ₽ <del class="product-old-price"> {{$recomend->price}} ₽</del></h4>
            <div class="product-rating">
            </div>
            <div class="product-btns">
              <form id="formadd{{$recomend->id}}" action="{{route('wishlist-add', $recomend)}}" method="POST">
                @csrf
              </form>
              <form id="formremove{{$recomend->id}}" action="{{route('wishlist-remove', $recomend)}}" method="POST">
                @csrf
              </form>
              @if(isset($wishList))
                @if($wishList->products->contains($recomend))
                <button onclick="javascript:$('#formremove{{$recomend->id}}').submit()" class="add-to-wishlist"><i class="fa fa-heart"></i><span class="tooltipp">удалить</span></button>
                @else
                <button onclick="javascript:$('#formadd{{$recomend->id}}').submit()" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">в избранное</span></button>
                @endif
              @else
                <button onclick="javascript:$('#formadd{{$recomend->id}}').submit()" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">в избранное</span></button>
              @endif
              <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">просмотр</span></button>
            </div>
          </div>
          <form action="{{route('basket-add', $recomend)}}" method="POST">
            <div class="add-to-cart">
              <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> добавить в корзину</button>
            </div>
            @csrf
          </form>
        </div>
      </div>
      @endforeach
      <!-- /product -->

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /Section -->
@endsection
