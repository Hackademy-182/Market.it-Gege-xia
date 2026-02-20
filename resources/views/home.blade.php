<x-layouts.app title="Home">
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4 p-lg-5">
            <div class="row align-items-center g-4">
                <div class="col-12 col-lg-7">
                    <h1 class="display-6 fw-bold mb-2">Compra e vendi veicoli</h1>
                    <p class="text-muted mb-4">
                        Auto, moto, barche e motoscafi. Cerca veloce, salva i preferiti, pubblica in 1 minuto.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('vehicles.index') }}" class="btn btn-dark btn-lg">Esplora annunci</a>

                        @auth
                            <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-lg">Vendi</a>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">Accedi</a>
                        @endguest
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="p-4 bg-light rounded-4">
                        <div class="fw-semibold mb-2">Statistiche (demo)</div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Annunci totali</span>
                            <span class="fw-bold">6</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Auto</span>
                            <span class="fw-bold">2</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Moto</span>
                            <span class="fw-bold">2</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Barche</span>
                            <span class="fw-bold">1</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Motoscafi</span>
                            <span class="fw-bold">1</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Preferiti</h2>
        <a href="{{ route('vehicles.index') }}" class="text-decoration-none">Vedi tutti</a>
    </div>

    @guest
        <div class="alert alert-info">
            Per salvare preferiti, fai login.
        </div>
    @endguest

    @auth
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <div class="text-muted">
                </div>
            </div>
        </div>
    @endauth

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Ultimi annunci</h2>
        <a href="{{ route('vehicles.index') }}" class="btn btn-outline-dark btn-sm">Vedi tutti</a>
    </div>

    <div class="row g-3">
        @foreach ($latest as $v)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('vehicles.show', $v['id']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge text-bg-secondary text-uppercase">{{ $v['type'] }}</span>
                                <span class="fw-bold fs-5">€ {{ $v['price'] }}</span>
                            </div>
                            <h3 class="h5 fw-semibold text-dark mb-2">{{ $v['title'] }}</h3>
                            <div class="text-muted">{{ $v['city'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.app>
