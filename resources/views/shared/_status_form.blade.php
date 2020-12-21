<form action="{{ route('statuses.store') }}" method="post">
    @csrf
    @include('shared._errors')
    <textarea class="form-control" rows="3" name="content" placeholder="聊聊新鲜事儿...">{{ old('content') }}</textarea>
    <div class="text-right">
        <button class="btn btn-primary mt-3" type="submit">立即发布</button>
    </div>
</form>
