<div class="col-sm-6 col-md-4">
  <div class="thumbnail">
    <img src="{{Storage::url($product->image)}}" alt="iPhone X 64GB">
    <div class="caption">
      <h3>{{$product->__('name')}}</h3>
      <p>{{$product->price}} @lang('main.rub').</p>
      <p>
        <form action="{{route('basket-add', $product)}}" method="POST">
          <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_basket')</button>
          <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-default" role="button">@lang('main.more')</a>
          @csrf
        </form>
      </p>
    </div>
  </div>
</div>
