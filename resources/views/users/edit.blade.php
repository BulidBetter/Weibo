@extends('layouts.app')
@section('title', '更新个人资料')

@section('content')
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">更新个人资料</div>
            <div class="card-body">
                @include('shared._errors')
                <div class="gravatar_edit">
                    <a href="http://gravatar.com/emails" target="_blank" title=""><img class="gravatar" src="{{ $user->gravatar(200) }}" alt="{{ $user->name }}" /></a>
                </div>
                <form action="{{ route('users.update', $user) }}" method="post" autocapitalize="off">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">昵称：</label>
                        <input id="name" class="form-control" type="text" name="name" autocomplete="off" value="{{ $user->name }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input id="email" class="form-control" type="email" name="email" disabled="disabled" autocomplete="off" value="{{ $user->email }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input id="password" class="form-control" type="password" name="password" autocomplete="off" value="{{ old('password') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" autocomplete="off" value="{{ old('password_confirmation') }}" />
                    </div>
                    <input class="btn btn-primary" type="submit" value="立即更新" />
                </form>
            </div>
        </div>
    </div>
@stop
