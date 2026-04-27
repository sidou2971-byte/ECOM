@extends('layouts.app')

@section('title', 'Ma Liste de Souhaits - ROYAL PAWS')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="baroque-divider">
            <span class="ornament">❤️</span>
        </div>
        <h1 class="text-3xl font-bold mb-8 text-center font-cinzel gold-gradient-text tracking-wider">
            Ma Liste de Souhaits
        </h1>

        @if($wishlists->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($wishlists as $wishlist)
                    <div class="royal-card relative">
                        <div class="mb-4 rounded-lg overflow-hidden bg-gray-100 h-52 flex items-center justify-center relative">
                            @if($wishlist->product->image)
                                <img src="{{ asset('storage/' . $wishlist->product->image) }}" alt="{{ $wishlist->product->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-center text-gray-400">
                                    <span class="text-5xl">🐾</span>
                                </div>
                            @endif
                            <form action="{{ route('wishlist.remove', $wishlist) }}" method="POST" class="absolute top-2 right-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition text-sm">
                                    ✕
                                </button>
                            </form>
                        </div>

                        <h3 class="text-base font-bold mb-1 font-cinzel" style="color: var(--gold);">{{ $wishlist->product->name }}</h3>
                        <p class="text-gray-500 mb-3 text-xs line-clamp-2">{{ $wishlist->product->description }}</p>

                        <div class="mb-3 pb-3" style="border-bottom: 1px solid rgba(201,168,76,0.2);">
                            @if($wishlist->product->discount_price)
                                <p class="text-2xl font-bold" style="color: var(--gold);">{{ number_format($wishlist->product->discount_price, 0, ',', ' ') }} <span class="text-sm">DA</span></p>
                                <p class="text-xs text-gray-400 line-through">{{ number_format($wishlist->product->price, 0, ',', ' ') }} DA</p>
                                <span class="inline-block px-2 py-0.5 bg-red-100 text-red-700 rounded-md text-[0.65rem] font-bold mt-1">
                                    -{{ $wishlist->product->discount_percentage }}%
                                </span>
                            @else
                                <p class="text-2xl font-bold" style="color: var(--gold);">{{ number_format($wishlist->product->price, 0, ',', ' ') }} <span class="text-sm">DA</span></p>
                            @endif
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('products.show', $wishlist->product) }}" class="royal-btn-outline flex-1 text-center text-[0.65rem] py-2">
                                DÉTAILS
                            </a>
                            @if($wishlist->product->quantity > 0)
                                <form action="{{ route('cart.add', $wishlist->product) }}" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="royal-btn w-full text-[0.65rem] py-2">
                                        🛒 AJOUTER
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="malachite-card text-center py-16">
                <div class="relative z-10">
                    <span class="text-6xl mb-4 block">❤️</span>
                    <h2 class="text-2xl font-bold mb-2 gold-text font-cinzel">Votre liste de souhaits est vide</h2>
                    <p class="opacity-60 mb-6">Ajoutez des produits à votre liste !</p>
                    <a href="{{ route('home') }}" class="royal-btn inline-block">
                        Voir les produits
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
