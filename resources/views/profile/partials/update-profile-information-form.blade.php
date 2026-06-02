<section>
    <header>
        <h2 class="h5 text-pink mb-1">{{ __('Profile Information') }}</h2>
        <p class="text-sm text-muted mb-4">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('patch')

        <input type="file" id="hidden_profile_image_input" name="profile_image" accept="image/*" class="d-none" onchange="document.getElementById('profile-form-submit-btn').click();">

        <div class="mb-3">
            <label for="name" class="form-label text-white fw-bold">{{ __('Name') }}</label>
            <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="text-danger mt-1 small" :messages="$errors->get('name')" />
        </div>

        <div class="mb-4">
            <label for="email" class="form-label text-white fw-bold">{{ __('Email Address') }}</label>
            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="text-danger mt-1 small" :messages="$errors->get('email')" />
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" id="profile-form-submit-btn" class="btn btn-pink px-4 font-weight-bold fw-bold">{{ __('Save Changes') }}</button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small animate-fade">{{ __('Saved successfully.') }}</span>
            @endif
        </div>
    </form>
</section>