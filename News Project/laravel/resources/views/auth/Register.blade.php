<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

    <h1>Create Account</h1>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div>
            <label>Name</label><br>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
            >
        </div>

        <br>

        <div>
            <label>Email</label><br>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
            >
        </div>

        <br>

        <div>
            <label>Password</label><br>
            <input
                type="password"
                name="password"
            >
        </div>

        <br>

        <div>
            <label>Confirm Password</label><br>
            <input
                type="password"
                name="password_confirmation"
            >
        </div>

        <br>

        <button type="submit">
            Register
        </button>

    </form>

</body>
</html>