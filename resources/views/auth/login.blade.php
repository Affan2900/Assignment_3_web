<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success text-center mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="p-4 border rounded shadow-sm bg-light">
        @csrf

        <h2 class="text-center mb-4" style="color: #4CAF50; font-family: 'Georgia', serif;">
            Welcome Back to Wild Time Zoo
        </h2>
        <p class="text-center mb-4 text-muted">Log in to continue your adventure!</p>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold" style="color: #5D4037;">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-bold" style="color: #5D4037;">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
            <label for="remember_me" class="form-check-label" style="color: #5D4037;">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Forgot Password and Login Button -->
        <div class="d-flex justify-content-between align-items-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #4CAF50;">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button type="submit" class="btn btn-success fw-bold" style="background-color: #4CAF50; border: none;">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
