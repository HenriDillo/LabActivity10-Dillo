@extends('layouts.app')

@section('title', $post->title . ' – Barangay Bulletin – Purok Dillo')

@section('content')
    <a href="{{ route('posts.index') }}" class="text-sm text-emerald-700 hover:underline">&larr; Back to all posts</a>

    <article class="mt-4 rounded-lg bg-white p-5 sm:p-8 shadow-sm border border-stone-200">
        <div class="flex flex-wrap items-center gap-2 mb-3">
            @if ($post->is_pinned)
                <span class="rounded bg-amber-100 px-2 py-0.5 text-xs font-semibold text-amber-800">Pinned</span>
            @endif
            <span class="rounded bg-emerald-100 px-2 py-0.5 text-xs font-semibold text-emerald-800">{{ $post->category }}</span>
        </div>

        <h1 class="text-2xl sm:text-3xl font-bold">{{ $post->title }}</h1>
        <p class="mt-2 text-sm text-stone-500">
            {{ $post->published_at->format('F d, Y') }} &middot; Author #{{ $post->author_id }} &middot; {{ $post->views }} views
        </p>

        <div class="mt-6 space-y-4 leading-relaxed">
            @foreach (preg_split('/\R{2,}/', $post->body) as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </article>
@endsection
