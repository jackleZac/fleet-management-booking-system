<style>
    .profile-section {
        background: #ffffff;
    }

    .profile-title {
        font-size: 1.2em;
        font-weight: 600;
        color: #111827;
        margin: 0;
    }

    .profile-description {
        margin-top: 4px;
        font-size: 1em;
        color: #4b5563;
    }

    .profile-form {
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

    .verify-text {
        font-size: 1em;
        margin-top: 8px;
        color: #1f2937;
    }

    .verify-button {
        background: transparent;
        border: none;
        padding: 0;
        cursor: pointer;
        text-decoration: underline;
        font-size: 1em;
        color: #4b5563;
    }

    .verify-button:hover {
        color: #111827;
    }

    .success-message {
        margin-top: 8px;
        font-size: 1em;
        font-weight: 500;
        color: #16a34a;
    }

    .saved-message {
        font-size: 1em;
        color: #4b5563;
    }
</style>

<section class="profile-section">
    <header>
        <h2 class="profile-title">
            {{ __('Profile Information') }}
        </h2>

        <p class="profile-description">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')

        <div class="form-group">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="form-input"
            >

            @if ($errors->get('name'))
                <div class="form-error">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="form-input"
            >

            @if ($errors->get('email'))
                <div class="form-error">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="phone" class="form-label">{{ __('Phone') }}</label>
            <input
                id="phone"
                type="text"
                name="phone"
                value="{{ old('phone', $user->phone) }}"
                autocomplete="tel"
                class="form-input"
            >

            @if ($errors->get('phone'))
                <div class="form-error">
                    {{ $errors->first('phone') }}
                </div>
            @endif
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="verify-text">
                    {{ __('Your email address is unverified.') }}

                    <button type="submit" form="send-verification" class="verify-button">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="success-message">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="save-button">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
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