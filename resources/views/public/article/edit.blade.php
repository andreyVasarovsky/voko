@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 d-inline align-middle">Редактировать статью</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('public.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('public.article.edit_form')
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        <a href="{{ route('public.profile.index', Auth::user()->id) }}" type="button" class="btn btn-danger">Вернутся</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
