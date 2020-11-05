@forelse($news as $n)
    <div class="post-preview">
        <a href="{{ route('news.show', ['slug' => $n->slug]) }}">
            <h2 class="post-title">
                {{ $n->title }}
            </h2>
            <h3 class="post-subtitle">
                {{ $n->description }}
            </h3>
        </a>
        <p class="post-meta">Опубликовал
            <a href="#">{{ $n->author }}</a>
            {{ $n->created_at->format('d-m-Y H:i') }}</p>
    </div>
    <hr>
@empty
    <h3>Новостей нет</h3>
@endforelse