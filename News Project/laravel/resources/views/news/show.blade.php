<!DOCTYPE html>
<html>
<head>
    <title>{{ $article->title }} | NewsHub</title>
</head>
<body>

<a href="{{ route('home') }}">← Back to Home</a>

<h1>{{ $article->title }}</h1>

@if($article->featured)
    <p><strong>⭐ Featured Article</strong></p>
@endif

<p>
    <strong>Category:</strong>
    {{ $article->category }}
</p>

<p>
    <strong>Author:</strong>
    {{ $article->author->name }}
</p>

@if($article->published_at)
    <p>
        <strong>Published:</strong>
        {{ $article->published_at->format('M d, Y') }}
    </p>
@endif

<hr>

<h2>Summary</h2>

<p>{{ $article->summary }}</p>

<hr>

<h2>Article</h2>

<p>{!! nl2br(e($article->content)) !!}</p>

@if($article->tags)

<hr>

<h3>Tags</h3>

@foreach($article->tags as $tag)
    <span>#{{ $tag }}</span>
@endforeach

@endif

</body>
</html>