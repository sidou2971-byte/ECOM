@extends('layouts.app')

@section('title', 'Connexion - ROYAL PAWS')

@section('content')
    <div class="max-w-md mx-auto">
        <div class="royal-card">
            <div class="text-center mb-8">
                <span class="text-5xl mb-4 block">👑</span>
                <h1 class="text-2xl font-bold mb-2 font-cinzel" style="color: var(--gold);">
                    Connexion
                </h1>
                <p class="text-gray-500 text-sm">Accédez à votre compte royal</p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-6">
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

                <div class="mb-6">
                    <label for="password" class="block font-semibold mb-2 text-sm">Mot de passe</label>
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none bg-white text-gray-800" style="border-color: var(--gold);">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 flex items-center">
                    <input type="checkbox"
                           id="remember"
                           name="remember"
                           class="w-4 h-4 rounded">
                    <label for="remember" class="ml-2 text-sm">Se souvenir de moi</label>
                </div>

                <button type="submit" class="royal-btn w-full mb-4">
                    Se connecter
                </button>

                <div class="text-center">
                    <p class="text-sm text-gray-500">
                        Pas encore de compte ?
                        <a href="{{ route('register') }}" class="font-semibold hover:underline" style="color: var(--gold);">
                            Créer un compte
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
