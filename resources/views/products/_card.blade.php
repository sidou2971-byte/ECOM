<div class="royal-card relative group overflow-hidden">
    <!-- Wishlist Button -->
    @auth
        @php
            $inWishlist = auth()->user()->wishlists()->where('product_id', $product->id)->exists();
        @endphp
        <form action="{{ route('wishlist.toggle', $product) }}" method="POST" class="absolute top-5 right-5 z-10">
            @csrf
            <button type="submit" class="bg-white/90 rounded-full p-2 shadow-lg hover:scale-110 transition-transform">
                @if($inWishlist)
                    <span class="text-red-500 text-lg">❤️</span>
                @else
                    <span class="text-gray-300 text-lg">🤍</span>
                @endif
            </button>
        </form>
    @endauth

    <!-- Promotion Badge -->
    @if($product->discount_price)
        <div class="absolute top-5 left-5 z-10">
            <span class="bg-red-600 text-white px-3 py-1 rounded-md text-[0.65rem] font-bold shadow-md font-cinzel tracking-wider">
                -{{ $product->discount_percentage }}%
            </span>
        </div>
    @endif

    <!-- Product Image -->
    <div class="mb-4 rounded-lg overflow-hidden bg-gradient-to-br from-gray-50 to-gray-100 h-52 flex items-center justify-center -mx-1.5 -mt-1.5">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        @else
            <div class="text-center text-gray-300">
                <span class="text-5xl">🐾</span>
                <p class="mt-1 text-xs text-gray-400">Image bientôt disponible</p>
            </div>
        @endif
    </div>

    <!-- Product Info -->
    <div>
        <h3 class="text-base font-bold mb-1 font-cinzel tracking-wide leading-tight" style="color: var(--gold, #c9a84c);">
            {{ $product->name }}
        </h3>

        @if($product->category)
            <div class="mb-2">
                <span class="inline-block px-2 py-0.5 rounded-md text-[0.65rem] font-semibold
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
        @endif

        <p class="text-gray-500 mb-3 text-xs line-clamp-2 leading-relaxed">{{ $product->description }}</p>

        <!-- Price in DA -->
        <div class="mb-3 pb-3" style="border-bottom: 1px solid rgba(201,168,76,0.2);">
            @if($product->discount_price)
                <p class="text-2xl font-bold" style="color: var(--gold, #c9a84c);">{{ number_format($product->discount_price, 0, ',', ' ') }} <span class="text-sm">DA</span></p>
                <p class="text-xs text-gray-400 line-through">{{ number_format($product->price, 0, ',', ' ') }} DA</p>
            @else
                <p class="text-2xl font-bold" style="color: var(--gold, #c9a84c);">{{ number_format($product->price, 0, ',', ' ') }} <span class="text-sm">DA</span></p>
            @endif
            <p class="text-[0.65rem] mt-1">
                @if($product->quantity > 0)
                    <span class="text-emerald-600 font-semibold">✓ En stock ({{ $product->quantity }})</span>
                @else
                    <span class="text-red-500 font-semibold">✗ Rupture de stock</span>
                @endif
            </p>
        </div>

        <!-- Actions -->
        <div class="flex gap-2">
            <a href="{{ route('products.show', $product) }}" class="flex-1 text-center py-2 rounded-md text-[0.65rem] font-bold tracking-wider transition font-cinzel" style="border: 2px solid var(--gold, #c9a84c); color: var(--gold, #c9a84c);">
                DÉTAILS
            </a>
            @if($product->quantity > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST" class="flex-1">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="w-full py-2 rounded-md text-[0.65rem] font-bold tracking-wider transition font-cinzel" style="background: linear-gradient(135deg, #c9a84c, #b8941f); color: #062a20;">
                        🛒 AJOUTER
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
