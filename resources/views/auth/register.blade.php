<x-layouts.app title="Register">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-5">

            <h1 class="mb-4">Create account</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" class="p-4 border rounded-4 shadow-sm">
                @csrf

                <div class="form-outline mb-4">
                    <input name="name" type="text" class="form-control form-control-lg"
                        value="{{ old('name') }}" />
                    <label class="form-label">Name</label>
                </div>

                <div class="form-outline mb-4">
                    <input name="email" type="email" class="form-control form-control-lg"
                        value="{{ old('email') }}" />
                    <label class="form-label">Email</label>
                </div>

                <div class="form-outline mb-4">
                    <input name="password" type="password" class="form-control form-control-lg" />
                    <label class="form-label">Password</label>
                </div>

                <div class="form-outline mb-4">
                    <input name="password_confirmation" type="password" class="form-control form-control-lg" />
                    <label class="form-label">Confirm password</label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">Register</button>

                <div class="text-center">
                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </form>

        </div>
    </div>
</x-layouts.app>
