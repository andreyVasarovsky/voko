<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="d-inline">Мои подписчики</h2>
        </div>
        <div class="col-12">
            @if(Auth::user()->subscribers->count())
                <table class="table table-hover hover-table-actions close-borders">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->subscribers AS $index => $subscriber)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>
                                <a href="{{ route('public.user.show', $subscriber->user->id) }}">{{ $subscriber->user->name }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-dark" role="alert">
                    У вас пока нет подписчиков!
                </div>
            @endif
        </div>
    </div>
</div>
