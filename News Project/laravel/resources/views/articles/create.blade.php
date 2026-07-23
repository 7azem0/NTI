@extends('layouts.admin')

@section('title', 'Create Article - Editorial Backend')

@section('content')

<h2 class="font-heading mb-4" style="font-size: 2.25rem;">Compose Article</h2>

<div class="ny-auth-wrapper" style="max-width: 800px; margin: 0;">
    <form action="{{ route('admin.articles.store') }}" method="POST">
        @csrf

        <div class="ny-form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="ny-form-control" style="font-family: var(--font-serif-heading); font-size: 1.5rem;" required autofocus>
        </div>

        <div class="ny-form-group">
            <label for="summary">Summary</label>
            <textarea id="summary" name="summary" class="ny-form-control" rows="3" required></textarea>
        </div>

        <div class="ny-form-group">
            <label for="content">Article Body</label>
            <textarea id="content" name="content" class="ny-form-control" rows="12" style="font-family: var(--font-serif-body); font-size: 1.125rem;" required></textarea>
        </div>

        <div class="ny-grid" style="grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 0;">
            <div class="ny-form-group">
                <label for="category">Category</label>
                <select id="category" name="category" class="ny-form-control">
                    <option>Business</option>
                    <option>Technology</option>
                    <option>Sports</option>
                    <option>Politics</option>
                    <option>Arts</option>
                    <option>Health</option>
                    <option>Science</option>
                    <option>Breaking News</option>
                </select>
            </div>
            <div class="ny-form-group">
                <label for="tags">Tags (comma separated)</label>
                <input type="text" id="tags" name="tags" class="ny-form-control" placeholder="AI, Laravel, PHP">
            </div>
        </div>

        <div class="ny-form-group" style="margin-top: 1rem;">
            <label style="display: flex; align-items: center; cursor: pointer;">
                <input type="checkbox" name="featured" style="margin-right: 0.5rem; width: 1.25rem; height: 1.25rem;">
                Set as Featured Article
            </label>
        </div>

        <div class="mt-4" style="border-top: 1px solid var(--color-border); padding-top: 1.5rem;">
            <button type="submit" class="ny-btn" style="width: auto;">Publish Article</button>
            <a href="{{ route('admin.articles.index') }}" style="margin-left: 1rem; color: var(--color-text-muted); font-family: var(--font-sans); font-weight: 600;">Cancel</a>
        </div>
    </form>
</div>

@endsection