@extends('master' )

@section('title', __('main.feedback_page'))

@section('content')

<h1>@lang('main.all_products')</h1>
<script src="\kursach\resources\js\onlyDigitsInInput.js"></script>
<form method="GET" action="{{route("index")}}">
  <div class="filters row">
    <div class="col-sm-4 col-md-4">
      <label for="price_from">@lang('main.price_from')
        <input type="text" name="price_from" id="price_from" size="6" onkeypress='onlyDigits(event)' value="{{ request()->price_from}}">
      </label>
      <label for="price_to">@lang('main.to')
        <input type="text" name="price_to" id="price_to" size="6" onkeypress='onlyDigits(event)' value="{{ request()->price_to }}">
      </label>
    </div>
    <div class="col-sm-2 col-md-2">
      <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
      <a href="{{ route("index") }}" class="btn btn-warning">@lang('main.reset')</a>
      <p>
    </div>
  </div>
</form>
@foreach ($products as $product)
@include('card', compact('product'))
@endforeach
{{ $products->links() }}
@endsection
