<x-layouts.app title="Annunci">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Annunci</h1>
            <div class="text-muted">Auto • Moto • Barche • Motoscafi</div>
        </div>

        @auth
            <a class="btn btn-primary btn-lg" href="{{ route('vehicles.create') }}">+ Vendi</a>
        @endauth

        @guest
            <a class="btn btn-outline-primary btn-lg" href="{{ route('login') }}">Accedi per vendere</a>
        @endguest
    </div>

    <div class="row g-3">
        @foreach ($vehicles as $v)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('vehicles.show', $v['id']) }}" class="text-decoration-none">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge text-bg-secondary text-uppercase">{{ $v['type'] }}</span>
                                <span class="fw-bold fs-5">€ {{ $v['price'] }}</span>
                            </div>

                            <h2 class="h5 fw-semibold text-dark mb-2">{{ $v['title'] }}</h2>
                            <div class="text-muted">{{ $v['city'] }}</div>
                        </div>

                        <div class="card-footer bg-white border-0 pt-0">
                            <span class="btn btn-outline-dark btn-sm w-100">Vedi dettaglio</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-layouts.app>
