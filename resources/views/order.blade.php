@extends('master')

@section('title', 'Оформление заказа')

@section('content')
        <h1>@lang('basket.approve_order'):</h1>
        <div class="container">
            <div class="row justify-content-center">
            <p>@lang('basket.total'): <b>{{$order->getFullPrice()}} руб.</b></p>
            <form action="{{route('basket-confirm')}}" method="POST">
                    <div>
                        <p>@lang('basket.personal_data'):</p>

                        <div class="container">
                            <div class="form-group">
                                @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.name'): </label>
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
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.data.phone'): </label>
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
                                <label for="payment" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.payment'): </label>
                                <div class="col-lg-4">
                                    <select name="payment" id="payment" class="form-control">
                                        <option></option>
                                        <option>@lang('basket.cash')</option>
                                        <option>@lang('basket.card')</option>
                                        <option>@lang('basket.online')</option>
                                    </select>
                                </div>
                            </div>
                        <br>
                        <br>
                            <div class="form-group">
                                @error('delivery')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <label for="delivery" class="control-label col-lg-offset-3 col-lg-2">@lang('basket.delivery'): </label>
                                <div class="col-lg-4">
                                    <select name="delivery" id="delivery" class="form-control">
                                        <option></option> 
                                        <option>@lang('basket.post')</option>
                                        <option>@lang('basket.courier')</option>
                                        <option>@lang('basket.pickup')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        @csrf
                        <input type="submit" class="btn btn-success" value="@lang('basket.approve_order')">
                    </div>
                </form>
            </div>
        </div>
@endsection