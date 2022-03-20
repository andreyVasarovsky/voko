<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Мои лайки</h2>
        </div>
        <div class="col-12">
            @if(Auth::user()->likes->count())
                <table class="table table-hover hover-table-actions close-borders">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Статья</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->likes AS $index => $like)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td><a href="{{ route('public.article.show', $like->article->id) }}">{{ $like->article->title }}</a></td>
                            <td class="actions" style="font-size: 14px;">
                                <form action="{{ route('public.like.destroy', $like->id) }}"
                                      class="action"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="article_id" value="{{ $like->article->id }}">
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-heart text-danger" role="button"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-dark" role="alert">
                    Вы пока не поставили ни одного лайка!
                </div>
            @endif
        </div>
    </div>
</div>
