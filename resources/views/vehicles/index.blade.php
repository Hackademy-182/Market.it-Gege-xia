<x-layouts.app title="Annunci">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Annunci</h1>
            <p class="text-muted mb-0">Auto, moto, barche e motoscafi</p>
        </div>

        @auth
            <a class="btn btn-primary" href="{{ route('vehicles.create') }}">+ Vendi</a>
        @endauth

        @guest
            <a class="btn btn-outline-primary" href="{{ route('login') }}">Accedi per vendere</a>
        @endguest
    </div>

    <div class="row g-3">
        @foreach ($vehicles as $v)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('vehicles.show', $v['id']) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge text-bg-secondary text-uppercase">{{ $v['type'] }}</span>
                                <span class="fw-bold">€ {{ $v['price'] }}</span>
                            </div>

                            <h2 class="h5 fw-semibold text-dark mb-2">{{ $v['title'] }}</h2>
                            <p class="text-muted mb-0">{{ $v['city'] }}</p>
                        </div>

                        <div class="card-footer bg-white border-0 pt-0">
                            <span class="btn btn-sm btn-outline-dark w-100">Vedi dettaglio</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.app>
