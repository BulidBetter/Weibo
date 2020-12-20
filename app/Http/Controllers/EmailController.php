<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function store($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();
        $user->activated = true;
        $user->activation_token = null;
        $user->save();
        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');

        return redirect()->route('users.show', [ 'user' => $user ]);
    }
}
