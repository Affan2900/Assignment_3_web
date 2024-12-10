<section class="container-fluid bg-warning text-dark zoo-profile-section">
    <div class="card border-success mb-3">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h2 class="card-title h4 mb-0">
                Profile Information
            </h2>
            <a href="{{ route('home') }}" class="btn btn-light text-success">
                <i class="fas fa-home me-1"></i> Home
            </a>
        </div>
        <div class="card-body">
            <p class="card-text text-muted">
                Update your account's profile information and email address.
            </p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="form-control border-success" 
                        :value="old('name', $user->name)" 
                        required 
                        autofocus 
                        autocomplete="name"
                    />
                    <div class="invalid-feedback">
                        Please provide a valid name.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        class="form-control border-success" 
                        :value="old('email', $user->email)" 
                        required 
                        autocomplete="username"
                    />
                    <div class="invalid-feedback">
                        Please provide a valid email address.
                    </div>

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="alert alert-warning mt-3" role="alert">
                            Your email address is unverified.

                            <button 
                                form="send-verification" 
                                class="btn btn-link text-warning p-0 align-baseline"
                            >
                                Click here to re-send the verification email.
                            </button>

                            @if (session('status') === 'verification-link-sent')
                                <div class="alert alert-success mt-2" role="alert">
                                    A new verification link has been sent to your email address.
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>

                    @if (session('status') === 'profile-updated')
                        <div 
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-success"
                        >
                            Saved!
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>

<style>
.zoo-profile-section {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" width="80" height="80"><rect width="80" height="80" fill="%23f0ad4e"/><path d="M0 0 L80 0 L40 40 Z" fill="%23ffd700" opacity="0.3"/><path d="M80 80 L0 80 L40 40 Z" fill="%23ffd700" opacity="0.3"/></svg>');
    background-repeat: repeat;
}
</style>

<script>
// Bootstrap form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>