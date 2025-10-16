<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kingdom Hearts Tips & Guide</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        khBlue: '#1e3a8a',
                        khLightBlue: '#60a5fa',
                        khDark: '#0f172a',
                        khGold: '#facc15',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    backgroundImage: {
                        'stars': "radial-gradient(circle at 50% 20%, rgba(255,255,255,0.15), transparent 70%), linear-gradient(to bottom, #1e3a8a, #0f172a)",
                    }
                }
            }
        }
    </script>
</head>

<body class="h-full min-h-screen bg-stars text-white font-sans">
<nav class="bg-khDark bg-opacity-70 backdrop-blur-md border-b border-khLightBlue shadow-md sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-khLightBlue tracking-wide">Tips & Guides</h1>
        <div class="flex space-x-6">
            <x-nav-link href="/" class="hover:text-khGold transition">Home</x-nav-link>
            <x-nav-link href="/guide" class="hover:text-khGold transition">Guide</x-nav-link>
            <x-nav-link href="/about" class="hover:text-khGold transition">About</x-nav-link>
            <x-nav-link href="/contact" class="hover:text-khGold transition">Contact</x-nav-link>
            <x-nav-link href="{{ route('login') }}" class="hover:text-khGold transition">Log In</x-nav-link>
            <x-nav-link href="{{ route('register') }}" class="hover:text-khGold transition">Register</x-nav-link>
        </div>
    </div>
</nav>

<main class="max-w-5xl mx-auto mt-10 px-6">

    @isset($heading)
        <div class="mb-8 text-center">
            <h2 class="text-4xl font-bold text-khLightBlue tracking-wider drop-shadow-md">
                {{ $heading }}
            </h2>
            <div class="mt-2 h-1 w-24 bg-khGold mx-auto rounded-full"></div>
        </div>
    @endisset

    <div class="bg-khDark bg-opacity-70 rounded-2xl shadow-lg p-8 border border-khBlue">
        {{ $slot }}
    </div>
</main>

<footer class="mt-16 text-center text-sm text-gray-400 pb-6">
    © 2025 Kingdom Hearts Tips & Guide
</footer>
</body>
</html>
