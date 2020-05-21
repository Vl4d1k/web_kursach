@extends('auth.layouts.master')

@section('content')
    <div class="col-md-18">
        <h1>Заказы</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Имя
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Когда отправлен
                </th>
                <th>
                    Сумма
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id}}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->getFullPrice() }} руб.</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-success" type="button"
                        @if(Auth::user()->isAdmin())
                        href="{{ route('orders.show', $order) }}"
                        @else
                        href="{{ route('person.orders.show', $order) }}"
                        @endif
                    >Открыть</a>
                    </div>
                </td>
            </tr>
        @endforeach 
        </table>
        {{ $orders->links() }}
    </div>
@endsection