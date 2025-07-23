<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Pemesanan Kue') }}</title>

    {{-- Tailwind CSS & Livewire Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-rose-600">
                Pemesanan Kue
            </a>
            <div>
                {{-- Tambahkan navigasi lainnya jika perlu --}}
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-white mt-12 shadow-inner">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Pemesanan Kue. All rights reserved.
        </div>
    </footer>

    {{-- Livewire Scripts --}}
    @livewireScripts
</body>
</html>
