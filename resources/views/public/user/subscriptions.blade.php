<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="d-inline">Мои подписки</h2>
            <a href="{{ route('public.subscriptions.article.index') }}" class="action d-inline" style="font-size: 18px;">
                <i class="fas fa-eye"></i>
            </a>
        </div>
        <div class="col-12">
            @if(Auth::user()->subscriptions->count())
                <table class="table table-hover hover-table-actions close-borders">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Автор</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Auth::user()->subscriptions AS $index => $subscription)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>
                                <a href="{{ route('public.user.show', $subscription->subscribe_user->id) }}">{{ $subscription->subscribe_user->name }}</a>
                            </td>
                            <td class="actions" style="font-size: 14px;">
                                <form
                                    action="{{ route('public.subscription.destroy', $subscription->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-secondary bg-transparent border-0 action">
                                        <i class="fas fa-minus-square"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-dark" role="alert">
                    Вы пока не подписались ни на кого!
                </div>
            @endif
        </div>
    </div>
</div>
