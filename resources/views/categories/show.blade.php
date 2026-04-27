@extends('layouts.app')

@section('title', $category->name . ' - ROYAL PAWS')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('home') }}" class="inline-block mb-4 text-sm transition hover:opacity-80" style="color: var(--gold);">
                ← Retour à l'accueil
            </a>
            <h1 class="text-3xl font-bold mb-4 font-cinzel" style="color: var(--gold);">
                {{ $category->icon }} {{ $category->name }}
            </h1>
            @if($category->description)
                <p class="opacity-70 text-sm">{{ $category->description }}</p>
            @endif
        </div>

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
                    <span class="text-6xl mb-4 block">📦</span>
                    <h2 class="text-2xl font-bold mb-2 gold-text font-cinzel">Aucun produit dans cette catégorie</h2>
                    <p class="opacity-60 mb-6">D'autres produits arrivent bientôt !</p>
                    <a href="{{ route('home') }}" class="royal-btn inline-block">
                        Voir tous les produits
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
