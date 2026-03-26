<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakersMarkt - Homepage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">

@include('partials.header')

<!-- HERO -->
<section class="w-full relative bg-cover bg-center h-[600px]" style="background-image: url('/img/Handgemaakte-producten.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative max-w-6xl mx-auto h-full flex items-center px-8">
        <div class="text-left text-white max-w-lg">
            <h2 class="text-5xl font-bold mb-4">Welkom op MakersMarkt</h2>
            <p class="text-xl mb-8">Ontdek unieke, handgemaakte producten van talentvolle makers</p>
            <a href="#products" class="bg-white text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200">Bekijk Producten</a>
        </div>
    </div>
</section>

<!-- PRODUCT CARDS -->
<section id="products" class="max-w-6xl mx-auto px-8 py-16">
    <h3 class="text-3xl font-bold mb-12 text-gray-800 text-center">Onze Producten</h3>

    @if($query)
        <p class="text-center mb-6 text-gray-500">Resultaten voor: <strong>{{ $query }}</strong></p>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($items as $item)
            <div class="bg-white shadow-lg rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-56 object-cover transition-transform duration-300 hover:scale-110">
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $item['title'] }}</h4>
                        <p class="text-gray-600 font-medium mb-4">€{{ number_format($item['price'], 2) }}</p>
                    </div>
                    <a href="{{ route('product.show', $item['index']) }}" class="mt-auto bg-gray-800 text-white w-full py-2 rounded-lg hover:bg-gray-600 text-center">
                        Bekijk Product
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">Geen producten gevonden voor "{{ $query }}"</p>
        @endforelse
    </div>
</section>

@include('partials.footer')
</body>
</html>