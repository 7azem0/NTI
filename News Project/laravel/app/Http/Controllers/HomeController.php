<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class HomeController extends Controller
{
    public function index()
    {
        $featured = Article::where('featured', true)
            ->latest()
            ->first();

        $latest = Article::latest()
            ->take(10)
            ->get();

        return view('home', compact(
            'featured',
            'latest'
        ));
    }

    public function show($slug)
    {
        $article = Article::with('author')
        ->where('slug', $slug)
        ->firstOrFail();

        return view('news.show', compact('article'));
    }
}
