@extends('layouts.app')

@section('title', 'Daftar Film')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h4 class="mb-6 text-2xl font-bold text-black">Film yang Pernah Saya Tonton</h4>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($movies as $movie)
        <div class="bg-white/10 backdrop-blur-sm rounded-xl shadow-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <div class="h-48 overflow-hidden bg-gray-800">
                @if(isset($movie['poster']) && $movie['poster'])
                    <img src="{{ $movie['poster'] }}" alt="{{ $movie['judul'] }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center text-black">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M7 4v16M17 4v16M3 8h18M3 16h18" />
                        </svg>
                    </div>
                @endif
            </div>

            <div class="p-4">
                <h5 class="text-xl font-bold text-black mb-2">{{ $movie['judul'] }}</h5>

                <div class="space-y-1 text-sm text-black">
                    <p><span class="font-semibold">Tahun:</span> {{ $movie['tahun'] }}</p>
                    <p><span class="font-semibold">Genre:</span> {{ $movie['genre'] }}</p>
                    <p><span class="font-semibold">Sutradara:</span> {{ $movie['sutradara'] }}</p>
                </div>

                <div class="mt-3">
                    @if($movie['status'] === 'Sudah Ditonton')
                        <span class="inline-block px-3 py-1 rounded-full bg-green-500/80 text-black text-xs font-semibold">{{ $movie['status'] }}</span>
                    @elseif($movie['status'] === 'Belum Ditonton')
                        <span class="inline-block px-3 py-1 rounded-full bg-red-500/80 text-white text-xs font-semibold">{{ $movie['status'] }}</span>
                    @else
                        <span class="inline-block px-3 py-1 rounded-full bg-yellow-400/90 text-black text-xs font-semibold">{{ $movie['status'] }}</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection