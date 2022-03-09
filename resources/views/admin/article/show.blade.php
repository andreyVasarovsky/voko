@extends('admin.main')
@extends('admin.nav')
@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 align-items-center">
                            <h1 class="m-0 d-inline">Статья: {{ $article->title }}</h1>
                        </div>
                        @if(session('error'))
                            <div class="col-12 alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <h3 class="category" style="position: absolute; top: 4px; right: 18px;"><span
                                    class="badge badge-secondary">{{ $article->category->title }}</span></h3>
                            <img class="w-100" src="{{ asset($article->preview) }}" alt="Картинка">
                            <div class="desc text-center mt-2">
                                {{ $article->desc }}
                            </div>
                        </div>
                        <div class="col-8 text-center">
                            {!! $article->content !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-center">
                            @if($article->tags->count() > 0)
                                @foreach($article->tags AS $tag)
                                    <span class="badge badge-primary">{{ $tag->title }}</span>
                                @endforeach
                            @else
                                &nbsp;
                            @endif
                        </div>
                        <div class="col-8">
                            <div class="actions text-right mt-2">
                                <a href="{{ route('admin.article.edit', $article->id) }}" type="button"
                                   class="btn btn-primary">Редактировать</a>
                                <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.article.destroy', $article->id) }}" type="button"
                                       class="btn btn-danger">Удалить</a>
                                </form>
                                <a href="{{ route('admin.article.index') }}" type="button" class="btn btn-secondary">Вернутся</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
