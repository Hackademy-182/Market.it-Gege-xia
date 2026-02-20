<x-layouts.app :title="$vehicle['title']">
    <a href="{{ route('vehicles.index') }}" class="text-decoration-none">← Torna agli annunci</a>

    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge text-bg-secondary text-uppercase">{{ $vehicle['type'] }}</span>
                <span class="fw-bold fs-3">€ {{ $vehicle['price'] }}</span>
            </div>

            <h1 class="h3 fw-bold mb-4">{{ $vehicle['title'] }}</h1>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="p-3 bg-light rounded-4">
                        <div class="text-muted">Città</div>
                        <div class="fw-semibold">{{ $vehicle['city'] }}</div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="p-3 bg-light rounded-4">
                        <div class="text-muted">Visite</div>
                        <div class="fw-semibold">{{ $vehicle['views'] }}</div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex gap-2">
                <a class="btn btn-outline-dark" href="{{ route('vehicles.index') }}">Torna</a>
                @auth
                    @if ($vehicle->user_id === auth()->id())
                        <a class="btn btn-outline-primary" href="{{ route('vehicles.edit', $vehicle) }}">Modifica</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</x-layouts.app>
