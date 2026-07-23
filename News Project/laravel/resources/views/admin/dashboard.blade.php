@extends('layouts.admin')

@section('title', 'Dashboard - Editorial Backend')

@section('content')

<h2 class="font-heading mb-4" style="font-size: 2.25rem;">Overview</h2>

<div class="ny-grid" style="grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 3rem;">
    <div class="ny-stat-card">
        <div class="value">{{ $articles ?? 0 }}</div>
        <div class="label">Total Published Articles</div>
    </div>

    <div class="ny-stat-card">
        <div class="value">{{ $users ?? 0 }}</div>
        <div class="label">Registered Users</div>
    </div>
</div>

<hr class="border-top-thick mb-4">

<h3 class="font-sans text-uppercase text-small mb-3">Quick Actions</h3>

<div style="display: flex; gap: 1.5rem; margin-bottom: 2rem;">
    <a href="{{ route('admin.articles.create') }}" class="ny-btn" style="width: auto;">Write New Article</a>
    <a href="{{ route('admin.articles.index') }}" class="ny-btn" style="width: auto; background-color: var(--color-bg); color: var(--color-text-main);">Manage Articles</a>
</div>

@endsection