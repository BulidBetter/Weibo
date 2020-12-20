@extends('layouts.app')
@section('title', '更新密码')

@section('content')
    <div class="col-lg-10 offset-lg-1">
        <div class="card">
            <div class="card-header">修改密码</div>
            <div class="card-body">
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="token" value="{{ $token }}" />
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label text-lg-right" for="email">邮箱地址：</label>
                        <div class="col-lg-6">
                            <input class="form-control {{ $errors->has('email') ?  'is-invalid' : '' }}" type="email" name="email" value="{{ $email ?? old('email') }}" />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label text-lg-right" for="password">密码：</label>
                        <div class="col-lg-6">
                            <input class="form-control {{ $errors->has('password') ?  'is-invalid' : '' }}" type="password" name="password" value="{{ old('password') }}" />
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label text-lg-right" for="password_confirmation">确认密码：</label>
                        <div class="col-lg-6">
                            <input class="form-control {{ $errors->has('password_confirmation') ?  'is-invalid' : '' }}" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 offset-lg-4">
                            <button class="btn btn-primary" type="submit">重置密码</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
