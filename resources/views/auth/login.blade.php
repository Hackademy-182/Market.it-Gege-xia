<x-layouts.app title="Login">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-5">

            <h1 class="mb-4">Sign in</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="p-4 border rounded-4 shadow-sm">
                @csrf

                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="email" type="email" class="form-control form-control-lg"
                        value="{{ old('email') }}" />
                    <label class="form-label">Email address</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="password" type="password" class="form-control form-control-lg" />
                    <label class="form-label">Password</label>
                </div>

                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <div class="form-check">
                            <input name="remember" class="form-check-input" type="checkbox" value="1"
                                id="remember" />
                            <label class="form-check-label" for="remember"> Remember me </label>
                        </div>
                    </div>

                    <div class="col text-end">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">Sign in</button>

                <div class="text-center">
                    <p class="mb-0">Not a member? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>

        </div>
    </div>
</x-layouts.app>
