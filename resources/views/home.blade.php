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

</body>
</html>
