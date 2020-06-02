@extends('master')

@section('title', __('main.history'))

@section('content')
<h1>@lang('about.title')<h1>
  <div>
  <p class="text-justify" style="font-size: 22px;">
    @lang('about.p1')
  </p>
  <p class="text-justify" style="font-size: 22px;">
    @lang('about.p2')
  </p>
  <p class="text-justify" style="font-size: 22px;">
    @lang('about.p3')
  </p>
  <p class="text-justify" style="font-size: 22px;">
   @lang('about.p4')
  </p>
  </div>
@endsection