<!DOCTYPE html>
<html>
<head>
    <title>NewsHub</title>
</head>
<body>

<h1>📰 NewsHub</h1>

@if(Auth::check())
    <p>Welcome, {{ Auth::user()->name }}</p>
@else
    <p>
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('register') }}">Register</a>
    </p>
@endif

<hr>

@if($featured)
    <h2>⭐ Featured Article</h2>

    <h3>
        <a href="{{ route('news.show', $featured->slug) }}">
            {{ $featured->title }}
        </a>
    </h3>

    <p>{{ $featured->summary }}</p>

    <hr>
@endif

<h2>Latest News</h2>

@forelse($latest as $article)

    <div>

        <h3>
            <a href="{{ route('news.show', $article->slug) }}">
                {{ $article->title }}
            </a>
        </h3>

        <p>{{ $article->summary }}</p>

        <small>
            {{ $article->category }}
            |
            {{ $article->published_at?->format('M d, Y') }}
        </small>

    </div>

    <hr>

@empty

    <p>No articles have been published yet.</p>

@endforelse

</body>
</html>