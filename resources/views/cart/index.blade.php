<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelmand</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">

@include('partials.header')

<div class="max-w-6xl mx-auto px-8 py-16">

    <h1 class="text-3xl font-bold mb-8">Jouw Winkelmand</h1>

    @php
        $total = 0;
    @endphp

    @forelse($cart as $index => $item)
        @php
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        @endphp

        <div class="flex items-center gap-6 bg-white p-4 rounded-lg shadow mb-4">

            <img src="{{ $item['image'] }}" class="w-24 h-24 object-cover rounded">

            <div class="flex-1">
                <h3 class="font-semibold">{{ $item['title'] }}</h3>
                <p>€{{ number_format($item['price'], 2) }}</p>
            </div>

            <!-- AANTAL -->
            <form action="{{ route('cart.update', $index) }}" method="POST">
                @csrf
                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
                       class="w-20 border rounded px-2 py-1">
                <button class="ml-2 bg-gray-200 px-3 py-1 rounded">Update</button>
            </form>

            <!-- VERWIJDER -->
            <form action="{{ route('cart.remove', $index) }}" method="POST">
                @csrf
                <button class="text-red-500">Verwijder</button>
            </form>

        </div>

    @empty
        <p>Je winkelmand is leeg</p>
    @endforelse

    <!-- TOTAAL -->
    @if(count($cart) > 0)
        <div class="mt-8 bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">
                Totaal: €{{ number_format($total, 2) }}
            </h2>

            <button class="w-full bg-gray-800 text-white py-3 rounded-lg hover:bg-gray-600">
                Doorgaan naar betalen
            </button>
        </div>
    @endif

</div>

</body>
</html>