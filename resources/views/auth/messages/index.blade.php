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
                    Действия
                </th>
            </tr>
            @foreach($messages as $message)
            <tr>
                <td>{{ $message->id}}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->phone }}</td>
                <td>{{ $message->created_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-success" type="button"
                        @if(Auth::user()->isAdmin())
                            href="{{ route('messages.show', $message) }}"
                        @endif
                    >Открыть</a>
                    </div>
                </td>
            </tr>
        @endforeach 
        </table>
        {{ $messages->links() }}
    </div>
@endsection