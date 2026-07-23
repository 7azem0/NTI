<!DOCTYPE html>
<html>

<head>
    <title>Manage Articles</title>
</head>

<body>

<h1>Manage Articles</h1>

<a href="{{ route('admin.dashboard') }}">
    Dashboard
</a>

|

<a href="{{ route('admin.articles.create') }}">
    Create Article
</a>

<hr>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Featured</th>
        <th>Published</th>
        <th>Actions</th>
    </tr>

    @forelse($articles as $article)

        <tr>

            <td>{{ $article->id }}</td>

            <td>{{ $article->title }}</td>

            <td>{{ $article->category }}</td>

            <td>{{ $article->author->name }}</td>

            <td>

                @if($article->featured)

                    ⭐

                @else

                    —

                @endif

            </td>

            <td>

                {{ $article->published_at?->format('Y-m-d') }}

            </td>

            <td>

                <a href="{{ route('admin.articles.edit', $article) }}">
                    Edit
                </a>

                |

                <form
                    action="{{ route('admin.articles.destroy', $article) }}"
                    method="POST"
                    style="display:inline"
                >

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="7">

                No articles found.

            </td>

        </tr>

    @endforelse

</table>

</body>
</html>