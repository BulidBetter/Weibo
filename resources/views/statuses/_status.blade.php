<li class="media mt-3 my-3">
    <a href="{{ route('users.show', $user) }}" title="">
        <img class="gravatar mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" />
    </a>
    <div class="media-body">
        <h5 class="mt-0 my-1">{{ $user->name }} <small>/ {{ $status->created_at->diffForHumans() }}</small></h5>
        {{ $status->content }}
    </div>
    @can('destroy', $status)
        <form action="{{ route('statuses.destroy', $status) }}" method="post" onsubmit="return confirm('您确定要删除本条微博吗？');">
            @csrf
            @method('delete')
            <button class="btn btn-sm btn-danger" type="submit">删除</button>
        </form>
    @endcan
</li>
