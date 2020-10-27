@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @forelse($categories as $key => $category)
                <div class="post-preview">
                    <a href="{{ route('categories.show', ['id' => $key]) }}">
                        <h2 class="post-title">
                            {{ $category['title'] }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $category['description'] }}
                        </h3>
                    </a>
                    <p class="post-meta">Опубликовал
                        <a href="#">Админ</a>
                        {{ \Carbon\Carbon::now() }}</p>
                </div>
                <hr>
            @empty
                <h3>Категорий нет</h3>
        @endforelse





        <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
@stop