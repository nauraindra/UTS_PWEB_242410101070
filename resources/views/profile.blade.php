@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-md mx-auto">
    {{-- Header --}}
    <div class="text-center mb-8">
        <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-tr from-purple-500 to-indigo-500 flex items-center justify-center shadow overflow-hidden">
            @php
                $fotoPath = 'images/naura.jpeg';
                $fotoExists = file_exists(public_path($fotoPath));
            @endphp
            @if($fotoExists)
                <img src="{{ asset($fotoPath) }}" alt="Foto" class="w-full h-full object-cover">
            @else
                <span class="text-3xl font-bold text-white uppercase">
                    {{ substr($profile['username'], 0, 1) }}
                </span>
            @endif
        </div>
        <h3 class="mt-4 text-xl font-bold">{{ $profile['username'] }}</h3>
        <p class="text-gray-500 text-sm">{{ $profile['status'] ?? 'Member' }}</p>
    </div>

    {{-- Informasi --}}
    <div class="space-y-4">
        <div class="border-b border-gray-200 pb-3">
            <p class="text-xs text-gray-400 mb-1">HOBI</p>
            <p class="text-gray-800">{{ $profile['hobi'] }}</p>
        </div>

        <div class="border-b border-gray-200 pb-3">
            <p class="text-xs text-gray-400 mb-1">FILM FAVORIT</p>
            <p class="text-gray-800">Inception, Interstellar, Parasite</p>
        </div>

        <div class="border-b border-gray-200 pb-3">
            <p class="text-xs text-gray-400 mb-1">SUTRADARA FAVORIT</p>
            <p class="text-gray-800">Christopher Nolan, Bong Joon-ho</p>
        </div>
    </div>
</div>
@endsection