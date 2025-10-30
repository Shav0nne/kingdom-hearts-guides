<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kingdom Hearts II Guide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        khOcean: '#4da6ff',
                        khSky: '#87ceeb',
                        khSand: '#ffe9b6',
                        khGold: '#ffcc33',
                        khDark: '#0b132b',
                        khLight: '#f0f8ff',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    backgroundImage: {
                        ocean: "linear-gradient(180deg, #4da6ff 100%, #001f3f 50%)",
                    },
                    boxShadow: {
                        glow: '0 0 15px rgba(255, 204, 51, 0.6)',
                    }
                }
            }
        }
    </script>
</head>

<body class="h-full min-h-screen bg-ocean text-khLight font-sans">
<nav class="bg-khDark bg-opacity-70 backdrop-blur-md border-b border-khSky shadow-glow sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-6">
            <h1 class="text-2xl font-bold text-khGold tracking-widest drop-shadow-md mr-6">Kingdom Hearts II Guides</h1>
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/guides" :active="request()->is('guides')">Guides</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
        </div>

        <div class="flex items-center space-x-6">
            @auth
                @if(auth()->user()->is_admin)
                    <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
                @endif

                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="inline-block px-4 py-2 rounded text-white no-underline hover:opacity-90 transition-opacity hover:text-khGold transition">Log Out</button>
                </form>
            @else
                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
            @endauth
        </div>
    </div>
</nav>

<main class="max-w-5xl mx-auto mt-10 px-6">
    @isset($heading)
        <div class="mb-8 text-center">
            <h2 class="text-4xl font-bold text-khSky tracking-wider drop-shadow-md">{{ $heading }}</h2>
            <div class="mt-2 h-1 w-24 bg-khGold mx-auto rounded-full shadow-glow"></div>
        </div>
    @endisset

    <div class="bg-khDark bg-opacity-60 rounded-2xl shadow-lg p-8 border border-khSky backdrop-blur-sm">
        {{ $slot }}
    </div>
</main>

<footer class="mt-16 text-center text-sm text-khLight/70 pb-6">
    © 2025 Kingdom Hearts II Guides
</footer>
</body>
</html>
