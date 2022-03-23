<div class="form-group mt-2">
    <label for="title"><strong>Название</strong></label>
    <input type="text" name="title" class="form-control" id="title"
           placeholder="Название" value="{{ (empty(old('title'))) ? '' : old('title') }}">
    @error('title')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-group mt-2">
    <label for="region"><strong>Описание</strong></label>
    <input type="text" name="desc" class="form-control" id="desc"
           placeholder="Описание" value="{{ (empty(old('desc'))) ? '' : old('desc') }}">
    @error('desc')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-group mt-2">
    <label for="category"><strong>Категория</strong></label>
    <select name="category_id" class="form-control" id="category">
        <option disabled selected>Выберите категорию</option>
        @foreach($categories AS $category)
            <option {{ (old('category_id') == $category->id) ? ' selected' : '' }}
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
@if($tags->count() > 0)
    <div class="form-group">
        <label for="theme_ids"><strong>Тэги</strong></label>
        <select multiple class="form-control" name="tag_ids[]" id="tag_ids">
            @foreach($tags AS $tag)
                <option
                    {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}
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
@endif
<div class="form-group mt-2">
    <label for="region"><strong>Контент</strong></label>
    <textarea name="content" id="summernote" cols="30" rows="10">
                                        {{ (empty(old('content'))) ? '' : old('content') }}
                                    </textarea>
    @error('content')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <div class="alert alert-danger d-none" role="alert" id="img-upload-error">
        Ошибка при загрузке изображения
    </div>
</div>
<div class="form-group mt-2">
    <label for="preview"><strong>Фото</strong></label>
    <input type="file" name="preview" id="preview" class="form-control" style="font-size: 15px;" accept="image/*">
    @error('preview')
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
</div>
