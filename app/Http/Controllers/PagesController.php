<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(3);
        }
        return view('pages.index', [ 'feed_items' => $feed_items ]);
    }

    public function help()
    {
        return view('pages.help');
    }

    public function about()
    {
        return view('pages.about');
    }
}
