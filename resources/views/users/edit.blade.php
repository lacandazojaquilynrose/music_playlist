<x-app-layout>
    <div class="container mt-5" style="padding: 40px; display: flex; justify-content: center;">
        <div class="card p-4" style="background-color: #121212; color: white; border: 1px solid #ff69b4; border-radius: 10px; width: 100%; max-width: 500px; padding: 30px;">
            
            <h2 style="color: #ff69b4; margin-bottom: 25px; font-weight: bold; font-size: 1.8rem;">Edit User Details</h2>

            @if ($errors->any())
                <div class="alert alert-danger mb-4" style="background-color: #dc3545; color: white; padding: 12px; border-radius: 5px; font-size: 0.9rem;">
                    <ul class="mb-0" style="padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3" style="margin-bottom: 20px;">
                    <label for="name" class="form-label" style="color: white; font-weight: bold; display: block; margin-bottom: 8px;">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" style="width: 100%; background-color: #1e1e1e; border: 1px solid #ff69b4; color: white; padding: 10px; border-radius: 5px; box-sizing: border-box;" required>
                </div>

                <div class="mb-3" style="margin-bottom: 20px;">
                    <label for="email" class="form-label" style="color: white; font-weight: bold; display: block; margin-bottom: 8px;">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" style="width: 100%; background-color: #1e1e1e; border: 1px solid #ff69b4; color: white; padding: 10px; border-radius: 5px; box-sizing: border-box;" required>
                </div>

                <div class="mb-3" style="margin-bottom: 20px;">
                    <label for="password" class="form-label" style="color: white; font-weight: bold; display: block; margin-bottom: 8px;">New Password (Optional)</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password" style="width: 100%; background-color: #1e1e1e; border: 1px solid #ff69b4; color: white; padding: 10px; border-radius: 5px; box-sizing: border-box;">
                </div>

                <div class="mb-4" style="margin-bottom: 25px;">
                    <label for="password_confirmation" class="form-label" style="color: white; font-weight: bold; display: block; margin-bottom: 8px;">Confirm New Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat new password" style="width: 100%; background-color: #1e1e1e; border: 1px solid #ff69b4; color: white; padding: 10px; border-radius: 5px; box-sizing: border-box;">
                </div>

                <button type="submit" class="btn w-100" style="width: 100%; background-color: #ff69b4; color: black; padding: 12px; border: none; border-radius: 5px; font-weight: bold; text-transform: uppercase; cursor: pointer; font-size: 0.95rem; margin-bottom: 15px;">Update User Details</button>
                
                <div style="text-align: center;">
                    <a href="{{ route('users.index') }}" style="color: #aaa; text-decoration: none; font-size: 0.9rem;">Cancel</a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>