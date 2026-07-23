@extends('layouts.app')

@section('content')

@if(Auth::check() && Auth::user()->is_admin)
    <div style="background-color: var(--color-bg-alt); padding: 1rem; border: 1px solid var(--color-border); margin-top: 1rem; margin-bottom: 1rem; display: flex; justify-content: space-between; align-items: center;">
        <span style="font-family: var(--font-sans); font-weight: 600; font-size: 0.875rem; text-transform: uppercase;">Staff Access</span>
        <a href="{{ route('admin.dashboard') }}" class="ny-btn" style="width: auto; padding: 0.5rem 1rem; background-color: #b12b2b; border-color: #b12b2b;">Go to Editorial Backend</a>
    </div>
@endif

<div class="ny-grid mt-4">

    <!-- Featured Section -->
    <div class="ny-col-span-2">
        <div class="ny-featured-article">
            @if($featured)
                <article>
                    <span class="ny-category-tag">Top Story</span>
                    <h2>
                        <a href="{{ route('news.show', $featured->slug) }}">
                            {{ $featured->title }}
                        </a>
                    </h2>
                    <div class="summary">
                        {{ $featured->summary }}
                    </div>
                    <div class="ny-meta">
                        @if($featured->author)
                            By <span style="font-weight: 700; color: var(--color-text-main);">{{ $featured->author->name }}</span>
                            <span style="margin: 0 4px;">|</span>
                        @endif
                        {{ $featured->published_at?->format('M. d, Y') }}
                    </div>
                </article>
            @else
                <p class="text-muted font-sans" style="font-style: italic;">No top story featured at this time.</p>
            @endif
        </div>
        
        <hr class="border-top mb-4" style="margin-top: 2rem;">
        
        <div class="font-sans text-uppercase text-small border-top-thick pt-1 mb-3" style="display:inline-block; border-top: 2px solid var(--color-border-dark); padding-top: 4px; font-weight: 700;">More Top Stories</div>
        
        <div class="ny-grid" style="grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 0;">
            @php $count = 0; @endphp
            @forelse($latest as $article)
                @if($featured && $article->id === $featured->id)
                    @continue
                @endif
                @php $count++; @endphp
                @if($count <= 4)
                    <article class="ny-article-item" style="border-bottom: none; padding-bottom: 0;">
                        <h3>
                            <a href="{{ route('news.show', $article->slug) }}">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <p class="summary">{{ \Illuminate\Support\Str::limit($article->summary, 80) }}</p>
                        <div class="ny-meta">
                            {{ $article->published_at?->diffForHumans() }}
                        </div>
                    </article>
                @endif
            @empty
                <!-- Handled in side column -->
            @endforelse
        </div>
    </div>

    <!-- Side Column for Latest -->
    <div class="ny-col-span-1">
        <div class="font-sans text-uppercase text-small mb-3" style="border-top: 1px solid var(--color-border-dark); padding-top: 4px; font-weight: 700;">The Latest</div>
        
        @php $sideCount = 0; @endphp
        @forelse($latest as $article)
            @if($featured && $article->id === $featured->id)
                @continue
            @endif
            @php $sideCount++; @endphp
            @if($sideCount > 4 || $count == 0)
                <article class="ny-article-item">
                    <span class="ny-category-tag" style="color: var(--color-text-muted);">{{ $article->category ?? 'News' }}</span>
                    <h3>
                        <a href="{{ route('news.show', $article->slug) }}">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p class="summary">{{ $article->summary }}</p>
                    <div class="ny-meta">
                        {{ $article->published_at?->format('M. d, Y') }}
                    </div>
                </article>
            @endif
        @empty
            @if($count == 0)
                <p class="text-muted font-sans">No articles have been published yet.</p>
            @endif
        @endforelse
    </div>

</div>

@endsection