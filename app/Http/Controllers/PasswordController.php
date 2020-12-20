<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:5, 5', [
            'only' => [ 'store' ]
        ]);
    }

    public function index()
    {
        return view('passwords.index');
    }

    public function store(Request $request)
    {
        $messages = [
            'email.required' => '邮箱不能为空。',
            'email.email' => '邮箱必须是有效的电子邮件地址。'
        ];

        $request->validate([
            'email' => 'required|email'
        ]);
        $email = $request->email;

        $user = User::where("email", $email)->first();

        if (is_null($user)) {
            session()->flash('danger', '该邮箱未注册');
            return redirect()->back()->withInput();
        }

        $token = hash_hmac('sha256', Str::random(40), config('app.key'));

        DB::table('password_resets')->updateOrInsert(['email' => $email], [
            'email' => $email,
            'token' => Hash::make($token),
            'created_at' => new Carbon,
        ]);

        Mail::send('emails.reset_link', [ 'token' => $token ], function ($message) use ($email) {
            $message->to($email)->subject("忘记密码");
        });

        session()->flash('success', '重置邮件发送成功，请查收');
        return redirect()->back()->withInput();
    }

    public function edit(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('passwords.reset', [ 'token' => $token ]);
    }

    public function update(Request $request)
    {
        $messages = [
            'token.required' => 'token 不能为空。',
            'email.required' => '邮箱不能为空。',
            'email.email' => '邮箱必须是有效的电子邮件地址。',
            'password.required' => '密码不能为空。',
            'password_confirmation.required' => '确认密码不能为空。',
            'password.confirmed' => '两次密码输入不一致。'
        ];

        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ], $messages);

        $email = $request->email;
        $token = $request->token;

        $expires = 60 * 10;

        $user = User::where('email', $email)->first();

        if (is_null($user)) {
            $request->session()->flash('danger', '该邮箱未注册。');

            return redirect()->back()->withInput();
        }

        $record = (array) DB::table('password_resets')->where('email', $email)->first();
        if ($record) {
            if (Carbon::parse($record['created_at'])->addSeconds($expires)->isPast()) {
                $request->session()->flash('danger', '链接已过期，请重新尝试！');

                return redirect()->back();
            }

            if (!Hash::check($token, $record['token'])) {
                $request->session()->flash('danger', '令牌错误！');

                return redirect()->back()->withInput();
            }

            $user->update([
                'password' => $request->password
            ]);

            $request->session()->flash('success', '密码重置成功，请使用新密码登录！');

            return redirect()->route('login');
        }

        $request->session()->flash('danger', '未找到重置记录。');

        return redirect()->back()->withInput();
    }
}
