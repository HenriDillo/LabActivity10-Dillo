<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Barangay Bulletin – Purok Dillo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-100 text-stone-800 min-h-screen flex flex-col">
    <header class="bg-emerald-800 text-white shadow">
        <div class="max-w-5xl mx-auto px-4 py-5">
            <a href="{{ route('posts.index') }}" class="text-xl sm:text-2xl font-bold">Barangay Bulletin – Purok Dillo</a>
            <p class="text-emerald-100 text-sm">Barangay Matina Crossing Hall, Davao City</p>
        </div>
    </header>

    <main class="max-w-5xl w-full mx-auto px-4 py-6 flex-1">
        @yield('content')
    </main>

    <footer class="text-center text-sm text-stone-500 py-4">
        &copy; 2026 Barangay Matina Crossing Hall &middot; Lab Activity 10
    </footer>
</body>
</html>
