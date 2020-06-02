@extends('master')

@section('title',  __('main.cart'))

@section('content')
<div class="container-fluid">
  <div class="col-md-12">
    <h2>@lang('feedback.intouch')</h2>
    <p>@lang('feedback.request')</p>
    <div class="row">
      <div class="col-md-4"> </div>
      <div class="col-md-4">
        <form method="POST" action="{{ route('contact-confirm') }}">
          <div class="form-group">
            <label for="name">@lang('feedback.name'):</label>
            <input type="name" name="name" class="form-control" id="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="phone">@lang('feedback.phone'):</label>
            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone">
          </div>
          <div class="form-group">
            <label for="message">@lang('feedback.message'):</label>
            <textarea rows="15" class="form-control" name="message" rows="3"></textarea>
          </div>
          @csrf
          <input type="submit" value="@lang('feedback.send_message')" class="btn btn-info">
        </form>
      </div>
      <div class="col-md-4"> </div>
    </div>
    @endsection
