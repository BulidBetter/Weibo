<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'email.required' => '邮箱不能为空。',
            'email.email' => '邮箱不是有效的邮箱地址。',
            'password.required' => '密码不能为空。'
        ];

        $credentials = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->flash('success', '欢迎回来！');
            $route = route('users.show', [ $request->user() ]);
            return redirect()->intended($route);
        } else {
            $request->session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

        return;
    }
}
