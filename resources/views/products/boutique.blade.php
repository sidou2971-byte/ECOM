@extends('layouts.app')

@section('title', 'Boutique - ROYAL PAW | Tous nos produits')

@section('content')
    <!-- Hero Banner -->
    <section class="mb-8 -mt-1">
        <div class="relative rounded-xl overflow-hidden shadow-2xl gold-frame" style="background: linear-gradient(135deg, #c9a84c 0%, #e0c97a 30%, #f0d96a 50%, #e0c97a 70%, #c9a84c 100%);">
            <div class="py-12 md:py-20 px-6 md:px-12 text-center">
                <p class="text-sm md:text-base font-cinzel tracking-[0.3em] mb-2" style="color: var(--emerald-dark);">LE MEILLEUR</p>
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold font-cinzel tracking-wider mb-3" style="color: var(--emerald-dark);">
                    POUR VOS<br>ANIMAUX
                </h1>
                <p class="text-lg md:text-2xl font-bold font-cinzel tracking-wider" style="color: var(--emerald-dark);">
                    ECONOMISEZ +20%
                </p>
            </div>
        </div>
    </section>

    <!-- Breadcrumb + Count + Sort -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-3">
        <div class="flex items-center gap-2 text-sm">
            <a href="{{ route('home') }}" class="hover:underline" style="color: var(--beige); opacity: 0.7; text-decoration: none;">ACCUEIL</a>
            <span style="color: var(--beige); opacity: 0.4;">/</span>
            <span class="font-bold" style="color: var(--gold);">BOUTIQUE</span>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-xs" style="color: var(--beige); opacity: 0.6;">
                Affichage de 1–{{ $products->count() }} sur {{ $products->total() }} résultats
            </span>
            <select id="sortSelect" onchange="applySort(this.value)" class="px-3 py-2 rounded-md text-xs focus:outline-none cursor-pointer" style="background: rgba(255,255,255,0.08); border: 1px solid var(--gold); color: var(--beige);">
                <option value="default" {{ request('sort') == 'default' || !request('sort') ? 'selected' : '' }}>Tri par défaut</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Alphabétique</option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Plus récent</option>
            </select>
        </div>
    </div>

    <!-- Main Layout: Sidebar + Products -->
    <div class="flex flex-col lg:flex-row gap-6">

        <!-- Sidebar Filters -->
        <aside class="w-full lg:w-64 flex-shrink-0">
            <form id="filterForm" method="GET" action="{{ route('boutique') }}">
                <!-- Preserve sort -->
                <input type="hidden" name="sort" value="{{ request('sort', 'default') }}">

                <!-- Prix -->
                <div class="mb-4 rounded-lg p-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(201,168,76,0.2);">
                    <button type="button" onclick="toggleFilter('filter-prix')" class="flex items-center justify-between w-full text-left">
                        <h3 class="font-cinzel font-bold text-sm tracking-wider" style="color: var(--gold);">Prix</h3>
                        <svg class="w-4 h-4 transition-transform" style="color: var(--gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                    </button>
                    <div id="filter-prix" class="mt-4">
                        <!-- Range Slider -->
                        <div class="range-slider-container relative h-6 mb-3">
                            <div class="absolute top-1/2 -translate-y-1/2 left-0 right-0 h-[3px] rounded-full" style="background: rgba(255,255,255,0.15);"></div>
                            <div id="rangeTrack" class="absolute top-1/2 -translate-y-1/2 h-[3px] rounded-full" style="background: var(--gold);"></div>
                            <input type="range" id="rangeMin" min="{{ floor($priceMin) }}" max="{{ ceil($priceMax) }}" value="{{ request('price_min', floor($priceMin)) }}" class="range-input absolute w-full top-0 h-6 appearance-none bg-transparent pointer-events-none" style="z-index: 3;">
                            <input type="range" id="rangeMax" min="{{ floor($priceMin) }}" max="{{ ceil($priceMax) }}" value="{{ request('price_max', ceil($priceMax)) }}" class="range-input absolute w-full top-0 h-6 appearance-none bg-transparent pointer-events-none" style="z-index: 4;">
                        </div>
                        <!-- Hidden inputs for form submission -->
                        <input type="hidden" name="price_min" id="priceMinInput" value="{{ request('price_min', floor($priceMin)) }}">
                        <input type="hidden" name="price_max" id="priceMaxInput" value="{{ request('price_max', ceil($priceMax)) }}">
                        <!-- Labels -->
                        <div class="flex justify-between text-xs" style="color: var(--beige); opacity: 0.7;">
                            <span id="labelMin">DA<span id="valMin">{{ number_format(request('price_min', floor($priceMin)), 2, '.', '') }}</span></span>
                            <span id="labelMax">DA<span id="valMax">{{ number_format(request('price_max', ceil($priceMax)), 2, '.', '') }}</span></span>
                        </div>
                    </div>
                </div>

                <!-- Animal -->
                <div class="mb-4 rounded-lg p-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(201,168,76,0.2);">
                    <button type="button" onclick="toggleFilter('filter-animal')" class="flex items-center justify-between w-full text-left">
                        <h3 class="font-cinzel font-bold text-sm tracking-wider" style="color: var(--gold);">Animal</h3>
                        <svg class="w-4 h-4 transition-transform" style="color: var(--gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                    </button>
                    <div id="filter-animal" class="mt-3 space-y-2">
                        <label class="flex items-center gap-2 cursor-pointer text-sm group" style="color: var(--beige);">
                            <input type="checkbox" name="animal[]" value="cat" {{ in_array('cat', (array)request('animal', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-[var(--gold)]" onchange="document.getElementById('filterForm').submit()">
                            <span class="group-hover:opacity-100 opacity-80 transition">🐱 Chat</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer text-sm group" style="color: var(--beige);">
                            <input type="checkbox" name="animal[]" value="dog" {{ in_array('dog', (array)request('animal', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-[var(--gold)]" onchange="document.getElementById('filterForm').submit()">
                            <span class="group-hover:opacity-100 opacity-80 transition">🐶 Chien</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer text-sm group" style="color: var(--beige);">
                            <input type="checkbox" name="animal[]" value="bird" {{ in_array('bird', (array)request('animal', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-[var(--gold)]" onchange="document.getElementById('filterForm').submit()">
                            <span class="group-hover:opacity-100 opacity-80 transition">🐦 Oiseau</span>
                        </label>
                    </div>
                </div>

                <!-- Type Produit -->
                @if($subcategories->count() > 0)
                <div class="mb-4 rounded-lg p-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(201,168,76,0.2);">
                    <button type="button" onclick="toggleFilter('filter-type')" class="flex items-center justify-between w-full text-left">
                        <h3 class="font-cinzel font-bold text-sm tracking-wider" style="color: var(--gold);">Type produit</h3>
                        <svg class="w-4 h-4 transition-transform" style="color: var(--gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                    </button>
                    <div id="filter-type" class="mt-3 space-y-2">
                        @foreach($subcategories as $sub)
                            <label class="flex items-center gap-2 cursor-pointer text-sm group" style="color: var(--beige);">
                                <input type="checkbox" name="type[]" value="{{ $sub }}" {{ in_array($sub, (array)request('type', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-[var(--gold)]" onchange="document.getElementById('filterForm').submit()">
                                <span class="group-hover:opacity-100 opacity-80 transition capitalize">{{ $sub }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Catégorie -->
                @if($categories->count() > 0)
                <div class="mb-4 rounded-lg p-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(201,168,76,0.2);">
                    <button type="button" onclick="toggleFilter('filter-cat')" class="flex items-center justify-between w-full text-left">
                        <h3 class="font-cinzel font-bold text-sm tracking-wider" style="color: var(--gold);">Catégorie</h3>
                        <svg class="w-4 h-4 transition-transform" style="color: var(--gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="filter-cat" class="mt-3 space-y-1 hidden">
                        @foreach($categories as $cat)
                            <a href="{{ route('category.show', $cat) }}" class="block py-1.5 px-2 rounded text-sm hover:bg-white/5 transition" style="color: var(--beige); text-decoration: none; opacity: 0.8;">
                                {{ $cat->icon }} {{ $cat->name }}
                            </a>
                            @if($cat->children->count() > 0)
                                @foreach($cat->children as $child)
                                    <a href="{{ route('category.show', $child) }}" class="block py-1 px-4 rounded text-xs hover:bg-white/5 transition" style="color: var(--beige); text-decoration: none; opacity: 0.6;">
                                        └ {{ $child->name }}
                                    </a>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Type aliment -->
                <div class="mb-4 rounded-lg p-4" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(201,168,76,0.2);">
                    <button type="button" onclick="toggleFilter('filter-type-aliment')" class="flex items-center justify-between w-full text-left">
                        <h3 class="font-cinzel font-bold text-sm tracking-wider" style="color: var(--gold);">Type aliment</h3>
                        <svg class="w-4 h-4 transition-transform" style="color: var(--gold);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="filter-type-aliment" class="mt-3 space-y-2 hidden">
                        @php
                            $typeAliments = [
                                'Complément alimentaire',
                                'Conserve',
                                'Croquettes',
                                'Friandises',
                                'Friandises et récompenses',
                                'Gelée',
                                'Graines',
                                'Lait'
                            ];
                        @endphp
                        @foreach($typeAliments as $ta)
                            <label class="flex items-center gap-2 cursor-pointer text-sm group" style="color: var(--beige);">
                                <input type="checkbox" name="type_aliment[]" value="{{ $ta }}" {{ in_array($ta, (array)request('type_aliment', [])) ? 'checked' : '' }} class="w-4 h-4 rounded accent-[var(--gold)]" onchange="document.getElementById('filterForm').submit()">
                                <span class="group-hover:opacity-100 opacity-80 transition">{{ $ta }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Bouton Filtrer Prix -->
                <button type="submit" class="royal-btn w-full text-center text-xs py-2.5">
                    FILTRER PAR PRIX
                </button>

                <!-- Reset -->
                <a href="{{ route('boutique') }}" class="block text-center mt-3 text-xs hover:underline transition" style="color: var(--gold); text-decoration: none; opacity: 0.7;">
                    ✕ Réinitialiser les filtres
                </a>
            </form>
        </aside>

        <!-- Product Grid -->
        <div class="flex-1">
            @if($products->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
                    @foreach($products as $product)
                        @include('products._card_boutique', ['product' => $product])
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @else
                <div class="text-center py-20 rounded-xl" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(201,168,76,0.15);">
                    <span class="text-6xl mb-4 block">🔍</span>
                    <h2 class="text-xl font-bold mb-2 gold-text font-cinzel">Aucun produit trouvé</h2>
                    <p class="text-sm" style="color: var(--beige); opacity: 0.6;">Essayez de modifier vos filtres</p>
                    <a href="{{ route('boutique') }}" class="royal-btn inline-block mt-4 text-xs">Voir tous les produits</a>
                </div>
            @endif
        </div>
    </div>

    <style>
        /* Range Slider Styles */
        .range-slider-container {
            position: relative;
        }
        .range-input::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #eee;
            cursor: pointer;
            pointer-events: auto;
            position: relative;
            z-index: 10;
        }
        .range-input::-moz-range-thumb {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #eee;
            border: none;
            cursor: pointer;
            pointer-events: auto;
            position: relative;
            z-index: 10;
        }
    </style>

    <script>
        function toggleFilter(id) {
            const el = document.getElementById(id);
            el.classList.toggle('hidden');
            // Rotate arrow icon
            const btn = el.previousElementSibling || el.parentElement.querySelector('button');
            const svg = btn?.querySelector('svg');
            if (svg) {
                svg.style.transform = el.classList.contains('hidden') ? 'rotate(180deg)' : '';
            }
        }

        function applySort(value) {
            const url = new URL(window.location.href);
            url.searchParams.set('sort', value);
            window.location.href = url.toString();
        }

        // Dual Range Slider Logic
        document.addEventListener('DOMContentLoaded', function() {
            const rangeMin = document.getElementById('rangeMin');
            const rangeMax = document.getElementById('rangeMax');
            const rangeTrack = document.getElementById('rangeTrack');
            
            const minInput = document.getElementById('priceMinInput');
            const maxInput = document.getElementById('priceMaxInput');
            
            const valMin = document.getElementById('valMin');
            const valMax = document.getElementById('valMax');
            
            if (rangeMin && rangeMax) {
                const minVal = parseInt(rangeMin.min);
                const maxVal = parseInt(rangeMax.max);
                
                function updateSlider() {
                    let min = parseInt(rangeMin.value);
                    let max = parseInt(rangeMax.value);
                    
                    if (min > max) {
                        const tmp = max;
                        max = min;
                        min = tmp;
                    }
                    
                    // Format numbers with two decimals
                    valMin.textContent = parseFloat(min).toFixed(2);
                    valMax.textContent = parseFloat(max).toFixed(2);
                    
                    minInput.value = min;
                    maxInput.value = max;
                    
                    const percentMin = ((min - minVal) / (maxVal - minVal)) * 100;
                    const percentMax = ((max - minVal) / (maxVal - minVal)) * 100;
                    
                    rangeTrack.style.left = percentMin + '%';
                    rangeTrack.style.right = (100 - percentMax) + '%';
                }
                
                rangeMin.addEventListener('input', updateSlider);
                rangeMax.addEventListener('input', updateSlider);
                
                // Submit form on release
                rangeMin.addEventListener('change', () => document.getElementById('filterForm').submit());
                rangeMax.addEventListener('change', () => document.getElementById('filterForm').submit());
                
                // Initialize
                updateSlider();
            }
        });
    </script>
@endsection
