<!DOCTYPE html>
<html lang="en">

{{-- resources/views/components/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Reservasi Kecantikan' }}</title>

    {{-- Vite + Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Livewire Styles --}}
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    {{-- Navbar --}}
    <nav class="bg-white shadow px-6 py-4 mb-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-xl font-semibold text-pink-600">Salon Cantik</div>
            <div>
                <a href="/" class="text-gray-700 hover:text-pink-600">Home</a>
            </div>
        </div>
    </nav>

    {{-- Slot konten --}}
    <main class="max-w-6xl mx-auto px-4">
        {{ $slot }}
    </main>

    {{-- Livewire Scripts --}}
    @livewireScripts
</body>
</html>
