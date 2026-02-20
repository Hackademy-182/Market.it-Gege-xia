<body class="pt-5">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('vehicles.index') }}">Annunci</a>
            </li>

            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vehicles.create') }}">Vendi</a>
                </li>
            @endauth
            </ul>

            <ul class="navbar-nav ms-auto align-items-lg-center">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <span class="navbar-text me-2">
                            Ciao, {{ auth()->user()->name }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
        </div>
    </nav>

    <main class="container pt-4">
        {{ $slot }}
    </main>

</body>
