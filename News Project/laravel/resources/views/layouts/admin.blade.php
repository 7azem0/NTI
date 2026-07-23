<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'NewsHub Editorial')</title>

    <!-- Vite Styles/Scripts -->
    @vite(['resources/css/nytimes.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container" style="max-width: 1000px;">
        
        <header class="ny-admin-header">
            <h1 class="ny-admin-title">NewsHub <span style="font-family: var(--font-sans); font-size: 1rem; font-weight: 500; text-transform: uppercase; letter-spacing: 2px; color: var(--color-text-muted); vertical-align: middle; margin-left: 10px;">Editorial Backend</span></h1>
            
            <nav class="ny-admin-nav">
                <a href="{{ route('home') }}">View Site</a>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a href="{{ route('admin.articles.index') }}">Articles</a>
                
                <form method="POST" action="{{ route('logout') ?? '#' }}" style="display:inline; margin-left: 1.5rem;">
                    @csrf
                    <button type="submit" style="background:none;border:none;color:var(--color-text-main);font-size:inherit;font-family:inherit;font-weight:inherit;cursor:pointer;text-transform:uppercase;">Logout</button>
                </form>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>
        
        <footer class="border-top-thick py-4 mt-4" style="margin-bottom: 2rem;">
            <div class="text-center font-sans text-small text-muted">
                <p>&copy; {{ date('Y') }} The NewsHub Company. Administrative System.</p>
            </div>
        </footer>
    </div>
</body>
</html>
