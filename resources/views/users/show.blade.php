@extends('layouts.app')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="user_info">
                @include('shared._user_info', $user)
            </div>
            <div class="status">
                @if ($statuses->count() > 0)
                    <ul class="list-unstyled">
                        @foreach ($statuses as $status)
                            @include('statuses._status')
                        @endforeach
                    </ul>
                    <div class="mt-3">
                        {{ $statuses->links() }}
                    </div>
                @else
                    <p>没有数据！</p>
                @endif
            </div>
        </div>
    </div>
@stop
