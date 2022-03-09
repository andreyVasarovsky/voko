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
                            <form action="{{ route('admin.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group d-none">
                                    <input type="hidden" name="id" class="form-control" id="id" value="{{ $article->id }}">
                                </div>

                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           placeholder="Название" value="{{ (empty(old('title'))) ? $article->title : old('title') }}">
                                    @error('title')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Категория</label>
                                    <select name="category_id" class="form-control" id="category">
                                        @foreach($categories AS $category)
                                            <option {{ (old('category') == $category->id) ? ' selected' : ($category->id == $article->category->id ? ' selected' : '') }}
                                                    value="{{ $category->id }}">
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Описание</label>
                                    <input type="text" name="desc" class="form-control" id="desc"
                                           placeholder="Описание" value="{{ (empty(old('desc'))) ? $article->desc : old('desc') }}">
                                    @error('desc')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="region">Контент</label>
                                    <textarea name="content" id="summernote" cols="30" rows="10">
                                        {{ (empty(old('content'))) ? $article->content : old('content') }}
                                    </textarea>
                                    @error('content')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tag_ids">Тэги</label>
                                    <select multiple class="form-control" name="tag_ids[]" id="tag_ids">
                                        @foreach($tags AS $tag)
                                            <option
                                                {{ (is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids'))) || empty(old('tag_ids')) && in_array($tag->id, $articleTagIds) ? ' selected' : '' }}
                                                value="{{ $tag->id }}">
                                                {{ $tag->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tag_ids')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="preview">Фото</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="w-100" src="{{ asset($article->preview) }}" alt="Картинка">
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="preview" id="preview" class="form-control" style="font-size: 15px;" accept="image/*">
                                        </div>
                                    </div>
                                    @error('preview')
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
