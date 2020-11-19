@extends('layouts.app')
@section('content')


    <div class="col-8 offset-2">




        <h3>Добавление новости</h3>
        <br>
        <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
            <p>Заголовок: <br><input class="form-control" name="title" value="{{ old('title') }}" >
            @error('title') <div class="alert alert-danger">
                @foreach($errors->get('title') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            </p>
            <p>Изображение: <br><input type="file" class="form-control" name="image" ></p>
            <p>Автор: <br><input class="form-control" name="author" value="{{ old('author') }}" >
            @error('author') <div class="alert alert-danger">
                @foreach($errors->get('author') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            </p>
            <p>Описание: <br><textarea class="form-control" name="description" id="editor">{!! old('description') !!}</textarea></p>
            <button class="btn btn-success" type="submit">Добавить</button>
        </form>
    </div>
@stop
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function (){
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        });
    </script>
@endpush