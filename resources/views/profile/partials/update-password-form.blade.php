<section class="container-fluid bg-warning text-dark password-section">
    <div class="card border-success mb-3">
        <div class="card-header bg-success text-white">
            <h2 class="card-title h4">
                Update Password
            </h2>
        </div>
        <div class="card-body">
            <p class="card-text text-muted">
                Ensure your account is using a long, random password to stay secure.
            </p>

            <form method="post" action="{{ route('password.update') }}" class="needs-validation mt-6 space-y-6" novalidate>
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label">Current Password</label>
                    <input 
                        id="update_password_current_password" 
                        name="current_password" 
                        type="password" 
                        class="form-control border-success" 
                        required
                    />
                    <div class="invalid-feedback">
                        Please provide a valid current password.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="update_password_password" class="form-label">New Password</label>
                    <input 
                        id="update_password_password" 
                        name="password" 
                        type="password" 
                        class="form-control border-success" 
                        required
                    />
                    <div class="invalid-feedback">
                        Please provide a valid new password.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                    <input 
                        id="update_password_password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        class="form-control border-success" 
                        required
                    />
                    <div class="invalid-feedback">
                        Please confirm your new password.
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-success">
                        Save
                    </button>

                    @if (session('status') === 'password-updated')
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
.password-section {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" width="80" height="80"><rect width="80" height="80" fill="%23f0ad4e"/><path d="M0 0 L80 0 L40 40 Z" fill="%23ffd700" opacity="0.3"/><path d="M80 80 L0 80 L40 40 Z" fill="%23ffd700" opacity="0.3"/></svg>');
    background-repeat: repeat;
}
</style>
