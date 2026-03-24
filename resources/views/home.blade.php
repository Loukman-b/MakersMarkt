<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakersMarkt - Homepage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <nav class="flex justify-between items-center px-8 py-4 bg-gray-100 border-b border-gray-300">
        <div class="text-2xl font-bold text-gray-800">logo</div>
        
        <div class="flex-1 mx-10 max-w-md">
            <input type="text" placeholder="Zoeken..." class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
        </div>
        
        <button class="bg-gray-800 text-white px-5 py-2 rounded-lg text-sm hover:bg-gray-600 transition">Inloggen</button>
    </nav>

    <section class="w-full bg-cover bg-center py-20" style="background-image: url('/images/Handgemaakte-producten.jpg');">
        
            <div class="max-w-6xl mx-auto px-8">
                <h2 class="text-5xl font-bold text-white mb-4">Welkom op MakersMarkt</h2>
                <p class="text-xl text-gray-100 mb-8">Ontdek unieke, handgemaakte producten van talentvolle makers</p>
                <button class="bg-white text-gray-800 px-8 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">Bekijk Producten</button>
            </div>

    </section>

    <section class="w-full py-16 bg-white">
        <div class="max-w-6xl mx-auto px-8">
            <h3 class="text-4xl font-bold text-gray-800 mb-12">Onze Producten</h3>
            
            <div class="grid grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                        <div class="w-full h-48 bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">Foto</span>
                        </div>
                        
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->title }}</h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-gray-800">€{{ $product->price }}</span>
                                <button class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-600 transition">Bekijk</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</body>
</html>
