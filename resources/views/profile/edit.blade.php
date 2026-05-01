<x-app-layout>
    <div style="
        padding: 2em 4em;
        gap: 2em;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    ">
        <a href="{{ route('profile.index') }}"
            style="display: inline-block; color: #111; text-decoration: none; margin: 0 0 2em 1em;">
            ← Back
        </a>
        <div style="
            padding: 0 2em;
            display: flex;
            flex-direction: column;
            gap: 2em;
        ">
            <div>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
