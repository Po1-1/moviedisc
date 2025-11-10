<section>
    <header>
        <h2 class="h4 fw-bold">
            Delete Account
        </h2>

        <p class="mt-1">
            Once your account is deleted, all of its resources and data will be permanently deleted.
        </p>
    </header>

    <!-- Tombol untuk memicu modal Bootstrap -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        Delete Account
    </button>

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">Are you sure you want to delete your account?</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                        <div class="mt-4">
                            <label for="password_delete" class="form-label sr-only">Password</label>
                            <input 
                                id="password_delete" 
                                name="password" 
                                type="password" 
                                class="form-control" 
                                placeholder="Password" 
                                required 
                            />
                            {{-- Menampilkan error validasi password --}}
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Script untuk membuka kembali modal secara otomatis jika ada error validasi password --}}
@if($errors->userDeletion->isNotEmpty())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var confirmUserDeletionModal = new bootstrap.Modal(document.getElementById('confirmUserDeletionModal'));
            confirmUserDeletionModal.show();
        });
    </script>
@endif
