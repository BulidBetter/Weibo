@extends('layouts.app')
@section('title', $title)

@section('content')
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @foreach ($users as $user)
                        <div class="list-group-item">
                            <img class="mr-3" src="{{ $user->gravatar(32) }}" alt="{{ $user->name }}" />
                            <a href="{{ route('users.show', $user) }}" title="">{{ $user->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
