@extends('master')

@section('title', 'Оформление заказа')

@section('content')
        <h1>Подтвердите заказ:</h1>
        <div class="container">
            <div class="row justify-content-center">
            <p>Общая стоимость заказа: <b>{{$order->getFullPrice()}} руб.</b></p>
            <form action="{{route('basket-confirm')}}" method="POST">
                    <div>
                        <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>

                        <div class="container">
                            <div class="form-group">
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                                </div>
                            </div>
                        <br>
                        <br>
                            <div class="form-group">
                                @error('phone')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
                                <div class="col-lg-4">
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="form-control">
                                </div>
                            </div>
                        <br>
                        <br>
                            <div class="form-group">
                                @error('payment')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <label for="payment" class="control-label col-lg-offset-3 col-lg-2">Способ оплаты: </label>
                                <div class="col-lg-4">
                                    <select name="payment" id="payment" class="form-control">
                                        <option></option>
                                        <option>Наличными курьеру</option>
                                        <option>Картой курьеру</option>
                                        <option>Перевод на карту</option>
                                    </select>
                                </div>
                            </div>
                        <br>
                        <br>
                            <div class="form-group">
                                @error('delivery')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <label for="delivery" class="control-label col-lg-offset-3 col-lg-2">Способ доставки: </label>
                                <div class="col-lg-4">
                                    <select name="delivery" id="delivery" class="form-control">
                                        <option></option> 
                                        <option>Почтой России</option>
                                        <option>Курьерская служба</option>
                                        <option>Самовывоз</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        @csrf
                        <input type="submit" class="btn btn-success" value="Подтвердить заказ">
                    </div>
                </form>
            </div>
        </div>
@endsection