<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ROYAL PAW - Nutrition Premium pour Chats, Chiens & Oiseaux')</title>
    <meta name="description" content="Première animalerie premium en ligne en Algérie. Croquettes, accessoires et soins pour chats, chiens et oiseaux. Livraison sur 58 wilayas.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            /* === NEW PALETTE === */
            --emerald-dark:  #0a3d2c; /* Slightly more green than black */
            --emerald:       #0d4a36;
            --emerald-mid:   #1a6b50;
            --emerald-light: #2d8f6f;
            --gold:          #c9a84c;
            --gold-light:    #e0c97a;
            --gold-bright:   #f0d96a;
            --bronze:        #8b6435;
            --bronze-dark:   #6b4a24;
            --beige:         #e8dcc8;
            --beige-light:   #f2ece0;
            --off-white:     #faf5eb;
            --cream:         #f5efe3;
            --black:         #050505;
            --black-soft:    #121212;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            min-height: 100vh;
            color: var(--off-white);
            background: var(--emerald-dark);
        }

        .font-cinzel { font-family: 'Cinzel', serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }

        /* === EMERALD MARBLE BACKGROUND === */
        .emerald-bg {
            background:
                radial-gradient(ellipse at 20% 50%, rgba(45, 143, 111, 0.3) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(26, 107, 80, 0.4) 0%, transparent 40%),
                radial-gradient(ellipse at 60% 80%, rgba(13, 74, 54, 0.5) 0%, transparent 45%),
                linear-gradient(160deg, #062a20 0%, #0d4a36 30%, #0a3d2c 50%, #1a6b50 70%, #062a20 100%);
        }

        .emerald-header {
            background:
                radial-gradient(ellipse at 30% 50%, rgba(26, 107, 80, 0.25) 0%, transparent 50%),
                linear-gradient(180deg, #041e17 0%, #0a3527 100%);
            backdrop-filter: blur(12px);
        }

        /* === GOLD + BRONZE BORDERS === */
        .gold-border-top {
            border-top: 3px solid;
            border-image: linear-gradient(90deg, transparent 5%, var(--bronze) 15%, var(--gold) 40%, var(--gold-light) 50%, var(--gold) 60%, var(--bronze) 85%, transparent 95%) 1;
        }

        .gold-border-bottom {
            border-bottom: 3px solid;
            border-image: linear-gradient(90deg, transparent 5%, var(--bronze) 15%, var(--gold) 40%, var(--gold-light) 50%, var(--gold) 60%, var(--bronze) 85%, transparent 95%) 1;
        }

        .gold-frame {
            border: 2px solid var(--gold);
            box-shadow:
                inset 0 0 15px rgba(201, 168, 76, 0.06),
                0 0 12px rgba(201, 168, 76, 0.08),
                0 0 0 1px var(--black);
        }

        /* === BAROQUE DIVIDER === */
        .baroque-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            padding: 1.5rem 0;
        }
        .baroque-divider::before,
        .baroque-divider::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--bronze), var(--gold), var(--bronze), transparent);
        }
        .baroque-divider .ornament {
            color: var(--gold);
            font-size: 1.2rem;
            text-shadow: 0 0 8px rgba(201, 168, 76, 0.3);
        }

        /* === CARD (off-white/beige, black contour) === */
        .royal-card {
            background: linear-gradient(145deg, var(--off-white), var(--beige-light), var(--cream));
            color: var(--black-soft);
            border-radius: 12px;
            padding: 1.5rem;
            border: 2px solid var(--black);
            box-shadow:
                0 0 0 1px var(--gold),
                0 8px 30px rgba(0, 0, 0, 0.4);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .royal-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--bronze), var(--gold-light), var(--gold), var(--gold-light), var(--bronze), transparent);
        }

        .royal-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 0 0 1px var(--gold),
                0 16px 48px rgba(0, 0, 0, 0.5),
                0 0 18px rgba(201, 168, 76, 0.12);
        }

        /* === EMERALD CARD (trust badges) === */
        .emerald-card {
            background:
                radial-gradient(ellipse at 30% 40%, rgba(45, 143, 111, 0.25) 0%, transparent 60%),
                linear-gradient(135deg, #0a3527, #0d4a36, #1a6b50, #0d4a36);
            border: 2px solid var(--black);
            box-shadow: 0 0 0 1px var(--gold);
            border-radius: 12px;
            position: relative;
            overflow: hidden;
        }
        .emerald-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(166, 124, 82, 0.04) 0%, transparent 50%, rgba(201, 168, 76, 0.03) 100%);
            pointer-events: none;
        }

        /* === BUTTONS === */
        .royal-btn {
            background: linear-gradient(135deg, var(--gold) 0%, var(--bronze) 50%, var(--gold) 100%);
            color: var(--emerald-dark);
            padding: 0.6rem 1.5rem;
            border: 1px solid var(--black);
            border-radius: 6px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(166, 124, 82, 0.3);
            font-family: 'Cinzel', serif;
            font-size: 0.75rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .royal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(201, 168, 76, 0.4);
            background: linear-gradient(135deg, var(--gold-bright) 0%, var(--gold) 50%, var(--gold-bright) 100%);
        }

        .royal-btn-outline {
            background: transparent;
            color: var(--gold);
            border: 2px solid var(--gold);
            padding: 0.6rem 1.5rem;
            border-radius: 6px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            font-family: 'Cinzel', serif;
            font-size: 0.75rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .royal-btn-outline:hover {
            background: var(--gold);
            color: var(--emerald-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 18px rgba(201, 168, 76, 0.3);
        }

        /* === TEXT === */
        .gold-text { color: var(--gold); }
        .bronze-text { color: var(--bronze); }
        .beige-text { color: var(--beige); }

        .gold-gradient-text {
            background: linear-gradient(135deg, var(--bronze), var(--gold), var(--gold-light), var(--gold), var(--bronze));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* === ALERTS === */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid;
        }
        .alert-success { background: rgba(45, 143, 111, 0.15); border-color: var(--emerald-mid); color: #86efac; }
        .alert-error { background: rgba(180, 60, 60, 0.15); border-color: #b43c3c; color: #fca5a5; }



        /* === TOP BAR === */
        .top-bar {
            background: linear-gradient(90deg, #021a12 0%, #041e17 50%, #021a12 100%);
            border-bottom: 1px solid rgba(166, 124, 82, 0.2);
        }

        /* === CATEGORY DROPDOWN === */
        .cat-dropdown:hover .cat-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .cat-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(8px);
            transition: all 0.25s ease;
        }

        /* === SCROLLBAR === */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--emerald-dark); }
        ::-webkit-scrollbar-thumb { background: var(--bronze); border-radius: 4px; }

        /* === ANIMATIONS === */
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        .gold-shimmer {
            background: linear-gradient(90deg, var(--bronze) 0%, var(--gold) 25%, var(--gold-light) 50%, var(--gold) 75%, var(--bronze) 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 4s linear infinite;
        }

        /* === CATEGORY BADGES (no orange/white) === */
        .badge-cat { background: rgba(13, 74, 54, 0.12); color: var(--emerald-mid); border: 1px solid rgba(13, 74, 54, 0.3); }
        .badge-dog { background: rgba(166, 124, 82, 0.12); color: var(--bronze); border: 1px solid rgba(166, 124, 82, 0.3); }
        .badge-bird { background: rgba(201, 168, 76, 0.12); color: var(--gold); border: 1px solid rgba(201, 168, 76, 0.3); }
    </style>
</head>
<body class="emerald-bg">
    <!-- Top Bar -->
    <div class="top-bar py-2 text-xs hidden md:block">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <span class="flex items-center gap-1.5" style="color: var(--beige);">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Livraison Express · 58 Wilayas
                </span>
                <span class="flex items-center gap-1.5" style="color: var(--beige);">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    Produits Garantis
                </span>
                <span class="flex items-center gap-1.5" style="color: var(--beige);">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Support 24/7
                </span>
            </div>
            <div class="flex items-center gap-3" style="color: var(--gold);">
                <span>🇩🇿</span>
                <span class="font-cinzel tracking-wider text-xs">PRIX EN DINAR ALGÉRIEN</span>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="emerald-header sticky top-0 z-50 gold-border-bottom shadow-2xl">
        <nav class="container mx-auto px-4 py-3">
            <!-- Row 1 -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-3">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0 group" style="text-decoration: none;">
                    <span class="text-3xl" style="filter: drop-shadow(0 0 8px rgba(201,168,76,0.4));">👑</span>
                    <div>
                        <span class="font-cinzel text-2xl font-bold tracking-[0.2em] gold-shimmer block leading-tight">ROYAL PAW</span>
                        <span class="text-[0.6rem] tracking-[0.3em] uppercase block" style="color: var(--beige);">Premium Pet Nutrition</span>
                    </div>
                </a>

                <!-- Search -->
                <form action="{{ route('search') }}" method="GET" class="flex-1 max-w-lg w-full">
                    <div class="flex">
                        <input type="text" name="q" value="{{ request('q') }}"
                               placeholder="Rechercher croquettes, accessoires..."
                               class="flex-1 px-4 py-2.5 rounded-l-lg border-2 border-r-0 focus:outline-none text-sm" style="border-color: var(--gold); background: var(--off-white); color: var(--black-soft);">
                        <button type="submit" class="royal-btn rounded-l-none rounded-r-lg px-5 py-2.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </button>
                    </div>
                </form>

                <!-- Actions -->
                <div class="flex items-center gap-4">
                    @php
                        $cartCount = \App\Http\Controllers\CartController::getCartCount();
                        $cartTotal = \App\Http\Controllers\CartController::getCartTotal();
                    @endphp

                    <!-- Cart and Auth block -->
                    <div class="flex items-center gap-4" style="color: var(--beige);">
                        <!-- Price -->
                        <span class="font-cinzel text-sm font-semibold tracking-wider mr-2">{{ number_format($cartTotal, 0, ',', ' ') }} DA</span>

                        <!-- Cart Dropdown Container -->
                        <div class="relative group mt-1">
                            <!-- Cart Bag Icon -->
                            <a href="{{ route('cart.index') }}" class="relative transition hover:scale-105 flex flex-col items-center pb-1" style="color: var(--black-soft); text-decoration: none;">
                                <div class="w-8 h-8 bg-black rounded-sm flex items-center justify-center relative mt-2 border border-[var(--gold)] shadow-md">
                                    <!-- Bag handle -->
                                    <div class="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3.5 h-1.5 border-[1.5px] border-b-0 border-[var(--gold)] rounded-t-full"></div>
                                    <!-- Item count inside the bag -->
                                    <span class="font-bold text-[13px]" style="color: var(--gold);">{{ $cartCount }}</span>
                                </div>
                            </a>

                            <!-- Cart Dropdown Popup -->
                            <div class="absolute top-full right-0 mt-3 hidden group-hover:block w-72 royal-card z-50 p-0 text-left opacity-0 group-hover:opacity-100 transition-opacity duration-300 before:content-[''] before:absolute before:-top-4 before:right-6 before:w-6 before:h-6 before:bg-[var(--beige-light)] before:rotate-45 before:border-l-[2px] before:border-t-[2px] before:border-[var(--black)] before:z-[1] shadow-2xl">
                                @php
                                    $cartItems = \App\Http\Controllers\CartController::getCartItems();
                                @endphp

                                @if($cartCount == 0)
                                    <div class="p-5 text-center relative z-10 bg-[var(--beige-light)]">
                                        <p class="text-[1.1rem] font-medium" style="color: var(--emerald-dark); letter-spacing: 0.5px;">Votre panier est vide.</p>
                                    </div>
                                @else
                                    <div class="relative z-10 bg-white" style="border-radius: 10px; overflow: hidden;">
                                        <!-- Items List -->
                                        <div class="max-h-60 overflow-y-auto">
                                            @foreach($cartItems->take(3) as $item)
                                                <div class="flex items-center gap-3 p-3 border-b border-gray-100">
                                                    <div class="w-16 h-16 bg-gray-50 flex-shrink-0 flex items-center justify-center p-1 border border-gray-100">
                                                        <img src="{{ asset($item->product->image ?? 'images/hero.png') }}" alt="{{ $item->product->name }}" class="max-w-full max-h-full object-contain">
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <h4 class="text-sm font-medium text-gray-800 truncate" title="{{ $item->product->name }}">{{ strtolower($item->product->name) }}</h4>
                                                        <p class="text-xs text-gray-500 mt-1">{{ $item->quantity }} × <span class="font-bold text-gray-700">{{ number_format($item->product->price, 0, ',', ' ') }} DA</span></p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if($cartCount > 3)
                                                <div class="text-center p-2 text-xs text-gray-500 bg-gray-50">
                                                    + {{ $cartCount - 3 }} autres articles
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Subtotal -->
                                        <div class="p-3 text-center border-b border-gray-200">
                                            <p class="text-[15px] text-gray-600 font-bold">Sous-total : <span class="text-black">{{ number_format($cartTotal, 0, ',', ' ') }} DA</span></p>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex flex-col">
                                            <a href="{{ route('cart.index') }}" class="py-3 text-center font-bold text-[13px] tracking-wide" style="background: var(--black); color: var(--gold); text-decoration: none;">
                                                VOIR LE PANIER
                                            </a>
                                            <a href="#" class="py-3 text-center font-bold text-[13px] tracking-wide" style="background: var(--emerald-mid); color: var(--gold-bright); text-decoration: none;">
                                                VALIDATION DE LA<br>COMMANDE
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Auth Link (Connexion / Mon Compte) -->
                        <div class="ml-2">
                            @auth
                                <a href="{{ route('wishlist.index') }}" class="font-cinzel text-sm font-semibold tracking-wider hover:opacity-80 transition uppercase" style="color: var(--beige); text-decoration: none;">
                                    Mon Compte
                                </a>
                                <form action="{{ route('logout') }}" method="POST" class="inline ml-3">
                                    @csrf
                                    <button type="submit" class="text-xs hover:opacity-80 uppercase tracking-widest" style="color: var(--beige); opacity: 0.7;">Logout</button>
                                </form>
                            @else
                                <a href="javascript:void(0)" onclick="toggleAuthModal()" class="font-cinzel text-sm font-semibold tracking-wider hover:opacity-80 transition uppercase" style="color: var(--beige); text-decoration: none;">
                                    CONNEXION
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 2: Categories -->
            @php
                $mainCategories = \App\Models\Category::whereNull('parent_id')->where('is_active', true)->orderBy('order')->get();
            @endphp
            @if($mainCategories->count() > 0)
            <div class="mt-3 pt-3" style="border-top: 1px solid rgba(166,124,82,0.2);">
                <div class="flex flex-wrap items-center gap-1 justify-center">
                    <a href="{{ route('home') }}" class="px-4 py-1.5 rounded-md text-xs font-cinzel font-semibold tracking-wider transition hover:bg-white/5 {{ !request('category') ? 'bg-white/10' : '' }}" style="color: var(--gold); text-decoration: none;">
                        ✦ E-Boutique
                    </a>
                    <a href="{{ route('boutique') }}" class="px-4 py-1.5 rounded-md text-xs font-semibold tracking-wide transition hover:bg-white/5" style="color: var(--beige); text-decoration: none;">
                        🛍️ Tous nos produits
                    </a>
                    @foreach($mainCategories as $navCat)
                        <div class="relative cat-dropdown">
                            <a href="{{ route('category.show', $navCat) }}" class="px-4 py-1.5 rounded-md text-xs font-semibold tracking-wide transition hover:bg-white/5 flex items-center gap-1.5" style="color: var(--beige); text-decoration: none;">
                                <span>{{ $navCat->icon }}</span>
                                {{ $navCat->name }}
                                @if($navCat->children->count() > 0)
                                    <svg class="w-3 h-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                @endif
                            </a>
                            @if($navCat->children->count() > 0)
                            <div class="cat-menu absolute top-full left-0 mt-1 rounded-lg p-3 min-w-48 z-50 shadow-2xl emerald-card">
                                @foreach($navCat->children as $subcat)
                                    <a href="{{ route('category.show', $subcat) }}" class="block py-2 px-3 rounded-md text-xs transition hover:bg-white/10 relative z-10" style="color: var(--beige); text-decoration: none;">
                                        {{ $subcat->name }}
                                    </a>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </nav>
    </header>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="container mx-auto px-4 mt-4"><div class="alert alert-success">{{ session('success') }}</div></div>
    @endif
    @if(session('error'))
        <div class="container mx-auto px-4 mt-4"><div class="alert alert-error">{{ session('error') }}</div></div>
    @endif
    @if($errors->any())
        <div class="container mx-auto px-4 mt-4"><div class="alert alert-error"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div></div>
    @endif

    <!-- Main -->
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-12 gold-border-top" style="background: linear-gradient(180deg, #041e17 0%, #021510 100%);">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-2xl">👑</span>
                        <span class="font-cinzel text-xl font-bold tracking-widest gold-gradient-text">ROYAL PAW</span>
                    </div>
                    <p class="text-sm mb-4 leading-relaxed" style="color: var(--beige); opacity: 0.6;">Première animalerie premium en ligne en Algérie. Nutrition de qualité pour vos compagnons royaux.</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 rounded-full flex items-center justify-center transition hover:scale-110" style="color: var(--gold); border: 1px solid var(--bronze);">f</a>
                        <a href="#" class="w-9 h-9 rounded-full flex items-center justify-center transition hover:scale-110" style="color: var(--gold); border: 1px solid var(--bronze);">ig</a>
                        <a href="#" class="w-9 h-9 rounded-full flex items-center justify-center transition hover:scale-110" style="color: var(--gold); border: 1px solid var(--bronze);">tk</a>
                    </div>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="gold-text font-cinzel font-bold mb-4 text-sm tracking-wider">📧 NEWSLETTER</h3>
                    <p class="text-sm mb-3" style="color: var(--beige); opacity: 0.6;">Offres exclusives & promotions</p>
                    <form action="#" method="POST" class="flex gap-2">
                        <input type="email" name="email" placeholder="Votre email" required class="flex-1 px-3 py-2 rounded-md text-sm focus:outline-none" style="background: rgba(166,124,82,0.1); color: var(--beige); border: 1px solid var(--bronze);">
                        <button type="submit" class="royal-btn px-4 text-[0.65rem]">OK</button>
                    </form>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="gold-text font-cinzel font-bold mb-4 text-sm tracking-wider">INFORMATIONS</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" style="color: var(--beige); opacity: 0.6; text-decoration: none;" class="hover:opacity-100 transition">E-Boutique</a></li>
                        <li><a href="#" style="color: var(--beige); opacity: 0.6; text-decoration: none;" class="hover:opacity-100 transition">Politique de retour</a></li>
                        <li><a href="#" style="color: var(--beige); opacity: 0.6; text-decoration: none;" class="hover:opacity-100 transition">Conditions générales</a></li>
                        <li><a href="#" style="color: var(--beige); opacity: 0.6; text-decoration: none;" class="hover:opacity-100 transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="gold-text font-cinzel font-bold mb-4 text-sm tracking-wider">CONTACT</h3>
                    <div class="space-y-2 text-sm" style="color: var(--beige); opacity: 0.6;">
                        <p>📞 +213 (0) 555 123 456</p>
                        <p>✉️ contact@royalpaw.dz</p>
                        <p>📍 Alger, Algérie</p>
                    </div>
                </div>
            </div>

            <div class="baroque-divider">
                <span class="ornament">✦ 👑 ✦</span>
            </div>

            <div class="text-center">
                <p class="font-cinzel text-xs tracking-widest" style="color: var(--bronze); opacity: 0.5;">© 2026 ROYAL PAW · TOUS DROITS RÉSERVÉS · PRIX EN DINAR ALGÉRIEN (DA)</p>
            </div>
        </div>
    </footer>

    <!-- Auth Modal (Hidden by default) -->
    <div id="authModal" class="fixed inset-0 z-[100] hidden items-start md:items-center justify-center pt-2 sm:pt-4 md:pt-10 pb-4 sm:pb-10 overflow-y-auto">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="toggleAuthModal()"></div>
        
        <!-- Modal Content -->
        <div class="relative w-[calc(100%-1.5rem)] sm:w-[calc(100%-2rem)] max-w-4xl mx-auto rounded-xl shadow-2xl z-10 my-4 sm:my-8 p-4 sm:p-6 md:p-10 gold-frame" style="font-family: 'Inter', sans-serif; background: linear-gradient(145deg, #0a3d2c, #0d4a36, #0a3d2c); border: 2px solid var(--gold);">
            <!-- Close Button -->
            <button onclick="toggleAuthModal()" class="absolute top-3 right-3 sm:top-4 sm:right-4 transition hover:scale-110 z-20" style="color: var(--gold);">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 md:gap-12">
                
                <!-- Login Column -->
                <div>
                    <h2 class="text-lg sm:text-[1.35rem] font-bold tracking-wide mb-4 sm:mb-6 uppercase font-cinzel gold-gradient-text">Connexion</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-4 sm:mb-5">
                            <label class="block text-xs sm:text-sm font-bold mb-1.5 sm:mb-2" style="color: var(--beige);">Identifiant ou adresse de messagerie *</label>
                            <input type="email" name="email" required autofocus class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md focus:outline-none transition text-sm" style="background: rgba(255,255,255,0.08); border: 1px solid var(--gold); color: var(--off-white);">
                        </div>
                        <div class="mb-4 sm:mb-5">
                            <label class="block text-xs sm:text-sm font-bold mb-1.5 sm:mb-2" style="color: var(--beige);">Mot de passe *</label>
                            <input type="password" name="password" required class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md focus:outline-none transition text-sm" style="background: rgba(255,255,255,0.08); border: 1px solid var(--gold); color: var(--off-white);">
                        </div>
                        <div class="mb-4 sm:mb-6 flex items-center">
                            <input type="checkbox" name="remember" id="remember_modal" class="mr-2 w-4 h-4 cursor-pointer accent-[var(--gold)]">
                            <label for="remember_modal" class="text-xs sm:text-sm font-bold cursor-pointer" style="color: var(--beige);">Se souvenir de moi</label>
                        </div>
                        <button type="submit" class="royal-btn w-full sm:w-auto px-6 sm:px-8 py-2.5 sm:py-3 text-xs sm:text-sm tracking-wide uppercase mb-3 sm:mb-4">
                            Identification
                        </button>
                        @if (Route::has('password.request'))
                            <div class="mt-2 text-xs sm:text-sm">
                                <a href="{{ route('password.request') }}" style="color: var(--gold-light); text-decoration: none;" class="hover:underline transition">Mot de passe perdu ?</a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Divider: Horizontal on mobile, Vertical on desktop -->
                <div class="block md:hidden w-full h-px" style="background: linear-gradient(90deg, transparent, var(--gold), var(--bronze), var(--gold), transparent);"></div>
                <div class="hidden md:block absolute left-1/2 top-10 bottom-10 w-px" style="background: linear-gradient(180deg, transparent, var(--gold), var(--bronze), var(--gold), transparent);"></div>

                <!-- Registration Column -->
                <div>
                    <h2 class="text-lg sm:text-[1.35rem] font-bold tracking-wide mb-4 sm:mb-6 uppercase font-cinzel gold-gradient-text">S'enregistrer</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-4 sm:mb-5">
                            <label class="block text-xs sm:text-sm font-bold mb-1.5 sm:mb-2" style="color: var(--beige);">Nom complet *</label>
                            <input type="text" name="name" required class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md focus:outline-none transition text-sm" style="background: rgba(255,255,255,0.08); border: 1px solid var(--gold); color: var(--off-white);">
                        </div>
                        <div class="mb-4 sm:mb-5">
                            <label class="block text-xs sm:text-sm font-bold mb-1.5 sm:mb-2" style="color: var(--beige);">Adresse de messagerie *</label>
                            <input type="email" name="email" required class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md focus:outline-none transition text-sm" style="background: rgba(255,255,255,0.08); border: 1px solid var(--gold); color: var(--off-white);">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4 sm:mb-6">
                            <div>
                                <label class="block text-xs sm:text-sm font-bold mb-1.5 sm:mb-2" style="color: var(--beige);">Mot de passe *</label>
                                <input type="password" name="password" required class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md focus:outline-none transition text-sm" style="background: rgba(255,255,255,0.08); border: 1px solid var(--gold); color: var(--off-white);">
                            </div>
                            <div>
                                <label class="block text-xs sm:text-sm font-bold mb-1.5 sm:mb-2" style="color: var(--beige);">Confirmer *</label>
                                <input type="password" name="password_confirmation" required class="w-full px-3 sm:px-4 py-2 sm:py-2.5 rounded-md focus:outline-none transition text-sm" style="background: rgba(255,255,255,0.08); border: 1px solid var(--gold); color: var(--off-white);">
                            </div>
                        </div>
                        
                        <div class="mb-4 sm:mb-6 text-xs sm:text-sm pr-0 sm:pr-4 leading-relaxed" style="color: var(--beige); opacity: 0.6;">
                            Vos données personnelles seront utilisées pour vous accompagner au cours de votre visite du site web, gérer l'accès à votre compte, et pour d'autres raisons décrites dans notre politique de confidentialité.
                        </div>

                        <button type="submit" class="royal-btn w-full sm:w-auto px-6 sm:px-8 py-2.5 sm:py-3 text-xs sm:text-sm tracking-wide uppercase">
                            S'enregistrer
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        function toggleAuthModal() {
            const modal = document.getElementById('authModal');
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }
    </script>
</body>
</html>
