<x-layouts.app title="Vendi annuncio">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3 fw-bold mb-0">Vendi annuncio</h1>
                <a class="btn btn-outline-dark" href="{{ route('vehicles.index') }}">Torna</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('vehicles.store') }}"
                class="p-4 border-0 rounded-4 shadow-sm bg-white">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Titolo annuncio</label>
                    <input name="title" value="{{ old('title') }}" class="form-control form-control-lg"
                        placeholder="Es. Yamaha MT-07 2020" />
                </div>

                <div class="mb-4">
                    <label class="form-label">Tipo</label>
                    <select name="type" class="form-select form-select-lg">
                        <option value="">Seleziona</option>
                        <option value="auto" @selected(old('type') === 'auto')>Auto</option>
                        <option value="moto" @selected(old('type') === 'moto')>Moto</option>
                        <option value="barca" @selected(old('type') === 'barca')>Barca</option>
                        <option value="motoscafo" @selected(old('type') === 'motoscafo')>Motoscafo</option>
                    </select>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-md-6">
                        <label class="form-label">Prezzo (€)</label>
                        <input name="price" value="{{ old('price') }}" type="number"
                            class="form-control form-control-lg" placeholder="Es. 6200" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label">Città</label>
                        <input name="city" value="{{ old('city') }}" class="form-control form-control-lg"
                            placeholder="Es. Venezia" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Pubblica</button>

                <div class="text-center mt-3 text-muted">
                    L’annuncio viene salvato in modalità demo (poi lo colleghiamo al DB).
                </div>
            </form>

        </div>
    </div>
</x-layouts.app>
