@include('layout.head')
@include('layout.header')

<div class="hero">
    <div class="container">
        <div class="row justify-content-center align-items-center" >
            {{-- <div class="col-lg-5 col-md-7">

                <div class="card shadow border-0 rounded-4"> --}}
                    <div class="card-body p-4">

                        <h3 class="text-center mb-4">
                            Welcome Back 👋
                        </h3>

                        {{-- Error message --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email') }}"
                                       required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       required>
                            </div>

                            <!-- Remember -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit"
                                    class="btn btn-primary w-100 py-2">
                                Login
                            </button>
                        </form>

                        <p class="text-center mt-3 mb-0">
                            Don’t have an account?
                            <a href="{{ route('register') }}">Create one</a>
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('layout.script')
