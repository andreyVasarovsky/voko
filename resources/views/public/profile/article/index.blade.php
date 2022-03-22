<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Мои статьи</h2>
        </div>
        <div class="col-12">
            @if(Auth::user()->articles->count())
                <table class="table table-hover hover-table-actions close-borders">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Статья</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->articles AS $index => $article)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td><a href="{{ route('public.article.show', $article->id) }}">{{ $article->title }}</a></td>
                            <td class="actions" style="font-size: 14px;">
                                &nbsp;
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
