{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Funcionários')</title>

    {{-- Vite gera e importa CSS e JS --}}
    @vite(['resources/js/app.js'])
    @stack('styles')
</head>
<body>
    {{-- Navbar --}}
    @include('components.navbar')

    <main class="main">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    @stack('scripts')
</body>
</html>
