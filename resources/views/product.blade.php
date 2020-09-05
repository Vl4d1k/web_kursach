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

                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> добавить в корзину</button>
                    </div>

                    <div class="product-btns">
                      <form id="form{{$product->id}}" action="{{route('wishlist-add', $product)}}" method="POST" hidden> 
                        @csrf
                      </form>
                     <a onclick="javascript:$('#form{{$product->id}}').submit()" class="fa fa-heart-o" style="font-size: 20px;"></a><a style="font-size: 18px;" onclick="javascript:$('#form{{$product->id}}').submit()" class="tooltipp"> В избранное</a>
                    </div>

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
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="./img/product01.png" alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
@endsection
