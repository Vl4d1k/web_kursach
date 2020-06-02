@extends('master')

@section('title', __('main.map'))

@section('content')
<div class="col-md-12">
    <div class="row">
      <div class="col-md-11">
        <h2>@lang('about.addres')</h2>
        <p>@lang('about.town')</p>
        <p>@lang('about.house')</p>
        <p><strong>@lang('about.phone'):</strong> +7 495 642-26-84</p>
        <p><strong>@lang('about.work_time'):</strong> 11:00-19:00</p>
      </div>
    <iframe style="width: 95%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2840.548367954987!2d33.5176953155289!3d44.60626197910026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409524c80da6492b%3A0x42d9203ba86eaee3!2z0YPQuy4g0J7Rh9Cw0LrQvtCy0YbQtdCyLCAxOSwg0KHQtdCy0LDRgdGC0L7Qv9C-0LvRjA!5e0!3m2!1sru!2s!4v1589139876817!5m2!1sru!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
@endsection