<h1>Welcome to NewsHub</h1>

@if(Auth::check())
    <p>Hello, {{ Auth::user()->name }}</p>
@else
    <p>You are not logged in.</p>
@endif