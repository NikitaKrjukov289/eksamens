<x-app-layout>
    <style>
         body {
            font-family: 'Arial', sans-serif;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ventspils trenini') }}
        </h2>
    </x-slot>

    <!-- Background Section -->
    <div class="background" style="background-image: url('{{ asset('public/images/background.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;">
        <div class="overlay" style="background: rgba(255, 255, 255, 0.8); height: 100%; display: flex; align-items: center; justify-content: center; flex-direction: column;">
            <div class="text-center text-gray-800 px-4">
                <h1 class="text-4xl font-bold mb-4">Ventspils Trenini!</h1>
                <p class="text-lg mb-6">
                    Šajā vietnē jūs varat pievienot savus treniņus un rakstīt tiem komentārus! Dzīvojiet sportiski, augšējā navigācijas joslā varat atrast visas nepieciešamās pogas, lai piekļūtu saviem treniņiem un treneriem.
                </p>
                <p class="text-lg">
                    Spiediet uz <strong>"Trenini"</strong>, lai apskatītu vai pievienotu treniņus.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
