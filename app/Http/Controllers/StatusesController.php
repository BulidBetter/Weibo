<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $messages = [
            'content.required' => '内容不能为空。'
        ];

        $this->validate($request, [
            'content' => 'required'
        ], $messages);

        $content = $request['content'];

        $request->user()->statuses()->create([
            'content' => $content
        ]);

        $request->session()->flash('success', '发布成功！');

        return redirect()->back();
    }
}
