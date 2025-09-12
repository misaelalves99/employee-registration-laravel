{{-- resources/views/components/navbar.blade.php --}}
<nav class="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="brand">Sistema de Funcionários</a>
        <ul class="navList">
            <li class="navItem">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'activeLink' : '' }}">
                    Início
                </a>
            </li>
            <li class="navItem">
                <a href="{{ route('employee.index') }}" class="{{ request()->routeIs('employee.*') ? 'activeLink' : '' }}">
                    Funcionários
                </a>
            </li>
            <li class="navItem">
                <a href="{{ route('privacy') }}" class="{{ request()->routeIs('privacy') ? 'activeLink' : '' }}">
                    Privacidade
                </a>
            </li>
        </ul>
    </div>
</nav>
