<x-app-layout>
    <x-slot name="header">
        <h2 class="container-header">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="hero-section">
        <div class="hero-image">
                    <img src="{{ asset('images/school.png') }}" alt="Wizualizacja edukacji" />
                </div>
        <div class="dash">
            <h3 class="nag">{{ __("You're logged in!") }}</h3>
            <p >Witamy w portalu szkoły. Znajdziesz tu wszystkie potrzebne informacje.</p>
            <p >School: Akadmia Nauk Stosowanych</p>
            <p >Address: Wojska Polskiego, Elbląg, Polska</p>
        </div>
    </div>
</x-app-layout>
