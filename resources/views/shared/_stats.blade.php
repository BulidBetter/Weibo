<a href="{{ route('users.followings', $user) }}" title="">
    <strong id="following" class="stat">
        {{ count($user->followings) }}
    </strong>
    关注
</a>
<a href="{{ route('users.followers', $user) }}" title="">
    <strong id="followers" class="stat">
        {{ count($user->followers) }}
    </strong>
    粉丝
</a>
<a href="{{ route("users.show", $user) }}" title="">
    <strong id="statuses" class="stat">
        {{ $user->statuses()->count() }}
    </strong>
    微博
</a>
