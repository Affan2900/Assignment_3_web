<section class="container-fluid bg-warning text-dark delete-account-section">
    <div class="card border-danger mb-3">
        <div class="card-header bg-danger text-white">
            <h2 class="card-title h4">
                Delete Account
            </h2>
        </div>
        <div class="card-body">
            <p class="card-text text-muted">
                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
            </p>

            <x-danger-button 
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            >{{ __('Delete Account') }}</x-danger-button>

            <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Are you sure you want to delete your account?
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                    </p>

                    <div class="mt-6">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <x-text-input
                            id="password"
                            name="password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}"
                        />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            Cancel
                        </x-secondary-button>

                        <x-danger-button class="ms-3">
                            Delete Account
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>
        </div>
    </div>
</section>

<style>
.delete-account-section {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" width="80" height="80"><rect width="80" height="80" fill="%23f0ad4e"/><path d="M0 0 L80 0 L40 40 Z" fill="%23ffd700" opacity="0.3"/><path d="M80 80 L0 80 L40 40 Z" fill="%23ffd700" opacity="0.3"/></svg>');
    background-repeat: repeat;
}
</style>
