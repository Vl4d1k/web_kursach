@extends('auth.layouts.master')

@section('title', 'Обращение ' . $message->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Обращение №{{ $message->id }}</h1>
                    <p>Фамилия Имя Отчество: <b>{{ $message->name }}</b></p>
                    <p>Номер теелфона: <b>{{ $message->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Сообщение</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $message->description}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection