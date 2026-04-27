@extends('layouts.app')

@section('title', $product->name . ' - ROYAL PAWS')

@section('content')
    <div class="max-w-6xl mx-auto">
        <a href="{{ route('home') }}" class="inline-block mb-4 text-sm transition hover:opacity-80" style="color: var(--gold);">
            ← Retour à la collection
        </a>

        <div class="royal-card">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="rounded-lg overflow-hidden bg-gray-100 h-96 flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-center text-gray-400">
                            <span class="text-8xl">🐾</span>
                            <p class="mt-4 text-sm">Image bientôt disponible</p>
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div>
                    <div class="mb-4">
                        <span class="inline-block px-3 py-1 rounded-md text-xs font-semibold
                            @if($product->category === 'cat') bg-blue-50 text-blue-700 border border-blue-200
                            @elseif($product->category === 'dog') bg-orange-50 text-orange-700 border border-orange-200
                            @else bg-emerald-50 text-emerald-700 border border-emerald-200
                            @endif">
                            @if($product->category === 'cat')
                                🐱 Chat
                            @elseif($product->category === 'dog')
                                🐶 Chien
                            @else
                                🐦 Oiseau
                            @endif
                        </span>
                    </div>

                    <h1 class="text-3xl font-bold mb-4 font-cinzel" style="color: var(--gold);">
                        {{ $product->name }}
                    </h1>

                    <div class="mb-6 pb-4" style="border-bottom: 1px solid rgba(201,168,76,0.2);">
                        @if($product->discount_price)
                            <p class="text-4xl font-bold" style="color: var(--gold);">
                                {{ number_format($product->discount_price, 0, ',', ' ') }} <span class="text-lg">DA</span>
                            </p>
                            <p class="text-lg text-gray-400 line-through">
                                {{ number_format($product->price, 0, ',', ' ') }} DA
                            </p>
                            <span class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded-md text-xs font-bold mt-2 font-cinzel">
                                -{{ $product->discount_percentage }}% DE RÉDUCTION
                            </span>
                        @else
                            <p class="text-4xl font-bold" style="color: var(--gold);">
                                {{ number_format($product->price, 0, ',', ' ') }} <span class="text-lg">DA</span>
                            </p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <p class="font-semibold mb-2 text-sm">Disponibilité :</p>
                        @if($product->quantity > 0)
                            <p class="text-emerald-600 font-semibold">
                                ✓ En stock — {{ $product->quantity }} {{ $product->quantity > 1 ? 'unités' : 'unité' }} disponible{{ $product->quantity > 1 ? 's' : '' }}
                            </p>
                        @else
                            <p class="text-red-500 font-semibold">
                                ✗ Rupture de stock
                            </p>
                        @endif
                    </div>

                    <!-- Wishlist Button -->
                    @auth
                        @php
                            $inWishlist = auth()->user()->wishlists()->where('product_id', $product->id)->exists();
                        @endphp
                        <form action="{{ route('wishlist.toggle', $product) }}" method="POST" class="mb-4">
                            @csrf
                            <button type="submit" class="royal-btn-outline w-full">
                                @if($inWishlist)
                                    ❤️ Retirer de la liste de souhaits
                                @else
                                    🤍 Ajouter à la liste de souhaits
                                @endif
                            </button>
                        </form>
                    @endauth

                    @if($product->quantity > 0)
                        <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-4">
                            @csrf
                            <div class="flex gap-4 items-center mb-4">
                                <label for="quantity" class="font-semibold text-sm">Quantité :</label>
                                <input type="number"
                                       id="quantity"
                                       name="quantity"
                                       value="1"
                                       min="1"
                                       max="{{ $product->quantity }}"
                                       class="w-20 px-3 py-2 border-2 rounded-lg text-center focus:outline-none" style="border-color: var(--gold);">
                            </div>
                            <div class="flex gap-4">
                                <button type="submit" class="royal-btn flex-1">
                                    🛒 Ajouter au panier
                                </button>
                                <a href="{{ route('cart.index') }}" class="royal-btn-outline flex-1 text-center">
                                    Voir le panier
                                </a>
                            </div>
                        </form>
                    @else
                        <div class="p-4 bg-red-50 rounded-lg text-center">
                            <p class="text-red-500 font-semibold text-sm">Ce produit n'est actuellement pas disponible.</p>
                        </div>
                    @endif

                    <!-- Features -->
                    <div class="mt-8 pt-8" style="border-top: 2px solid var(--gold);">
                        <h3 class="text-lg font-bold mb-4 font-cinzel" style="color: var(--gold);">Caractéristiques</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <span class="text-3xl mb-2 block">🍗</span>
                                <p class="font-semibold text-sm">Ingrédients Premium</p>
                            </div>
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <span class="text-3xl mb-2 block">✅</span>
                                <p class="font-semibold text-sm">Nutrition Vétérinaire</p>
                            </div>
                            <div class="text-center p-4 bg-gray-50 rounded-lg">
                                <span class="text-3xl mb-2 block">🦴</span>
                                <p class="font-semibold text-sm">Os & Articulations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
