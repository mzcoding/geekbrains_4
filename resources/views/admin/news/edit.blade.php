@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">



        <h3>Редактировать новость с #ID = {{ $news->id }}</h3>
        <br>
        <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
            @method('PUT')
            @csrf
            <p>Заголовок: <br><input class="form-control" name="title" value="{{ $news->title }}" ></p>
            <p>Автор: <br><input class="form-control" name="author" value="{{ $news->author }}" ></p>
            <p>Описание: <br><textarea class="form-control" name="description">{!! $news->description !!}</textarea></p>
            <button class="btn btn-success" type="submit">Редактировать</button>
        </form>
    </div>
@stop