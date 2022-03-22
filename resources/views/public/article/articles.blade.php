@foreach($articles AS $article)
    <div class="col-12 col-md-3 mb-2">
        <div class="card article-card">
                            <span class="badge badge-secondary"
                                  style="position: absolute; font-size: 16px; background-color: black; right: 4px; top: 4px;">{{ $article->category->title }}</span>
            <img class="card-img-top" src="{{ asset($article->preview) }}" alt="Image"
                 style="min-height: 100px">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="title">{{ $article->title }}</span>
                    <span class="likes float-right" style="float: right;">
                            {{ $article->likes_count }}
                        @guest
                            <i class="far fa-heart"></i>
                        @else
                            @if($article->isLikedByCurrentUser())
                                <form action="{{ route('public.like.destroy', $article->getCurrentUserLike()->id) }}"
                                      class="d-inline"
                                      method="POST">
                                                    @csrf
                                    @method('DELETE')
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-heart text-danger" role="button"></i>
                                                    </button>
                                                </form>
                            @else
                                <form action="{{ route('public.like.store') }}" class="d-inline"
                                      method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="far fa-heart" role="button"></i>
                                                    </button>
                                                </form>
                            @endif
                        @endguest
                                    </span>
                    <span class="views float-right" style="float: right">
                        {{ $article->view_qty }} <i class="fas fa-eye"></i> &nbsp;
                    </span>
                </h5>
                <p class="card-text">{{ $article->desc }}</p>
                <div class="tags">
                    @if($article->tags->count() > 0)
                        @foreach($article->tags AS $tag)
                            <span class="badge badge-primary mb-2"
                                  style="background-color: #5389fd; padding: 8px; font-size: 14px;">{{ $tag->title }}</span>
                        @endforeach
                    @else
                        &nbsp;
                    @endif
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('public.article.show', $article->id) }}" class="btn btn-primary">Читать</a>
            </div>
        </div>
    </div>
@endforeach
