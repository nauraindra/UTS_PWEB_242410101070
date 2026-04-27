@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-[65vh] flex items-center justify-center">
    <div class="max-w-md w-full bg-white/15 backdrop-blur rounded-2xl p-8 shadow-lg">
        <h2 class="text-3xl font-bold mb-4">Login</h2>
        <p class="text-m text-black mb-6">Masukkan Username dan Password anda.</p>

        <form method="POST" action="{{ route('doLogin') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xl mb-1 text-black">Username</label>
                <input type="text" name="username" required
                    class="text-black text-xl w-full rounded-lg px-3 py-2 bg-transparent border border-black focus:outline-none focus:ring-2 focus:ring-pink-500" />
            </div>

            <div>
                <label class="block text-xl mb-1 text-black">Password</label>
                <input type="password" name="password" required
                    class="text-black text-xl w-full rounded-lg px-3 py-2 bg-transparent border border-black focus:outline-none focus:ring-2 focus:ring-pink-500" />
            </div>

            <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg mt-2">
                Login
            </button>
        </form>
    </div>
</div>
@endsection
