<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item['title'] }} - MakersMarkt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">

@include('partials.header')

<div class="max-w-6xl mx-auto px-8 py-16 grid grid-cols-1 lg:grid-cols-2 gap-12">
    <!-- Afbeelding -->
    <div>
        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full rounded-lg object-cover">
    </div>

    <!-- Product info -->
    <div>
        <h1 class="text-4xl font-bold mb-4">{{ $item['title'] }}</h1>
        <p class="text-gray-600 mb-4">Beschrijving van het product hier...</p>
        <p class="text-2xl font-bold text-gray-800 mb-6">€{{ number_format($item['price'], 2) }}</p>

        <form action="{{ route('cart.add', $index) }}" method="POST" class="flex items-center gap-4">
            @csrf
            <input type="number" name="quantity" value="1" min="1"
                   class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center">
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Voeg toe aan winkelmand
            </button>
        </form>
    </div>
</div>

@include('partials.footer')
</body>
</html>