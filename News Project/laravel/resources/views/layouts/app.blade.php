<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="NewsHub - Daily News and Insights">
    <title>@yield('title', 'NewsHub - Breaking News')</title>

    <!-- Vite Styles/Scripts -->
    @vite(['resources/css/nytimes.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <!-- Masthead Header -->
        <header class="ny-masthead">
            <div class="ny-masthead-top">
                <div class="ny-date">
                    {{ now()->format('l, F j, Y') }}<br>
                    Today's Paper
                </div>
                <div class="ny-auth-links">
                    @auth
                        <span>Welcome, {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') ?? '#' }}" style="display:inline; margin-left: 0.5rem;">
                            @csrf
                            <button type="submit" style="background:none;border:none;color:var(--color-text-main);font-size:inherit;font-family:inherit;font-weight:inherit;cursor:pointer;text-transform:uppercase;">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Log In</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </div>
            
            <div class="ny-logo-container">
                <h1 class="ny-logo"><a href="{{ route('home') }}" style="color: inherit; text-decoration: none;">NewsHub</a></h1>
            </div>
            
            <nav class="ny-masthead-nav">
                <a href="{{ route('home') }}">U.S.</a>
                <a href="{{ route('home') }}">World</a>
                <a href="{{ route('home') }}">Business</a>
                <a href="{{ route('home') }}">Arts</a>
                <a href="{{ route('home') }}">Lifestyle</a>
                <a href="{{ route('home') }}">Opinion</a>
                <a href="{{ route('home') }}">Audio</a>
                <a href="{{ route('home') }}">Games</a>
            </nav>
        </header>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="border-top-thick py-4 mt-4" style="margin-bottom: 2rem;">
            <div class="text-center font-sans text-small text-muted">
                <p>&copy; {{ date('Y') }} The NewsHub Company. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
