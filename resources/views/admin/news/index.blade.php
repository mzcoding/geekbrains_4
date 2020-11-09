@extends('layouts.app')
@section('content')

    <a href="{{ route('news.create') }}" class="btn btn-success">Добавить новость</a>
    <div class="col-12 offset-2">
       <a href="javascript:;" class="deleteData" rel="9">Drop</a>
        @forelse($news as $newsItem)
            <p><a href="{{ route('news.edit', ['news' => $newsItem]) }}">{{ $newsItem->title }}</a> -
                {{ $newsItem->updated_at->format('d-m (H:i)') }}
            &nbsp; <a href="javascript:;" style="color:red;" class="delete" rel="{{ $newsItem->id }}">Удалить</a></p>
        @empty
            <h3>Новостей нет</h3>
        @endforelse

        <br>
        {{ $news->links() }}
    </div>
@stop
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options);
                const body = await response.json();

                return body;
            }


                const button = document.querySelector(".deleteData");
                button.addEventListener("click", function () {
                    if(confirm("Вы подтверждаете удаление ?")) {
                        fetchData("{{ url('/admin/news') }}/" + this.getAttribute('rel'), {
                            method: "DELETE",
                            headers: {
                                'Content-Type': 'application/json; charset=utf-8',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then((data) => {
                            console.log('Deleted');
                        })
                    }
                });

        });
    </script>
@endpush