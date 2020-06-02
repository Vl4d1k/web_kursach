@extends('auth.layouts.master')

@isset($category)
@section('title', 'Редактировать категорию ' . $category->name)
@else
@section('title', 'Создать категорию')
@endisset

@section('content')
<div class="col-md-12">
  @isset($category)
  <h1>Редактировать категорию <b>{{ $category->name }}</b></h1>
  @else
  <h1>Добавить категорию</h1>
  @endisset

  <form method="POST" enctype="multipart/form-data" @isset($category) action="{{ route('categories.update', $category) }}" @else action="{{ route('categories.store') }}" @endisset>
    <div>
      @isset($category)
      @method('PUT')
      @endisset
      @csrf
      @error('code')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <div class="input-group row">
        <label for="code" class="col-sm-2 col-form-label">Код: </label>
        <div class="col-sm-10   ">
          <input type="text" class="form-control" name="code" id="code" value="@isset($category){{ $category->code }}@endisset">
        </div>
      </div>
      <br>
      @error('name')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <div class="input-group row">
        <label for="name" class="col-sm-2 col-form-label">Имя: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" id="name" value="@isset($category){{ $category->name }}@endisset">
        </div>
      </div>
      <br>
      <div class="input-group row">
        <label for="name" class="col-sm-2 col-form-label">Имя en: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_en" id="name_en" value="@isset($category){{ $category->name_en }}@endisset">
        </div>
      </div>
      <br>
      @error('description')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
      <div class="input-group row">
        <label for="description" class="col-sm-2 col-form-label">Описание: </label>
        <div class="col-sm-6">
          <textarea name="description" id="description" cols="72" style="margin: 0px; width: 328px; height: 112px;" rows="7">@isset($category){{ $category->description }}@endisset</textarea>
        </div>
      </div>
      <br>
      <div class="input-group row">
        <label for="description" class="col-sm-2 col-form-label">Описание en: </label>
        <div class="col-sm-6">
          <textarea name="description_en" id="description_en" cols="72" style="margin: 0px; width: 328px; height: 112px;" rows="7">@isset($category){{ $category->description_en }}@endisset</textarea>
        </div>
      </div>
      <br>
      <div class="input-group row">
        <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
        <div class="col-sm-12">
          <label class="btn btn-default btn-file">
            Загрузить <input type="file" style="display: none;" name="image" id="image">
          </label>
        </div>
      </div>
      <br><button class="btn btn-success">Сохранить</button>
    </div>
  </form>
</div>
@endsection
