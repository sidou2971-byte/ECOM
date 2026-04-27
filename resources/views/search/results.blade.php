@extends('layouts.app')

@section('title', 'Résultats de recherche - ROYAL PAWS')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 font-cinzel" style="color: var(--gold);">
            Résultats de recherche
        </h1>

        @if($query)
            <p class="mb-8 text-sm opacity-70">Recherche pour : <strong>"{{ $query }}"</strong></p>
        @endif

        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    @include('products._card', ['product' => $product])
                @endforeach
            </div>

            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @else
            <div class="malachite-card text-center py-16">
                <div class="relative z-10">
                    <span class="text-6xl mb-4 block">🔍</span>
                    <h2 class="text-2xl font-bold mb-2 gold-text font-cinzel">Aucun résultat trouvé</h2>
                    <p class="opacity-60 mb-6">Essayez avec d'autres mots-clés</p>
                    <a href="{{ route('home') }}" class="royal-btn inline-block">
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
