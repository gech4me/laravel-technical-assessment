<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getachew - Laravel Livewire Assessment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen p-6">

<div class="max-w-4xl mx-auto space-y-10">

    <!-- Page Header -->
    <header class="text-center">
        <h1 class="text-3xl font-bold">Getachew - 🎬 Actor & Star Wars Explorer</h1>
        <p class="text-gray-600">Built with Laravel 12 + Livewire + Tailwind CSS</p>
    </header>

    <!-- Actor List Section -->
    <section class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Actors & Their Movies</h2>
        @livewire('actor-list')
    </section>

    <!-- Star Wars Search Section -->
    <section class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Search Star Wars Characters</h2>

        <!-- Optional Loading Spinner -->
        <div wire:loading wire:target="search" class="text-blue-500 mb-4">
            Searching the galaxy...
        </div>

        @livewire('star-wars-search')
    </section>

</div>

@livewireScripts
</body>
</html>