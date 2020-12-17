<a href="{{ route('users.show', $user) }}" title="">
    <img class="gravatar" src="{{ $user->gravatar(140) }}" alt="{{ $user->name }}" />
</a>
<h1>{{ $user->name }}</h1>
