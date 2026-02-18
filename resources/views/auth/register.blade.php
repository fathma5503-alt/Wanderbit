@include('layout.head')

<div class="cards">
    <div class="card-body p-4">
        <h3 class="text-center mb-3">Create Account</h3>
        <p class="text-center text-muted mb-4">Join WanderBit & explore trips</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       required>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       required>

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       required>

                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       required>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary w-100">
                Sign Up
            </button>
        </form>

        <div class="text-center mt-3">
            <small>
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </small>
        </div>
    </div>
</div>

@include('layout.script')
