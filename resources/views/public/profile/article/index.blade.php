<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="d-inline">
                Мои статьи ({{ Auth::user()->articles->count() }})
            </h2>
            <a href="{{ route('public.article.create') }}" class="action d-inline" style="font-size: 18px;">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="col-12">
            @if(Auth::user()->articles->count())
                <table class="table table-hover hover-table-actions close-borders">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Статья</th>
                        <th scope="col"><i class="fas fa-eye"></i></th>
                        <th scope="col"><i class="fas fa-comments"></i></th>
                        <th scope="col"><i class="fas fa-heart text-danger"></i></th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->articles AS $index => $article)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td><a href="{{ route('public.article.show', $article->id) }}">{{ $article->title }}</a></td>
                            <td>{{ $article->view_qty }}</td>
                            <td>{{ $article->comments_count }}</td>
                            <td>{{ $article->likes_count }}</td>
                            <td class="actions" style="font-size: 14px;">
                                <a href="{{ route('public.article.show', $article->id) }}"
                                   class="action">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.article.edit', $article->id) }}"
                                   class="action">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('public.article.destroy', $article->id) }}"
                                      method="POST" class="action d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent p-0">
                                        <i class="fas fa-trash-alt text-danger action" role="button"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-dark" role="alert">
                    Вы пока не написали ни одной статьи!
                </div>
            @endif
        </div>
    </div>
</div>
