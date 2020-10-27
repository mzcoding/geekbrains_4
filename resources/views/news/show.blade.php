@extends('layouts.main')
@section('content')
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        @if(isset($name))
            Переменная name = {{ $name }}
        @endif

   @if($slug === 'one')
       <h1>Ура, вы победили</h1>
   @else
       <strong>Новость</strong>  {!! $slug  !!}
   @endif

    </div>
  </div>
@stop