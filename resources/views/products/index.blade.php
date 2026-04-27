@extends('layouts.app')

@section('title', 'ROYAL PAWS - Nutrition Premium pour Chats, Chiens & Oiseaux')

@section('content')
    <!-- Hero Banners -->
    <section class="mb-10 -mt-1">
        <!-- Main Banner: Cats -->
        <div class="relative rounded-xl overflow-hidden group cursor-pointer shadow-2xl mb-6 gold-frame bg-emerald-dark">
            <img src="{{ asset('images/banner-cats.png') }}" alt="Offres Chats" class="w-full h-80 md:h-[28rem] object-contain object-right group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent flex items-center">
                <div class="p-8 md:p-12">
                    <span class="inline-block px-3 py-1 rounded-md text-xs font-bold mb-3 bg-black text-gold font-cinzel tracking-wider border border-gold">🔥 MEILLEURES OFFRES</span>
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-3 font-cinzel tracking-wide">
                        Nutrition Premium<br>pour vos <span class="gold-gradient-text">Chats</span>
                    </h2>
                    <p class="text-white/70 mb-5 text-sm md:text-base max-w-md">Croquettes, pâtées et friandises de qualité supérieure pour votre félin royal</p>
                    <a href="{{ route('home', ['category' => 'cat']) }}" class="royal-btn inline-block">
                        Voir les produits 🐱
                    </a>
                </div>
            </div>
        </div>

        <!-- Sub banners: Dogs + Birds -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="relative rounded-xl overflow-hidden group cursor-pointer shadow-2xl gold-frame bg-emerald-dark">
                <img src="{{ asset('images/banner-dogs.png') }}" alt="Offres Chiens" class="w-full h-64 object-contain object-right group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent flex items-center">
                    <div class="p-6 md:p-8">
                        <span class="inline-block px-3 py-1 rounded-md text-xs font-bold mb-3 bg-black text-gold font-cinzel tracking-wider border border-gold">-30% CROQUETTES</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-white mb-2 font-cinzel">Pour vos <span class="gold-gradient-text">Chiens</span></h2>
                        <p class="text-white/70 mb-4 text-sm">Alimentation premium & accessoires</p>
                        <a href="{{ route('home', ['category' => 'dog']) }}" class="royal-btn inline-block text-[0.65rem]">Découvrir 🐶</a>
                    </div>
                </div>
            </div>

            <div class="relative rounded-xl overflow-hidden group cursor-pointer shadow-2xl gold-frame bg-emerald-dark">
                <img src="{{ asset('images/banner-birds.png') }}" alt="Offres Oiseaux" class="w-full h-64 object-contain object-right group-hover:scale-105 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-transparent flex items-center">
                    <div class="p-6 md:p-8">
                        <span class="inline-block px-3 py-1 rounded-md text-xs font-bold mb-3 bg-black text-gold font-cinzel tracking-wider border border-gold">NOUVEAU ✦</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-white mb-2 font-cinzel">Produits pour <span class="gold-gradient-text">Oiseaux</span></h2>
                        <p class="text-white/70 mb-4 text-sm">Graines, cages & accessoires</p>
                        <a href="{{ route('home', ['category' => 'bird']) }}" class="royal-btn inline-block text-[0.65rem]">Explorer 🐦</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Badges (Malachite Cards) -->
    <section class="mb-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="malachite-card text-center py-5 px-4">
                <div class="relative z-10">
                    <div class="text-3xl mb-2" style="filter: drop-shadow(0 0 8px rgba(201,168,76,0.3));">🚚</div>
                    <h4 class="font-cinzel font-bold text-xs gold-text tracking-wider">LIVRAISON EXPRESS</h4>
                    <p class="text-xs mt-1 opacity-60">Sur 58 wilayas</p>
                </div>
            </div>
            <div class="malachite-card text-center py-5 px-4">
                <div class="relative z-10">
                    <div class="text-3xl mb-2">✅</div>
                    <h4 class="font-cinzel font-bold text-xs gold-text tracking-wider">PRODUIT GARANTI</h4>
                    <p class="text-xs mt-1 opacity-60">Qualité premium</p>
                </div>
            </div>
            <div class="malachite-card text-center py-5 px-4">
                <div class="relative z-10">
                    <div class="text-3xl mb-2">🏪</div>
                    <h4 class="font-cinzel font-bold text-xs gold-text tracking-wider">E-BOUTIQUE</h4>
                    <p class="text-xs mt-1 opacity-60">+500 produits</p>
                </div>
            </div>
            <div class="malachite-card text-center py-5 px-4">
                <div class="relative z-10">
                    <div class="text-3xl mb-2">💳</div>
                    <h4 class="font-cinzel font-bold text-xs gold-text tracking-wider">PAIEMENT À LA LIVRAISON</h4>
                    <p class="text-xs mt-1 opacity-60">Cash ou CCP</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products: Nos Croquettes -->
    @if(isset($featuredProducts) && $featuredProducts->count() > 0)
        <section class="mb-10">
            <div class="baroque-divider">
                <span class="ornament">✦</span>
            </div>
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl md:text-3xl font-bold font-cinzel gold-gradient-text tracking-wider">
                    NOS CROQUETTES
                </h2>
                <a href="{{ route('home') }}" class="royal-btn-outline text-[0.65rem] py-2 px-4">Voir tout →</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredProducts as $product)
                    @include('products._card', ['product' => $product])
                @endforeach
            </div>
        </section>
    @endif

    <!-- Category Filters -->
    @if(isset($categories) && $categories->count() > 0)
        <div class="mb-6">
            <div class="flex flex-wrap gap-2 items-center">
                <span class="text-xs font-cinzel font-semibold tracking-wider mr-2 gold-text">FILTRER :</span>
                <a href="{{ route('home') }}" class="px-4 py-2 rounded-md text-xs font-cinzel font-medium tracking-wider transition gold-frame {{ !request('category') ? 'text-green-900' : '' }}" style="{{ !request('category') ? 'background: var(--gold);' : 'color: var(--gold);' }}">
                    Tous
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('home', ['category' => $category->slug]) }}" class="px-4 py-2 rounded-md text-xs font-medium tracking-wide transition gold-frame {{ request('category') == $category->slug ? 'text-green-900' : '' }}" style="{{ request('category') == $category->slug ? 'background: var(--gold);' : 'color: var(--gold);' }}">
                        {{ $category->icon }} {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <!-- All Products -->
    @if($products->count() > 0)
        <section>
            <div class="baroque-divider">
                <span class="ornament">✦</span>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold font-cinzel gold-gradient-text tracking-wider mb-6">
                TOUS LES PRODUITS
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    @include('products._card', ['product' => $product])
                @endforeach
            </div>
            <div class="mt-8">{{ $products->links() }}</div>
        </section>
    @else
        <div class="malachite-card text-center py-16">
            <div class="relative z-10">
                <span class="text-6xl mb-4 block">👑</span>
                <h2 class="text-2xl font-bold mb-2 gold-text font-cinzel">Aucun produit disponible</h2>
                <p class="opacity-60">Notre collection royale arrive bientôt !</p>
            </div>
        </div>
    @endif
@endsection
