@can('follow', $user)
    <div class="text-center mt-2 my-3">
        @if (Auth::user()->isFollowing($user->id))
            <form action="{{ route('followers.destroy', $user) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-outline-danger" type="submit">取消关注</button>
            </form>
        @else
            <form action="{{ route('followers.store', $user) }}" method="post">
                @csrf
                <button class="btn btn-sm btn-outline-primary" type="submit">关注</button>
            </form>
        @endif
    </div>
@endcan
