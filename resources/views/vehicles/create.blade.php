<x-layouts.app title="Vendi">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">

            <h1 class="mb-4">Vendi annuncio</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('vehicles.store') }}" class="p-4 border rounded-4 shadow-sm">
                @csrf

                <div class="form-outline mb-4">
                    <input name="title" value="{{ old('title') }}" class="form-control form-control-lg" />
                    <label class="form-label">Titolo</label>
                </div>

                <div class="mb-4">
                    <select name="type" class="form-select form-select-lg">
                        <option value="">Tipo</option>
                        <option value="auto" @selected(old('type') === 'auto')>Auto</option>
                        <option value="moto" @selected(old('type') === 'moto')>Moto</option>
                        <option value="barca" @selected(old('type') === 'barca')>Barca</option>
                        <option value="motoscafo" @selected(old('type') === 'motoscafo')>Motoscafo</option>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <input name="price" value="{{ old('price') }}" type="number"
                        class="form-control form-control-lg" />
                    <label class="form-label">Prezzo (€)</label>
                </div>

                <div class="form-outline mb-4">
                    <input name="city" value="{{ old('city') }}" class="form-control form-control-lg" />
                    <label class="form-label">Città</label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Pubblica</button>
            </form>

        </div>
    </div>
</x-layouts.app>
