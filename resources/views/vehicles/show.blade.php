<x-layouts.app :title="$vehicle['title']">
    <a href="{{ route('vehicles.index') }}" class="text-decoration-none">← Torna agli annunci</a>

    <div class="card shadow-sm border-0 mt-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge text-bg-secondary text-uppercase">{{ $vehicle['type'] }}</span>
                <span class="fs-4 fw-bold">€ {{ $vehicle['price'] }}</span>
            </div>

            <h1 class="h3 fw-bold mb-3">{{ $vehicle['title'] }}</h1>

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted">Città</div>
                        <div class="fw-semibold">{{ $vehicle['city'] }}</div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="p-3 bg-light rounded-3">
                        <div class="text-muted">Visite</div>
                        <div class="fw-semibold">{{ $vehicle['views'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
