@extends('master')

@section('title', __('main.cart'))

@section('content')
<div class="container-fluid">
  <div class="col-md-12">
    <h2>@lang('feedback.intouch')</h2>
    <p>@lang('feedback.request')</p>
    <div class="row">
      <div class="col-md-4"> </div>
      <div class="col-md-4">
        <form method="POST" action="{{ route('contact-confirm') }}">
          @error('name')
          <div class="alert alert-danger ">{{$message}}</div>
          @enderror
          <div class="form-group">
            <label for="name">@lang('feedback.name'):</label>
            <input type="name" name="name" class="form-control" id="name" placeholder="Name">
          </div>
          @error('phone')
          <div class="alert alert-danger ">{{$message}}</div>
          @enderror
          <div class="form-group">
            <label for="phone">@lang('feedback.phone'):</label>
            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone">
          </div>
          @error('message')
          <div class="alert alert-danger ">{{$message}}</div>
          @enderror
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
      $(function() {
        $('#phone').mask('+7(000)000-00-00');
      });
    </script>
    @endsection
