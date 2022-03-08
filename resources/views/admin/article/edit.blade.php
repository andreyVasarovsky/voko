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
                        <div class="col-sm-6">
                            <h1 class="m-0">Редактировать статью</h1>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <form action="{{ route('admin.article.update', $client->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="form-group d-none">
                                    <input type="hidden" name="id" class="form-control" id="id" value="{{ $client->id }}">
                                </div>

                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           placeholder="Название" value="{{ (empty(old('title'))) ? $client->title : old('title') }}">
                                    @error('title')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Описание</label>
                                    <input type="text" name="desc" class="form-control" id="desc"
                                           placeholder="Описание" value="{{ (empty(old('desc'))) ? $client->desc : old('desc') }}">
                                    @error('desc')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="region">Контент</label>
                                    <input type="text" name="content" class="form-control" id="content"
                                           placeholder="Контент" value="{{ (empty(old('content'))) ? $client->content : old('content') }}">
                                    @error('content')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Обновить</button>
                                    <a href="{{ route('admin.article.index') }}" type="button" class="btn btn-danger">К списку</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
