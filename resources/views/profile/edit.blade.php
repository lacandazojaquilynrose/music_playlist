<x-app-layout>
    <style>
        .profile-workspace h2 {
            color: #ff69b4 !important;
            font-weight: bold !important;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }
        .profile-workspace p {
            color: #b3b3b3 !important;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }
        .profile-workspace label {
            color: #ffffff !important;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
        /* Typical unified card component design styling */
        .profile-card-custom {
            background-color: #1e1e1e !important;
            border: 1px solid #ff69b4 !important;
            border-radius: 8px;
            padding: 1.5rem;
        }
        /* Bootstrap uniform spacing fixes for the internal forms */
        .profile-workspace form > div {
            margin-bottom: 1.25rem;
        }
        /* Force custom text-input components to take up proper full alignments */
        .profile-workspace input[type="text"],
        .profile-workspace input[type="email"],
        .profile-workspace input[type="password"] {
            background-color: #121212 !important;
            color: white !important;
            border: 1px solid #ff69b4 !important;
            border-radius: 6px;
            padding: 0.6rem;
            width: 100% !important;
            display: block;
        }
        /* Style secondary layout actions and save buttons uniform to songs page */
        .profile-workspace button:not(.btn-danger):not(.navbar-toggler) {
            background-color: #ff69b4 !important;
            color: black !important;
            font-weight: bold !important;
            border: none !important;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            text-transform: uppercase;
            font-size: 0.875rem;
        }
        .profile-workspace button:hover {
            opacity: 0.9;
        }
        /* Avatar Element styling rules */
        .avatar-view-card {
            background-color: #1e1e1e !important;
            border: 1px solid #ff69b4 !important;
            border-radius: 8px;
            padding: 2rem 1.5rem;
        }
        .avatar-frame {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            border: 3px solid #ff69b4;
            object-fit: cover;
            margin: 0 auto 1rem auto;
            display: block;
        }
        .avatar-text-fallback {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background-color: #ff69b4;
            color: black;
            font-size: 2.5rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
            border: 3px solid #ff69b4;
        }
    </style>

    <div class="container py-5 profile-workspace">
        <div class="row g-4">
            
            <div class="col-md-4">
                <div class="avatar-view-card text-center shadow">
                    @if($user->profile_image)
                        <img src="{{ asset('uploads/profiles/' . $user->profile_image) }}" alt="Profile Picture" class="avatar-frame shadow">
                    @else
                        <div class="avatar-text-fallback shadow">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                    
                    <h3 class="h5 text-pink fw-bold mb-1">{{ $user->name }}</h3>
                    <p class="text-muted small mb-3" style="color: #b3b3b3 !important;">{{ $user->email }}</p>
                    
                    <div class="mt-3 pt-3 border-top border-secondary">
                        <span class="badge border border-pink text-pink px-3 py-2 bg-dark">Account Verified</span>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="d-flex flex-column gap-4">
                    
                    <div class="profile-card-custom shadow">
                        <div class="mb-3">
                            <label class="text-pink h6 mb-0" style="color: #ff69b4 !important; font-size: 1.25rem;">Upload Profile Picture</label>
                            <p class="text-muted small mb-2">Select an image file to update your system account picture container module.</p>
                            <button type="button" class="btn btn-sm btn-outline-pink text-pink border-pink w-100 py-2 bg-dark fw-bold" onclick="document.getElementById('hidden_profile_image_input').click();">
                            Upload new profile picture
                            </button>
                        </div>
                        <hr class="border-secondary my-4">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="profile-card-custom shadow">
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="profile-card-custom shadow border-danger">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>