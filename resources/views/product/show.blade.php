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

@if(session('success'))
    <div class="max-w-6xl mx-auto px-8 mt-6">
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg shadow">
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="max-w-6xl mx-auto px-8 mt-6">
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded-lg shadow">
            {{ session('error') }}
        </div>
    </div>
@endif

<div class="max-w-6xl mx-auto px-8 py-16 grid grid-cols-1 lg:grid-cols-2 gap-12">
    <div>
        <img src="/img/Handgemaakte-producten.jpg" alt="{{ $item->title }}" class="w-full rounded-lg object-cover">
    </div>

    <div>
        <h1 class="text-4xl font-bold mb-4">{{ $item['title'] }}</h1>

        @if(!empty($item['description']))
            <p class="text-gray-600 mb-4">{{ $item['description'] }}</p>
        @else
            <p class="text-gray-600 mb-4">Geen beschrijving beschikbaar.</p>
        @endif

        <p class="text-2xl font-bold text-gray-800 mb-6">{{ (int) $item['price'] }} credits</p>

        <div class="flex flex-col sm:flex-row gap-4">
            <form action="{{ route('cart.add', $item) }}" method="POST" class="flex items-center gap-4">
                @csrf
                <input type="number" name="quantity" value="1" min="1" class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    Voeg toe aan winkelmand
                </button>
            </form>

            @auth
                <form action="{{ route('items.buy', $item) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition">
                        Koop met credits
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition text-center">
                    Log in om te kopen
                </a>
            @endauth
        </div>
    </div>
</div>

@include('partials.footer')
</body>
</html>