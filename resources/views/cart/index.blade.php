@extends('layouts.app')

@section('title', 'Panier - ROYAL PAWS')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="baroque-divider">
            <span class="ornament">🛒</span>
        </div>
        <h1 class="text-3xl font-bold mb-8 text-center font-cinzel gold-gradient-text tracking-wider">
            Votre Panier Royal
        </h1>

        @if($cartItems->count() > 0)
            <div class="royal-card mb-8">
                <div class="space-y-6">
                    @foreach($cartItems as $item)
                        <div class="flex flex-col md:flex-row gap-6 pb-6 last:border-0" style="border-bottom: 2px solid var(--gold, rgba(201,168,76,0.2));">
                            <!-- Product Image -->
                            <div class="w-full md:w-48 h-48 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center flex-shrink-0">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-5xl">🐾</span>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2 font-cinzel" style="color: var(--gold);">
                                    {{ $item->product->name }}
                                </h3>
                                <p class="text-gray-500 mb-4 text-sm">{{ $item->product->description }}</p>

                                <div class="flex items-center justify-between flex-wrap gap-4">
                                    <div>
                                        <p class="text-xl font-bold" style="color: var(--gold);">
                                            {{ number_format($item->product->price, 0, ',', ' ') }} DA
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            Stock disponible : {{ $item->product->quantity }}
                                        </p>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <!-- Update Quantity -->
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <label for="quantity-{{ $item->id }}" class="font-semibold text-sm">Qté:</label>
                                            <input type="number"
                                                   id="quantity-{{ $item->id }}"
                                                   name="quantity"
                                                   value="{{ $item->quantity }}"
                                                   min="1"
                                                   max="{{ $item->product->quantity }}"
                                                   class="w-20 px-3 py-2 border-2 rounded-lg text-center focus:outline-none" style="border-color: var(--gold);"
                                                   onchange="this.form.submit()">
                                        </form>

                                        <!-- Remove Item -->
                                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 text-right">
                                    <p class="text-lg font-semibold">
                                        Sous-total : <span style="color: var(--gold);">{{ number_format($item->quantity * $item->product->price, 0, ',', ' ') }} DA</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Total & Checkout -->
            <div class="royal-card">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div>
                        <p class="text-2xl font-bold" style="color: var(--gold);">
                            Total : {{ number_format($total, 0, ',', ' ') }} DA
                        </p>
                        <p class="text-sm text-gray-500 mt-2">
                            {{ $cartItems->sum('quantity') }} {{ $cartItems->sum('quantity') > 1 ? 'articles' : 'article' }}
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('home') }}" class="royal-btn-outline">
                            Continuer les achats
                        </a>
                        <button class="royal-btn" onclick="alert('Fonctionnalité de paiement à venir !')">
                            Procéder au paiement
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="malachite-card text-center py-16">
                <div class="relative z-10">
                    <span class="text-6xl mb-4 block">🛒</span>
                    <h2 class="text-2xl font-bold mb-2 gold-text font-cinzel">Votre panier est vide</h2>
                    <p class="opacity-60 mb-6">Découvrez notre collection royale !</p>
                    <a href="{{ route('home') }}" class="royal-btn inline-block">
                        Voir les produits
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
