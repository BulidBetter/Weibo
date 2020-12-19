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
            'email.email' => '邮箱必须是有效的电子邮件地址。',
            'password.required' => '密码不能为空。'
        ];

        $credentials = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->flash('success', '欢迎回来！');
            $route = route('users.show', [ Auth::user() ]);
            return redirect()->intended($route);
        } else {
            $request->session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');

        return redirect()->route('sessions.create');
    }
}
