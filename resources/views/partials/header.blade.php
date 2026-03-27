<nav class="flex justify-between items-center px-8 py-4 bg-gray-100 border-b border-gray-300 relative">

    <!-- LOGO -->
    <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800 hover:text-gray-600 transition">
        Makers<span class="text-gray-500">Markt</span>
    </a>

    <!-- ZOEK -->
    <form method="GET" action="{{ route('home') }}" class="flex-1 mx-10 max-w-md">
        <input type="text" name="q" placeholder="Zoeken..."
               class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-400">
    </form>

    <div class="flex items-center gap-6 relative">

        <!-- WINKELMAND -->
        @php
            $cart = session('cart', []);
            $cartCount = 0;
            $total = 0;

            foreach ($cart as $item) {
                $quantity = $item['quantity'] ?? 0;
                $price = $item['price'] ?? 0;

                $cartCount += $quantity;
                $total += $price * $quantity;
            }
        @endphp

        <div class="relative group">

            <!-- Icoon -->
            <div class="cursor-pointer relative text-xl">
                🛒

                @if($cartCount > 0)
                    <span class="absolute -top-2 -right-3 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                        {{ $cartCount }}
                    </span>
                @endif
            </div>

            <!-- DROPDOWN -->
            <div class="absolute right-0 mt-4 w-80 bg-white shadow-xl rounded-xl p-4 opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-50">

                <h4 class="font-semibold mb-3 text-gray-800">Winkelmand</h4>

                @forelse($cart as $index => $item)
                    <div class="flex items-center gap-3 mb-4 border-b pb-3">

                        <!-- IMAGE -->
                        <img src="{{ $item['image'] ?? '' }}" class="w-12 h-12 object-cover rounded">

                        <!-- INFO -->
                        <div class="flex-1">
                            <p class="text-sm font-medium">{{ $item['title'] ?? 'Product' }}</p>
                            <p class="text-xs text-gray-500">
                                €{{ number_format($item['price'] ?? 0, 2) }}
                            </p>
                        </div>

                        <!-- AANTAL -->
                        <form action="{{ route('cart.update', $index) }}" method="POST" class="flex items-center gap-1">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] ?? 1 }}" min="1"
                                   class="w-12 text-center border rounded text-sm">
                            <button class="text-xs bg-gray-200 px-2 rounded hover:bg-gray-300">
                                ✓
                            </button>
                        </form>

                        <!-- VERWIJDER -->
                        <form action="{{ route('cart.remove', $index) }}" method="POST">
                            @csrf
                            <button class="text-red-500 text-sm hover:text-red-700">
                                ✕
                            </button>
                        </form>

                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Je winkelmand is leeg</p>
                @endforelse

                <!-- TOTAAL -->
                @if($cartCount > 0)
                    <div class="mt-4 border-t pt-4">

                        <p class="font-semibold text-gray-800 mb-3">
                            Totaal: €{{ number_format($total, 2) }}
                        </p>

                        <a href="{{ route('cart.index') }}"
                           class="block w-full text-center bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-600 transition">
                           Bekijk winkelmand
                        </a>

                        <button class="w-full mt-2 bg-green-600 text-white py-2 rounded-lg hover:bg-green-500 transition">
                            Doorgaan naar betalen
                        </button>

                    </div>
                @endif

            </div>
        </div>

        @auth
            <!-- CREDIT -->
            <div class="bg-yellow-100 text-yellow-800 px-4 py-2 rounded-lg text-sm font-semibold border border-yellow-300">
                Credits: {{ auth()->user()->credit }}
            </div>

            <!-- ACCOUNT MENU -->
            <div class="relative group">
                <button type="button"
                        class="bg-white border border-gray-300 px-4 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition">
                    {{ auth()->user()->name ?? auth()->user()->email }}
                </button>

                <div class="absolute right-0 mt-3 w-56 bg-white shadow-xl rounded-xl py-2 opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-50 border border-gray-200">
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name ?? 'Gebruiker' }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                    </div>

                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        Dashboard
                    </a>

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                        Profiel bekijken
                    </a>

                    @if((auth()->user()->role ?? null) === 'seller')
                        @if(Route::has('items.create'))
                            <a href="{{ route('items.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                Item verkopen
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                Verkopen
                            </a>
                        @endif
                    @endif

                    <div class="border-t border-gray-100 mt-2 pt-2 px-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-2 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition">
                                Uitloggen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        @guest
            <!-- LOGIN -->
            <a href="{{ route('login') }}"
               class="bg-gray-800 text-white px-5 py-2 rounded-lg text-sm hover:bg-gray-600 transition">
               Inloggen
            </a>
        @endguest

    </div>
</nav>