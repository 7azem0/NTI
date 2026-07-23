<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::with('author')
            ->latest()
            ->get();

        return view('articles.index', compact('articles'));
    }


    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'required|string',
        'content' => 'required|string',
        'category' => 'required|string',
        'tags' => 'nullable|string',
        'featured' => 'nullable',]);

    Article::create([
        'title' => $validated['title'],
        'slug' => Str::slug($validated['title']),
        'summary' => $validated['summary'],
        'content' => $validated['content'],
        'category' => $validated['category'],
        'tags' => $validated['tags']
            ? array_map('trim', explode(',', $validated['tags']))
            : [],
        'featured' => $request->has('featured'),
        'user_id' => Auth::id(),
        'published_at' => now(),]);

    return redirect()->route('admin.articles.index');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'required|string',
        'content' => 'required|string',
        'category' => 'required|string',
        'tags' => 'nullable|string',
    ]);

    $article->update([

        'title' => $validated['title'],

        'slug' => Str::slug($validated['title']),

        'summary' => $validated['summary'],

        'content' => $validated['content'],

        'category' => $validated['category'],

        'tags' => $validated['tags']
            ? array_map('trim', explode(',', $validated['tags']))
            : [],

        'featured' => $request->has('featured'),

    ]);

    return redirect()
        ->route('admin.articles.index')
        ->with('success', 'Article updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
{
    $article->delete();

    return redirect()
        ->route('admin.articles.index')
        ->with('success', 'Article deleted successfully.');
}
}
