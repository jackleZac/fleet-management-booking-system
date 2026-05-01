<style>
    .delete-section {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .delete-title {
        font-size: 1.2em;
        font-weight: 600;
        color: #111827;
        margin: 0;
    }

    .delete-description {
        margin-top: 4px;
        font-size: 1em;
        color: #4b5563;
    }

    .danger-button {
        background: #dc2626;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
    }

    .danger-button:hover {
        background: #b91c1c;
    }

    .secondary-button {
        background: #e5e7eb;
        color: #111827;
        border: none;
        padding: 10px 16px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
    }

    .secondary-button:hover {
        background: #d1d5db;
    }

    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
    }

    .modal.show {
        display: flex;
    }

    .modal-content {
        background: white;
        padding: 24px;
        border-radius: 6px;
        width: 400px;
        max-width: 90%;
    }

    .delete-modal-field {
        margin-top: 24px;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .input {
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
    }

    .error {
        font-size: 13px;
        color: #dc2626;
    }

    .delete-modal-actions {
        margin-top: 24px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }
</style>

<section class="delete-section">
    <div>
        <header>
            <h2 class="delete-title">
                {{ __('Delete Account') }}
            </h2>

            <p class="delete-description">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
        </header>

        <!-- Open Modal Button -->
        <button class="danger-button" onclick="openModal()">
            {{ __('Delete Account') }}
        </button>
    </div>

    <!-- Modal -->
    <div id="deleteModal" class="modal {{ $errors->userDeletion->isNotEmpty() ? 'show' : '' }}">
        <div class="modal-content">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 class="delete-title">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="delete-description">
                    {{ __('Once your account is deleted, all data will be permanently deleted. Enter your password to confirm.') }}
                </p>

                <div class="delete-modal-field">
                    <label for="password">{{ __('Password') }}</label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="input"
                        placeholder="{{ __('Password') }}"
                    >

                    @if ($errors->userDeletion->get('password'))
                        <div class="error">
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="delete-modal-actions">
                    <button type="button" class="secondary-button" onclick="closeModal()">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="danger-button">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function openModal() {
        document.getElementById('deleteModal').classList.add('show');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.remove('show');
    }
</script>