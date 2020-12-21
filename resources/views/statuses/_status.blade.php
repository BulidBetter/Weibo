<li class="media mt-3 my-3">
    <a href="{{ route('users.show', $user) }}" title="">
        <img class="gravatar mr-3" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" />
    </a>
    <div class="media-body">
        <h5 class="mt-0 my-1">{{ $user->name }} <small>/ {{ $status->created_at->diffForHumans() }}</small></h5>
        {{ $status->content }}
    </div>
</li>
