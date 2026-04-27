@extends('layouts.app')

@section('title', 'Créer un compte - ROYAL PAWS')

@section('content')
    <div class="max-w-md mx-auto">
        <div class="royal-card">
            <div class="text-center mb-8">
                <span class="text-5xl mb-4 block">👑</span>
                <h1 class="text-2xl font-bold mb-2 font-cinzel" style="color: var(--gold);">
                    Créer un compte
                </h1>
                <p class="text-gray-500 text-sm">Rejoignez la famille royale</p>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block font-semibold mb-2 text-sm">Nom</label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none bg-white text-gray-800" style="border-color: var(--gold);">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="block font-semibold mb-2 text-sm">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none bg-white text-gray-800" style="border-color: var(--gold);">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="block font-semibold mb-2 text-sm">Mot de passe</label>
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           minlength="8"
                           class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none bg-white text-gray-800" style="border-color: var(--gold);">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-1">Minimum 8 caractères</p>
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block font-semibold mb-2 text-sm">Confirmer le mot de passe</label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           required
                           class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none bg-white text-gray-800" style="border-color: var(--gold);">
                </div>

                <button type="submit" class="royal-btn w-full mb-4">
                    Créer mon compte
                </button>

                <div class="text-center">
                    <p class="text-sm text-gray-500">
                        Déjà un compte ?
                        <a href="{{ route('login') }}" class="font-semibold hover:underline" style="color: var(--gold);">
                            Se connecter
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
