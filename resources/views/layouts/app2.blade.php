<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Szkoła') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('styles.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="body">
        
        <div class="main">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="nav">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="main">
                @yield('content')
            </main>
        </div>
        <footer class="footer">
            <p>&copy; {{ date('Y') }} Szkoła. Wszelkie prawa zastrzeżone.</p>
            <div class="accessibility-tools">
                <button id="highContrastToggle">Zmień kontrast</button>
                <button id="fontToggle">Zmień czcionkę</button>
            </div>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
            const contrastToggle = document.getElementById('highContrastToggle');
            const fontToggle = document.getElementById('fontToggle');

            // Sprawdź, czy istnieje zapisany stan kontrastu w localStorage
            if (localStorage.getItem('highContrast') === 'true') {
                document.body.classList.add('high-contrast');
            }

            // Przełączanie wysokiego kontrastu
            contrastToggle.addEventListener('click', () => {
                const isHighContrast = document.body.classList.toggle('high-contrast');
                localStorage.setItem('highContrast', isHighContrast); // Zapisz stan w localStorage
            });

            // Sprawdź, czy istnieje zapisany stan czcionki w localStorage
            if (localStorage.getItem('largeFont') === 'true') {
                document.body.classList.add('large-font');
            }

            // Przełączanie większej czcionki
            fontToggle.addEventListener('click', () => {
                const isLargeFont = document.body.classList.toggle('large-font');
                localStorage.setItem('largeFont', isLargeFont); // Zapisz stan w localStorage
            });
        });
        </script>
    </body>
</html>
