@foreach($article->comments AS $comment)
    <div class="row mb-3" style="border-bottom: solid 1px #d3d3d3;">
        <div class="col-2">
            <a href="{{ route('public.user.show', $comment->user->id) }}"><strong>{{ $comment->user->name }}</strong></a>
            <br>
            <span style="font-size: 12px;">{{ $comment->dateDiff() }}</span>
        </div>
        <div class="col-10">
            {{ $comment->text }}
        </div>
    </div>
@endforeach
