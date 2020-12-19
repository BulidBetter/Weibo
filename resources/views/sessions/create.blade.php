@extends('layouts.app')
@section('title', '登录')

@section('content')
    <div class="offset-lg-2 col-lg-8">
        <div class="card">
            <div class="card-header">用户登录</div>
            <div class="card-body">
                @include('shared._errors')
                <form action="{{ route('sessions.store') }}" method="post" autocapitalize="off">
                    @csrf
                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input id="password" class="form-control" type="password" name="password" value="{{ old('password') }}" />
                    </div>
                    <input class="btn btn-primary" type="submit" value="立即登录" />
                </form>
            </div>
            <div class="card-footer text-right">还没账号？<a href="#" title="">现在注册！</a></div>
        </div>
    </div>
@stop
