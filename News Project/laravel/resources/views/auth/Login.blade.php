@extends('layouts.app')

@section('title', 'Log In - NewsHub')

@section('content')
<div class="ny-auth-wrapper">
    <h1 class="font-heading">Log In</h1>
    
    @if ($errors->any())
        <div style="color: #b12b2b; margin-bottom: 1rem; font-family: var(--font-sans); font-size: 0.875rem;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div class="ny-form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" class="ny-form-control" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="ny-form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="ny-form-control" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="ny-btn">Log In</button>
        </div>
    </form>
    
    <p class="text-center mt-4 font-sans text-small">
        Don't have an account? <a href="{{ route('register') }}">Create one</a>.
    </p>
</div>
@endsection