@extends('layouts.app')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="col-lg-12">
                <div class="col-lg-8 offset-lg-2">
                    <div class="user_info">
                        @include('shared._user_info', $user)
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
