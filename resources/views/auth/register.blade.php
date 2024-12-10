<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="p-4 border rounded shadow-sm bg-light">
        @csrf

        <h2 class="text-center mb-4 fw-bold fs-1" style="color: #4CAF50; font-family: 'Georgia', serif;">
            Welcome to Wild Time Zoo
        </h2>
        <p class="text-center mb-4 text-muted">Register to explore the wild!</p>

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label fw-bold" style="color: #5D4037;">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-bold" style="color: #5D4037;">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" 
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
            <input id="password" type="password" name="password" required autocomplete="new-password" 
                class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-bold" style="color: #5D4037;">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                class="form-control @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Already Registered -->
        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none" style="color: #4CAF50;">
                {{ __('Already registered?') }}
            </a>
        </div>

        <!-- Submit Button -->
        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success fw-bold" style="background-color: #4CAF50; border: none;">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
