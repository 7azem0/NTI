<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<form action="{{ url('/login') }}" method="POST">
    @csrf

    <div>
        <label>Email</label><br>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >
    </div>

    <br>

    <div>
        <label>Password</label><br>
        <input
            type="password"
            name="password"
            required
        >
    </div>

    <br>

    <button type="submit">
        Login
    </button>

</form>

</body>
</html>