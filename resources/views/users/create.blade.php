<x-app-layout>
    <div class="container mt-5" style="padding: 40px; max-width: 600px;">
        
        <h1 style="color: #ff69b4; margin-bottom: 25px; font-weight: bold; text-align: center;">Create New User</h1>

        @if ($errors->any())
        <div class="alert alert-danger mb-4" style="background-color: #dc3545; color: white; border: 1px solid #ff69b4; border-radius: 8px; padding: 15px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card p-4" style="background-color: #1e1e1e; color: white; border: 1px solid #ff69b4; border-radius: 10px; padding: 30px;">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-4" style="margin-bottom: 20px;">
                    <label for="name" style="color: white; display: block; margin-bottom: 8px; font-weight: bold;">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                           style="width: 100%; padding: 12px; background-color: #111; border: 1px solid #ff69b4; border-radius: 5px; color: white; box-sizing: border-box;">
                </div>

                <div class="mb-4" style="margin-bottom: 20px;">
                    <label for="email" style="color: white; display: block; margin-bottom: 8px; font-weight: bold;">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                           style="width: 100%; padding: 12px; background-color: #111; border: 1px solid #ff69b4; border-radius: 5px; color: white; box-sizing: border-box;">
                </div>

                <div class="mb-4" style="margin-bottom: 20px;">
                    <label for="password" style="color: white; display: block; margin-bottom: 8px; font-weight: bold;">Password</label>
                    <input type="password" id="password" name="password" required 
                           style="width: 100%; padding: 12px; background-color: #111; border: 1px solid #ff69b4; border-radius: 5px; color: white; box-sizing: border-box;">
                </div>

                <div class="mb-4" style="margin-bottom: 25px;">
                    <label for="password_confirmation" style="color: white; display: block; margin-bottom: 8px; font-weight: bold;">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required 
                           style="width: 100%; padding: 12px; background-color: #111; border: 1px solid #ff69b4; border-radius: 5px; color: white; box-sizing: border-box;">
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('users.index') }}" style="color: #ff69b4; text-decoration: none; font-weight: bold;">Cancel</a>
                    <button type="submit" class="btn" style="background-color: #ff69b4; color: black; padding: 12px 25px; border: none; border-radius: 5px; font-weight: bold; text-transform: uppercase; font-size: 0.85rem; cursor: pointer;">
                         Save User
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>