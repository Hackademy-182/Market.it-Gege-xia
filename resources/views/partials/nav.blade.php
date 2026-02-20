<nav class="nav">
    <a class="nav__brand" href="{{ url('/') }}">Marketplace</a>

    <form class="nav__search" action="{{ route('vehicles.index') }}" method="GET">
        <input class="nav__input" type="text" name="q" value="{{ request('q') }}"
            placeholder="Cerca: Panda, Yamaha, barca...">
        <button class="nav__btn" type="submit">Cerca</button>
    </form>

    <div class="nav__links">
        <a class="nav__link nav__sell" href="{{ route('vehicles.create') }}">Vendi</a>

        @auth
            <span class="nav__hello">Ciao, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="nav__inline">
                @csrf
                <button class="nav__link" type="submit">Logout</button>
            </form>
        @else
            <a class="nav__link" href="{{ route('login') }}">Login</a>
            <a class="nav__link" href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>
