@extends('master' )

@section('title', 'Главаная страница')

@section('content')
    <h1>Все товары</h1>
    <form method="GET" action="{{route("index")}}">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from">Цена от
                    <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                </label>
                <label for="price_to">до
                    <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                </label>
            </div>
            <div class="col-sm-4 col-md-2">
                <button type="submit" class="btn btn-primary">Фильтр</button>
                <a href="{{ route("index") }}" class="btn btn-warning">Сброс</a>
                <p>
            </div>
        </div>
    </form>
    @foreach ($products as $product)
     @include('card', compact('product'))
    @endforeach
    {{ $products->links() }}
@endsection  