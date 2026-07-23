@extends('layouts.admin')

@section('title', 'Manage Articles - Editorial Backend')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem;">
    <h2 class="font-heading m-0" style="font-size: 2.25rem; margin: 0;">Articles Repository</h2>
    <a href="{{ route('admin.articles.create') }}" class="ny-btn" style="width: auto; padding: 0.5rem 1rem;">+ New Article</a>
</div>

@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 1rem; margin-bottom: 2rem; font-family: var(--font-sans); font-size: 0.875rem; border-radius: 2px;">
        {{ session('success') }}
    </div>
@endif

<div class="ny-table-wrapper">
    <table class="ny-table">
        <thead>
            <tr>
                <th>Title & Meta</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Published Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
                <tr>
                    <td>
                        <strong style="font-family: var(--font-serif-heading); font-size: 1.125rem;">
                            <a href="{{ route('news.show', $article->slug ?? $article->id) }}" target="_blank" style="color: var(--color-text-main);">
                                {{ $article->title }}
                            </a>
                        </strong>
                        <div style="color: var(--color-text-muted); font-size: 0.75rem; margin-top: 0.25rem;">
                            ID: {{ $article->id }}
                        </div>
                    </td>
                    <td>
                        <span class="ny-badge">{{ $article->category }}</span>
                    </td>
                    <td>{{ $article->author->name ?? 'N/A' }}</td>
                    <td>
                        @if($article->featured)
                            <span class="ny-badge ny-badge-featured">Featured</span>
                        @else
                            <span class="ny-badge">Standard</span>
                        @endif
                    </td>
                    <td>
                        {{ $article->published_at ? $article->published_at->format('M d, Y') : 'Draft' }}
                    </td>
                    <td class="ny-action-links">
                        <a href="{{ route('admin.articles.edit', $article) }}">Edit</a>
                        
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="padding: 3rem 1rem; color: var(--color-text-muted);">
                        No articles found in the repository.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection