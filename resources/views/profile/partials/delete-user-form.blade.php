<section class="space-y-6">
    <header>
        <h2 class="h4 fw-bold">
            Delete Account
        </h2>

        <p class="mt-1 text-muted">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button 
        type="button"
        class="btn btn-danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Delete Account</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
            @csrf
            @method('delete')

            <h2 class="h5 fw-bold text-dark">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-muted">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <div class="mt-4">
                <label for="password" class="form-label sr-only">Password</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="Password"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" x-on:click="$dispatch('close')">
                    Cancel
                </button>

                <button type="submit" class="btn btn-danger">
                    Delete Account
                </button>
            </div>
        </form>
    </x-modal>
</section>
