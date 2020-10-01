@extends('master')

@section('title', 'Корзина')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <h3 class="breadcrumb-header">Оформление заказа</h3>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<form id="form" action="{{ url('api/getcoursebygroup') }}">
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
</form>

<script>
  function checkEmail(){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $('.payment-method').focus()
    if(regex.test($('#email').val())){
      $('#email').css({ "border": '#17BD35 2px solid'});
      $('#mailError').hide()
    }
    else {
       $('#email').css({ "border": '#FF0000 2px solid'});
       $('#mailError').show()
    }
  }

  function checkTel(){
    var regex = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/
    if(regex.test($('#tel').val())){
      $('#tel').css({ "border": '#17BD35 2px solid'});
      $('#telError').hide()
    }
    else {
       $('#tel').css({ "border": '#FF0000 2px solid'});
       $('#telError').show()
    }
  }

  function checkFio(){
    if($('#fio').val().length > 3){
      $('#fio').css({ "border": '#17BD35 2px solid'});
      $('#fioError').hide()
    }
    else {
       $('#fio').css({ "border": '#FF0000 2px solid'});
       $('#fioError').show()
    }
  }

</script>

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <form id="confirmOrder" action="{{route('basket-place')}}">

        <div class="col-md-7">
          <!-- Billing Details -->
          <div class="billing-details">
            <div class="section-title">
              <h3 class="title">Покупатель</h3>
            </div>
            <div class="form-group">
              <input id="fio" class="input" type="text" name="first-name" onfocusout="checkFio()" placeholder="ФИО">
            </div>
            <p id="fioError" class="alert alert-danger text-center" hidden >Имя введено неверно. Введите больше трёх букв.</p>
            <div class="form-group">
              <input id="tel" class="input" type="tel" name="tel" onfocusout="checkTel()" placeholder="Телефон">
            </div>
            <p id="telError" class="alert alert-danger text-center" hidden >Телефон введен неверно.</p>
            <div class="form-group">
              <input id="email" class="input" type="email" onfocusout="checkEmail()" name="email" placeholder="Электронная почта">
            </div>
            <p id="mailError" class="alert alert-danger text-center" hidden >Электронная почта введена неверно.</p>
          </div>
          <!-- /Billing Details -->
        </div>

        <!-- Order Details -->
        <div class="col-md-5 order-details">
          <div class="section-title text-center">
            <h3 class="title">Ваш заказ</h3>
          </div>
          <div class="order-summary">
            <div class="order-col">
              <div><strong>Продукт</strong></div>
              <div><strong>Стоимость</strong></div>
            </div>
            <div class="order-products">
              @foreach($order->products as $product)
              <div class="order-col">
                <div style="font-size: 15px;">
                  <a onclick="addProduct('{{route('basket-add', $product)}}')">
                    <span class="fa fa-plus"></span>
                  </a>
                  
                  {{$product->pivot->count}}x
                  
                  <a href="#" onclick="javascript:$('#formremove').submit()">
                    <span class="fa fa-minus"></span>
                  </a>
                  <a href="#">    {{$product->name}}</a>
                </div>
                <form id="formadd" action="{{ route('basket-add', $product) }}" method="POST">

                </form>
                <div style="font-size: 15px;">
                  <h4 class="product-price">{{$product->price}} ₽</h4>
                </div>
              </div>
              <form id="formremove" action="{{ route('basket-remove', $product) }}" method="POST">
                  @csrf
              </form>
              @endforeach
            </div>
            <div class="order-col">
              <div><strong>Сумма</strong></div>
              <div><strong class="order-total">{{$order->getFullPrice()}} ₽</strong></div>
            </div>
          </div>
          <div class="payment-method">
            <div class="input-radio">
              <input value="our company" type="radio" name="delivery" id="delivery-1" checked>
              <label for="delivery-1">
                <span></span>
                Собственная служба доставки
              </label>
              <div class="caption">
                <p></p>
              </div>
            </div>
            <div class="input-radio">
              <input value="transport company" type="radio" name="delivery" id="delivery-2">
              <label for="delivery-2">
                <span></span>
                Доставка транспортной компанией.
              </label>
              <div class="caption">
                <p></p>
              </div>
            </div>
          </div>
          <a type="submit" onclick="javascript:$('#confirmOrder').submit()" class="primary-btn order-submit">Оформить заказ</a>
        </div>

      </form>
      <!-- /Order Details -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
  $(function() {
    $('#tel').mask('+7(000)000-00-00');
  });
  function addProduct(url) {
    fetch(url, {
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": $('input[name="_token"]').val()
      },
      method: 'POST'
    })
  }
</script>

@endsection
