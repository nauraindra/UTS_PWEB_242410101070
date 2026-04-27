<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title') — Naura's Movies</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .hero-gradient {
            background: radial-gradient(ellipse at bottom, rgba(255, 154, 236, 0.22) 0%, rgba(255, 180, 241, 0.12) 20%, rgba(0,0,0,0.9) 60%),
                        linear-gradient(180deg, #ff01bb 0%, #ff83e4 40%, #ff6abc 100%);
            background-blend-mode: overlay;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col text-white bg-white">

    @if(session()->has('username'))
        <x-navbar :username="session('username')" />
    @else

        @unless(Request::routeIs('login'))
        <div class="container mx-auto px-6 py-6 flex justify-end">
            <a href="{{ route('login') }}" class="inline-block bg-black text-white font-semibold px-4 py-2 rounded-full shadow hover:opacity-90 transition">
                Login
            </a>
        </div>
        @endunless
    @endif

    <main class='grow container mx-auto'>
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>
