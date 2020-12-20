@extends('layouts.app')
@section('title', '重置密码')

@section('content')
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">重置密码</div>
            <div class="card-body">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('password.store') }}" method="post" autocapitalize="off">
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="form-control-label">邮箱地址：</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <span class="form-text text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">发送密码重置邮件</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
