@extends('master')

@section('title', 'Связаться с нами')

@section('content')
<div class="container-fluid">
  <div class="col-md-12">
    <h2>Мы на связи</h2>
    <p>Оставьте свою заявку, и мы свяжемся с вами.</p>
    <div class="row">
      <div class="col-md-4"> </div>
      <div class="col-md-4">
        <form method="POST" action="{{ route('contact-confirm') }}">
          <div class="form-group">
            <label for="name">Ваше имя:</label>
            <input type="name" name="name" class="form-control" id="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="phone">Номер телефона:</label>
            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone">
          </div>
          <div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea rows="15" class="form-control" name="message" rows="3"></textarea>
          </div>
          @csrf
          <input type="submit" value="Отправить сообщение" class="btn btn-info">
        </form>
      </div>
      <div class="col-md-4"> </div>
    </div>
    @endsection
