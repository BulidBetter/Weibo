<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\String\s;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [ 'index', 'show', 'create', 'store' ]
        ]);

        $this->middleware('guest', [
            'only' => [ 'create' ]
        ]);

        $this->middleware('throttle:10, 60', [
            'only' => [ 'store' ]
        ]);
    }

    public function index(User $user)
    {
        $users = $user->paginate(7);
        return view('users.index', [ 'users' => $users ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => '昵称不能为空。',
            'name.unique' => '该昵称已存在。',
            'email.required' => '邮箱不能为空。',
            'email.email' => '邮箱必须是有效的电子邮件地址。',
            'email.unique' => '该邮箱已被注册。',
            'password.required' => '密码不能为空。',
            'password.confirmed' => '两次密码输入不一致。'
        ];

        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $this->sendEmailConfirmationTo($user);
        $request->session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');

        return redirect('/');
    }

    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = [ 'user' => $user ];
        $from = '75692074@qq.com';
        $name = 'Build Better';
        $to = $user->email;
        $subject = "感谢注册 Weibo 应用！请确认你的邮箱。";

        Mail::send($view, $data, function(Message $message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    public function show(User $user)
    {
        return view('users.show', [ 'user' => $user ]);
    }

    public function edit(User $user)
    {
        $this->authorize('own', $user);
        return view('users.edit', [ 'user' => $user ]);
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('own', $user);
        $messages = [
            'name.required' => '昵称不能为空。',
            'password.confirmed' => '两次密码输入不一致。'
        ];

        $this->validate($request, [
            'name' => 'required',
            'password' => 'nullable|confirmed'
        ], $messages);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = $request->password;
        }

        $user->update($data);
        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', [ 'user' => $user ]);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return redirect()->back();
    }
}
