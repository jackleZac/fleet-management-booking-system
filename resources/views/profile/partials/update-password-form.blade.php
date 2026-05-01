<style>
    .password-section {
        background: #ffffff;
    }

    .password-title {
        font-size: 1.2em;
        font-weight: 600;
        color: #111827;
        margin: 0;
    }

    .password-description {
        margin-top: 4px;
        font-size: 1em;
        color: #4b5563;
    }

    .password-form {
        margin-top: 24px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 520px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .form-label {
        font-size: 0.9em;
        font-weight: 500;
        color: #374151;
    }

    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 1em;
        outline: none;
    }

    .form-input:focus {
        border-color: #06457d;
        box-shadow: 0 0 0 3px rgba(6, 69, 125, 0.15);
    }

    .form-error {
        font-size: 13px;
        color: #dc2626;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .save-button {
        background: #06457d;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1em;
        font-weight: 500;
    }

    .save-button:hover {
        background: #04365f;
    }

    .saved-message {
        font-size: 1em;
        color: #4b5563;
    }
</style>

<section class="password-section">
    <header>
        <h2 class="password-title">
            {{ __('Update Password') }}
        </h2>

        <p class="password-description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="password-form">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="current_password" class="form-label">
                {{ __('Current Password') }}
            </label>

            <input
                id="current_password"
                type="password"
                name="current_password"
                autocomplete="current-password"
                class="form-input"
            >

            @if ($errors->updatePassword->get('current_password'))
                <div class="form-error">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password" class="form-label">
                {{ __('New Password') }}
            </label>

            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                class="form-input"
            >

            @if ($errors->updatePassword->get('password'))
                <div class="form-error">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">
                {{ __('Confirm Password') }}
            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                class="form-input"
            >

            @if ($errors->updatePassword->get('password_confirmation'))
                <div class="form-error">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="save-button">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="saved-message"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>