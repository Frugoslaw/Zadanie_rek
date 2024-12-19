<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Application - README</title>
</head>
<body>
    <h1>Task Management Application</h1>
    <p>Aplikacja do zarządzania zadaniami z funkcjonalnościami przypomnień e-mail, filtrowania zadań oraz obsługi kolejek. Projekt zbudowany na Laravel i Vue.js.</p>

    <h2>Wymagania</h2>
    <p>Przed rozpoczęciem pracy upewnij się, że masz zainstalowane następujące narzędzia:</p>
    <ul>
        <li>PHP 8.1 lub nowszy</li>
        <li>Composer</li>
        <li>Node.js (z <code>npm</code>)</li>
        <li>Laravel 11.x</li>
    </ul>

    <h2>Instalacja</h2>
    <ol>
        <li>
            <strong>Pobierz projekt</strong>
            <pre><code>git clone https://github.com/Frugoslaw/Zadanie_rek.git
cd task-management</code></pre>
        </li>
        <li>
            <strong>Instalacja zależności PHP</strong>
            <p>Zainstaluj zależności PHP za pomocą Composer:</p>
            <pre><code>composer install</code></pre>
        </li>
        <li>
            <strong>Instalacja zależności front-end (Node.js i npm)</strong>
            <p>Zainstaluj zależności front-end za pomocą npm:</p>
            <pre><code>npm install</code></pre>
        </li>
        <li>
            <strong>Skonfiguruj środowisko</strong>
            <p>Skopiuj plik <code>.env.example</code> do <code>.env</code>:</p>
            <pre><code>cp .env.example .env</code></pre>
            <p>Następnie otwórz plik <code>.env</code> i skonfiguruj dane dostępowe do bazy danych oraz inne ustawienia (np. SMTP do wysyłania maili).</p>
        </li>
        <li>
            <strong>Wygeneruj klucz aplikacji</strong>
            <p>Wygeneruj klucz aplikacji Laravel:</p>
            <pre><code>php artisan key:generate</code></pre>
        </li>
        <li>
            <strong>Migracja bazy danych</strong>
            <p>Jeśli baza danych jeszcze nie istnieje, Laravel zapyta Cię, czy chcesz ją utworzyć. Po wybraniu opcji, Laravel automatycznie stworzy odpowiednią bazę danych.</p>
            <p>Następnie uruchom migrację i seedowanie bazy danych:</p>
            <pre><code>php artisan migrate --seed</code></pre>
        </li>
        <li>
            <strong>Uruchomienie aplikacji</strong>
            <p>Uruchom aplikację za pomocą poniższej komendy:</p>
            <pre><code>composer run dev</code></pre>
            <p>Ta komenda uruchomi zarówno serwer aplikacji, jak i skompiluje zasoby front-end.</p>
            <p>Aplikacja będzie dostępna pod adresem <code>http://127.0.0.1:8000</code>.</p>
        </li>
        <li>
            <strong>Zatrzymywanie serwera</strong>
            <p>Aby zatrzymać serwer, naciśnij <code>Ctrl+C</code> w terminalu.</p>
        </li>
    </ol>

    <h2>Licencja</h2>
    <p>Projekt jest dostępny na licencji MIT. Zobacz plik LICENSE, aby uzyskać więcej informacji.</p>
</body>
</html>
