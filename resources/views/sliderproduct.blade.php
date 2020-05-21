@extends('master')

@section('title', 'Товар')

@section('content')
<h1>{{$product->name}}</h1>
<p>Цена: <b>{{$product->price}} руб.</b></p>
<div id="myCarousel"  class="carousel slide" data-ride="carousel" style="width:65%; margin: 0 auto; border-radius: 55px 55px 55px 55px; overflow: hidden;" >

    <!-- Wrapper for slides -->
    <div class="carousel-inner" >
      <div class="item active">
        <img src="{{Storage::url($product->image)}}" alt="1" style="width:65%; margin: 0 auto;">
      </div>

      <div class="item">
        <img  src="{{Storage::url($product->image)}}" alt="2"  style="width:65%; margin: 0 auto;">
      </div>
    
      <div class="item">
        <img  src="{{Storage::url($product->image)}}" alt="3"  style="width:65%; margin: 0 auto;">
      </div>
    </div>

        <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

    <p>{{$product->description}}</p>
    <form action="{{route('basket-add', $product)}}" method="POST">
        <button type="submit" class="btn btn-primary" role="button">В корзину</button>
        @csrf
    </form>
@endsection