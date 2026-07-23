<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
</head>
<body>

<h1>Edit Article</h1>

<form action="{{ route('admin.articles.update', $article) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Title</label><br>
<input
    type="text"
    name="title"
    value="{{ old('title', $article->title) }}">
    
    <label>Summary</label><br>
    <textarea name="summary">{{ old('summary', $article->summary) }}</textarea><br><br>

    <label>Content</label><br>
    <textarea name="content" rows="10">{{ old('content', $article->content) }}</textarea><br><br>

    <label>Category</label><br>

    <select name="category">

        @foreach ([
            'Business',
            'Technology',
            'Sports',
            'Politics',
            'Arts',
            'Health',
            'Science',
            'Breaking News'
        ] as $category)

            <option
                value="{{ $category }}"
                {{ old('category', $article->category) == $category ? 'selected' : '' }}
            >
                {{ $category }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Tags</label><br>

    <input
    type="text"
    name="tags"
    value="{{ old('tags', implode(',', $article->tags ?? [])) }}"
    placeholder="AI,Laravel,PHP">

    <br><br>

    <label>
        <input
        type="checkbox"
        name="featured"
        {{ old('featured', $article->featured) ? 'checked' : '' }}>

        Featured Article
    </label>

    <br><br>

    <button type="submit">

        Update article

    </button>

</form>

</body>
</html>