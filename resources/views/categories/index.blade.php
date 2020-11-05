@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @forelse($categories as $category)
                <div class="post-preview">
                    <a href="{{ route('categories.show', ['id' => $category->id]) }}">
                        <h2 class="post-title">
                            {{ $category->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $category->description }}
                        </h3>
                    </a>
                    <p class="post-meta">Опубликовал
                        <a href="#">Админ</a>
                        {{ $category->created_at->format('d-m-Y H:i') }}</p>
                </div>
                <hr>
            @empty
                <h3>Категорий нет</h3>
            @endforelse





        <!-- Pager -->
            <div class="clearfix">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@stop
