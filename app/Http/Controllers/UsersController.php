<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $message = [
            'name.required' => '昵称不能为空。',
            'name.unique' => '该昵称已存在。',
            'email.required' => '邮箱不能为空。',
            'email.email' => '该邮箱不是有效的邮箱地址。',
            'email.unique' => '该邮箱已被注册。',
            'password.required' => '密码不能为空。',
            'password.confirmed' => '两次密码输入不一致。'
        ];

        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ], $message);

        return [];
    }

    public function show(User $user)
    {
        return view('users.show', [ 'user' => $user ]);
    }
}
