@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @forelse($newsList as $news)
                <div class="post-preview">
                    <a href="{{ route('news.show', ['slug' => $news->slug]) }}">
                        <h2 class="post-title">
                            {{ $news->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $news->description }}
                        </h3>
                    </a>
                    <p class="post-meta">Опубликовал
                        <a href="#">{{ $news->author }}</a>
                        {{ $news->created_at->format('Y-m-d H:i') }}</p>
                </div>
                <hr>
            @empty
                <h3>Новостей нет</h3>
        @endforelse





        <!-- Pager -->


                {!! $newsList->links()  !!}
        </div>
    </div>

@stop