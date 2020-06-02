@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>@lang('basket.order') №{{ $order->id }}</h1>
                    <p>@lang('basket.customer'): <b>{{ $order->name }}</b></p>
                    <p>@lang('basket.delivery'): <b>{{ $order->delivery }}</b></p>
                    <p>@lang('basket.payment'): <b>{{ $order->payment }}</b></p>
                    <p>@lang('basket.data.phone'): <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('basket.data.name')</th>
                            <th>@lang('basket.count')</th>
                            <th>@lang('basket.price')</th>
                            <th>@lang('basket.full_cost')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge">1</span></td>
                                <td>{{ $product->price }} @lang('basket.rub').</td>
                                <td>{{ $product->getPriceForCount()}} @lang('basket.rub').</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">@lang('basket.total'):</td>
                            <td>{{ $order->getFullPrice() }} @lang('basket.rub').</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection