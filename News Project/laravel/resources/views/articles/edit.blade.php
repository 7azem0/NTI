@extends('layouts.admin')

@section('title', 'Edit Article - Editorial Backend')

@section('content')

<h2 class="font-heading mb-4" style="font-size: 2.25rem;">Edit Article</h2>

<div class="ny-auth-wrapper" style="max-width: 800px; margin: 0;">
    <form action="{{ route('admin.articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="ny-form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="ny-form-control" style="font-family: var(--font-serif-heading); font-size: 1.5rem;" value="{{ old('title', $article->title) }}" required autofocus>
        </div>

        <div class="ny-form-group">
            <label for="summary">Summary</label>
            <textarea id="summary" name="summary" class="ny-form-control" rows="3" required>{{ old('summary', $article->summary) }}</textarea>
        </div>

        <div class="ny-form-group">
            <label for="content">Article Body</label>
            <textarea id="content" name="content" class="ny-form-control" rows="12" style="font-family: var(--font-serif-body); font-size: 1.125rem;" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="ny-grid" style="grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 0;">
            <div class="ny-form-group">
                <label for="category">Category</label>
                <select id="category" name="category" class="ny-form-control">
                    @foreach (['Business', 'Technology', 'Sports', 'Politics', 'Arts', 'Health', 'Science', 'Breaking News'] as $category)
                        <option value="{{ $category }}" {{ old('category', $article->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="ny-form-group">
                <label for="tags">Tags (comma separated)</label>
                <input type="text" id="tags" name="tags" class="ny-form-control" value="{{ old('tags', implode(',', $article->tags ?? [])) }}" placeholder="AI, Laravel, PHP">
            </div>
        </div>

        <div class="ny-form-group" style="margin-top: 1rem;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="featured" style="margin-right: 0.5rem; width: 1.25rem; height: 1.25rem;" {{ old('featured', $article->featured) ? 'checked' : '' }}>
                Set as Featured Article
            </label>
        </div>

        <div class="mt-4" style="border-top: 1px solid var(--color-border); padding-top: 1.5rem;">
            <button type="submit" class="ny-btn" style="width: auto;">Update Article</button>
            <a href="{{ route('admin.articles.index') }}" style="margin-left: 1rem; color: var(--color-text-muted); font-family: var(--font-sans); font-weight: 600;">Cancel</a>
        </div>
    </form>
</div>

@endsection