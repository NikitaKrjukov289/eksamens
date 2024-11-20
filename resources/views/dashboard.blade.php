<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ventspils trenini') }}
        </h2>
    </x-slot>

    <div class="bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('public/image/background.jpg') }}');">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 bg-opacity-80 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-3xl font-bold mb-4">
                            Laipni lūgti Ventspils apmācību vietnē!
                        </h1>
                        <p class="text-lg mb-6">
                            Šajā vietnē jūs varat pievienot savus treniņus un rakstīt tiem komentārus! Dzīvojiet sportiski un
                            atklājiet, kā augšējā navigācijas joslā varat atrast visas nepieciešamās pogas, lai piekļūtu
                            saviem treniņiem un treneriem.
                        </p>
                        <p class="text-lg">
                            Spiediet uz <strong>"Trenini"</strong>, lai apskatītu vai pievienotu treniņus.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

