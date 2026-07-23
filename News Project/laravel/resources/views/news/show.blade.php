@extends('layouts.app')

@section('title', $article->title . ' - NewsHub')

@section('content')

<article class="ny-article-reading">
    
    <div class="mb-3 text-center">
        <span class="ny-category-tag" style="display:inline-block;">{{ $article->category }}</span>
        @if($article->featured)
            <span class="ny-category-tag" style="display:inline-block; margin-left:10px; color: #b12b2b;">Featured</span>
        @endif
    </div>

    <h1>{{ $article->title }}</h1>

    <div class="summary text-center" style="font-size: 1.25rem; color: var(--color-text-muted); margin-bottom: 2rem; font-family: var(--font-serif-body);">
        {{ $article->summary }}
    </div>

    <div class="ny-article-author-date">
        <div class="author">
            By {{ $article->author->name ?? 'NewsHub Staff' }}
        </div>
        <div class="date">
            @if($article->published_at)
                Published {{ $article->published_at->format('M. d, Y') }}
            @else
                Draft
            @endif
        </div>
    </div>

    <div class="ny-article-content">
        @php
            $content = e($article->content);
            $paragraphs = explode("\n", $content);
        @endphp
        @foreach($paragraphs as $p)
            @if(trim($p) !== '')
                <p>{!! trim($p) !!}</p>
            @endif
        @endforeach
    </div>

    @if($article->tags && is_array($article->tags) && count($article->tags) > 0)
    <div class="ny-tags">
        @foreach($article->tags as $tag)
            <span class="ny-tag">{{ $tag }}</span>
        @endforeach
    </div>
    @endif

</article>

@endsection