@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
           @include('news.partials.news')
            <!-- Pager -->
            <div class="clearfix">
                {{ $news->links() }}
            </div>
        </div>
    </div>

@stop
