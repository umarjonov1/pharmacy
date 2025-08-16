<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function comment()
    {
        $comments = Comment::all();
        return view('admin.comment', compact('comments'));
    }
}
