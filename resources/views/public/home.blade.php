@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-0">
                <h1 style="font-size: 10vw">Воко</h1>
            </div>
            <div class="col-12 text-center">
                <h4>Журналистское агентство</h4>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @if(isset($articles) && $articles->count() > 0)
                <div class="col-12">
                    <strong>
                        Популярные статьи:
                    </strong>
                </div>
                @include('public.article.articles')
            @endif
        </div>
    </div>
@endsection
