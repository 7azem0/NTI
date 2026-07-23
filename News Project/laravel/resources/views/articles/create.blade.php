<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
</head>
<body>

<h1>Create Article</h1>

<form action="{{ route('admin.articles.store') }}" method="POST">

    @csrf

    <label>Title</label><br>
    <input type="text" name="title"><br><br>

    <label>Summary</label><br>
    <textarea name="summary"></textarea><br><br>

    <label>Content</label><br>
    <textarea name="content" rows="10"></textarea><br><br>

    <label>Category</label><br>

    <select name="category">

        <option>Business</option>
        <option>Technology</option>
        <option>Sports</option>
        <option>Politics</option>
        <option>Arts</option>
        <option>Health</option>
        <option>Science</option>
        <option>Breaking News</option>

    </select>

    <br><br>

    <label>Tags</label><br>

    <input
        type="text"
        name="tags"
        placeholder="AI,Laravel,PHP"
    >

    <br><br>

    <label>
        <input
            type="checkbox"
            name="featured"
        >

        Featured Article
    </label>

    <br><br>

    <button type="submit">

        Publish

    </button>

</form>

</body>
</html>