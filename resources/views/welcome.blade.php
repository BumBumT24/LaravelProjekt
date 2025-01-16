<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Szkoła</title>
        <link rel="stylesheet" href="{{ asset('styles.css') }}">
    </head>
    
    <body class="body">
        <div class="containerr4">
            
            
            @if (Route::has('login'))
            <nav class="navTekst1">
                @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </nav>
            @endif
            <h1 class="tyt1">Portal zarządzania szkołą</h1>
        </div>
        
        <div class="hero-section">
            <div class="hero-content">
                <h2>Witaj w portalu</h2>
                <p>Zarządzaj swoim danymi, ocenami i więcej w jednym miejscu.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Rozpocznij</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/school.png') }}" alt="Wizualizacja edukacji" />
            </div>
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
