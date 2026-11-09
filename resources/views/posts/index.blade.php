@extends('layouts.app')

@section('title', 'Barangay Bulletin – Purok Dillo')

@section('content')
    <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col sm:flex-row gap-2 mb-6">
        <input name="q" value="{{ request('q') }}" placeholder="Search title"
               class="flex-1 rounded border border-stone-300 bg-white px-3 py-2">
        <select name="category" class="rounded border border-stone-300 bg-white px-3 py-2">
            <option value="">All categories</option>
            @foreach ($categories as $c)
                <option value="{{ $c }}" @selected(request('category') === $c)>{{ $c }}</option>
            @endforeach
        </select>
        <button class="rounded bg-emerald-700 px-4 py-2 text-white hover:bg-emerald-800">Filter</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse ($posts as $post)
            <article class="rounded-lg bg-white p-4 shadow-sm border {{ $post->is_pinned ? 'border-amber-400' : 'border-stone-200' }}">
                <div class="flex flex-wrap items-center gap-2 mb-2">
                    @if ($post->is_pinned)
                        <span class="rounded bg-amber-100 px-2 py-0.5 text-xs font-semibold text-amber-800">Pinned</span>
                    @endif
                    <span class="rounded bg-emerald-100 px-2 py-0.5 text-xs font-semibold text-emerald-800">{{ $post->category }}</span>
                </div>
                <h2 class="text-lg font-semibold">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a>
                </h2>
                <p class="mt-2 text-sm text-stone-500">
                    {{ $post->published_at->format('M d, Y') }} &middot; Author #{{ $post->author_id }} &middot; {{ $post->views }} views
                </p>
            </article>
        @empty
            <p class="md:col-span-2 text-stone-500">No posts match your search.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    <p class="mt-2 text-sm text-stone-500">
        Showing {{ $posts->firstItem() }}–{{ $posts->lastItem() }} of {{ $posts->total() }} posts
    </p>
@endsection
