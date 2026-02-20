<x-layouts.app title="Profilo">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5 bg-light d-flex align-items-center justify-content-center p-4">
                        <img class="img-fluid rounded-4" alt="random"
                            src="https://picsum.photos/600/600?random={{ auth()->id() }}">
                    </div>

                    <div class="col-md-7 p-4 p-lg-5">
                        <h1 class="h4 fw-bold mb-4">Dati profilo</h1>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.store') }}">
                            @csrf

                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label">First name</label>
                                    <input name="first_name"
                                        value="{{ old('first_name', auth()->user()->profile?->first_name) }}"
                                        type="text" class="form-control form-control-lg rounded-4" />
                                </div>
                                <div class="col">
                                    <label class="form-label">Last name</label>
                                    <input name="last_name"
                                        value="{{ old('last_name', auth()->user()->profile?->last_name) }}"
                                        type="text" class="form-control form-control-lg rounded-4" />
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Address</label>
                                <input name="address" value="{{ old('address', auth()->user()->profile?->address) }}"
                                    type="text" class="form-control form-control-lg rounded-4" />
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label">Country</label>
                                    <input name="country"
                                        value="{{ old('country', auth()->user()->profile?->country) }}" type="text"
                                        class="form-control form-control-lg rounded-4" />
                                </div>
                                <div class="col">
                                    <label class="form-label">Postal code</label>
                                    <input name="postal_code"
                                        value="{{ old('postal_code', auth()->user()->profile?->postal_code) }}"
                                        type="text" class="form-control form-control-lg rounded-4" />
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Phone</label>
                                <input name="phone" value="{{ old('phone', auth()->user()->profile?->phone) }}"
                                    type="text" class="form-control form-control-lg rounded-4" />
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Email</label>
                                <input value="{{ auth()->user()->email }}" type="email"
                                    class="form-control form-control-lg rounded-4" disabled />
                                <div class="text-muted small mt-1">Email gestita nella tabella users</div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-4">
                                Salva profilo
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
