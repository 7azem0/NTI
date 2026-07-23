<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'articles' => Article::count(),
            'users' => User::count(),
        ]);
    }
}