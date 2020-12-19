@extends('layouts.app')
@section('title', '注册')

@section('content')
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">用户注册</div>
            <div class="card-body">
                @include('shared._errors')
                <form action="{{ route('users.store') }}" method="post" autocapitalize="off">
                    @csrf
                    <div class="form-group">
                        <label for="name">昵称：</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input id="password" class="form-control" type="password" name="password" value="{{ old('password') }}" />
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                    </div>
                    <input class="btn btn-primary" type="submit" value="立即注册" />
                </form>
            </div>
        </div>
    </div>
@stop
