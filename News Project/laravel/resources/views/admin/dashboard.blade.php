<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>

<h1>Admin Dashboard</h1>

<hr>

<h2>Statistics</h2>

<p>Total Articles: {{ $articles }}</p>

<p>Total Users: {{ $users }}</p>

<hr>

<h2>Management</h2>

<ul>

    <li>
        <a href="{{ route('admin.articles.index') }}">
            Manage Articles
        </a>
    </li>

    <li>
        <a href="#">
            Manage Users
        </a>
    </li>

    <li>
        <a href="#">
            Manage Subscription Plans
        </a>
    </li>

</ul>

</body>
</html>