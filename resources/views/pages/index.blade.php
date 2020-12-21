@extends('layouts.app')
@section('title', '主页')

@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-lg-8">
                <div class="status_form">
                    @include("shared._status_form")
                </div>
                <h4>微博列表</h4>
                <hr />
                @include('shared._feed', [ 'user' => Auth::user() ])
            </div>
            <div class="col-lg-4">
                <div class="user_info">
                    @include('shared._user_info', [ 'user' => Auth::user() ])
                </div>
                <div class="stats mt-2">
                    @include('shared._stats', [ 'user' => Auth::user() ])
                </div>
            </div>
        </div>
    @else
        <div class="jumbotron">
            <h1>Hello Laravel</h1>
            <p class="lead">你现在所看到的是 <a href="https://learnku.com/courses/laravel-essential-training">Laravel 入门教程</a> 的示例项目主页。</p>
            <p>一切，将从这里开始。</p>
            <a class="btn btn-lg btn-success" href="{{ route('register') }}" title="">现在注册</a>
        </div>
    @endif
@stop
