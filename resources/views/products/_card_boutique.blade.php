<div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100 relative group">
    <!-- Out of Stock Overlay -->
    @if($product->quantity <= 0)
        <div class="absolute top-3 left-3 z-10">
            <span class="bg-gray-500 text-white px-3 py-1 rounded text-[0.6rem] font-bold uppercase tracking-wider shadow">
                Rupture de stock
            </span>
        </div>
    @endif

    <!-- Discount Badge -->
    @if($product->discount_price)
        <div class="absolute top-3 right-3 z-10">
            <span class="bg-red-500 text-white px-2 py-1 rounded text-[0.6rem] font-bold shadow">
                -{{ $product->discount_percentage }}%
            </span>
        </div>
    @endif

    <!-- Product Image -->
    <a href="{{ route('products.show', $product) }}" class="block">
        <div class="h-48 md:h-52 bg-gray-50 flex items-center justify-center p-3 overflow-hidden">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-500">
            @else
                <div class="text-center text-gray-300">
                    <span class="text-5xl">🐾</span>
                </div>
            @endif
        </div>
    </a>

    <!-- Product Info -->
    <div class="p-4">
        <!-- Category Label -->
        @if($product->subcategory)
            <p class="text-[0.6rem] font-bold tracking-widest uppercase mb-1 text-gray-400">
                {{ strtoupper($product->subcategory) }}
            </p>
        @elseif($product->category)
            <p class="text-[0.6rem] font-bold tracking-widest uppercase mb-1 text-gray-400">
                @if($product->category === 'cat') CHAT
                @elseif($product->category === 'dog') CHIEN
                @else OISEAU
                @endif
            </p>
        @endif

        <!-- Product Name -->
        <a href="{{ route('products.show', $product) }}" class="block text-sm font-semibold text-gray-800 mb-2 leading-snug hover:text-blue-700 transition" style="text-decoration: none;">
            {{ $product->name }}
        </a>

        <!-- Price -->
        <div class="mb-3">
            @if($product->discount_price)
                <span class="text-base font-bold text-gray-800">{{ number_format($product->discount_price, 0, ',', ' ') }} DA</span>
                <span class="text-xs text-gray-400 line-through ml-1">{{ number_format($product->price, 0, ',', ' ') }} DA</span>
            @else
                <span class="text-base font-bold text-gray-800">{{ number_format($product->price, 0, ',', ' ') }} DA</span>
            @endif
        </div>

        <!-- Action -->
        <div class="pt-2" style="border-top: 1px solid #eee;">
            @if($product->quantity > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="text-xs font-bold tracking-widest uppercase text-gray-700 hover:text-black transition">
                        AJOUTER AU PANIER
                    </button>
                </form>
            @else
                <span class="text-xs font-bold tracking-widest uppercase text-gray-400">
                    LIRE LA SUITE
                </span>
            @endif
        </div>
    </div>
</div>
