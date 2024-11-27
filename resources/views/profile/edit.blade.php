<x-app-layout>
<style>

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

.background {
    background-image: url('{{ asset("public/images/background.jpg") }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.overlay {
    background: rgba(255, 255, 255, 0.8); 
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.text-center {
    text-align: center;
    color: #4a5568; 
    padding: 0 20px;
}

.text-center h1 {
    font-size: 2.5rem; 
    font-weight: bold;
    margin-bottom: 1rem;
}

.text-center p {
    font-size: 1.25rem; 
    margin-bottom: 1.5rem;
}

.text-center strong {
    font-weight: bold;
    color: #2563eb; 
}


</style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="background">
    <div class="overlay">
        <div class="text-center">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="text-center">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="text-center">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
