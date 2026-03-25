<!-- resources/views/partials/header.blade.php -->
<nav class="flex justify-between items-center px-8 py-4 bg-gray-100 border-b border-gray-300 shadow-sm">
    <div class="text-2xl font-bold text-gray-800 hover:text-gray-600 transition cursor-pointer">MakersMarkt</div>
    <div class="flex-1 mx-10 max-w-md">
        <form action="{{ route('home') }}" method="GET">
            <input name="q" type="text" placeholder="Zoeken..." value="{{ request('q') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 transition">
        </form>
    </div>
    <a href="{{ route('login') }}" class="bg-gray-800 text-white px-5 py-2 rounded-lg text-sm hover:bg-gray-600 transition transform hover:scale-105">Inloggen</a>
</nav>