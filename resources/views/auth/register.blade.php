<x-guest-layout>
    <div style="background-color: #121212; min-height: 100vh; display: flex; align-items: center; justify-content: center; color: white;">
        <div style="width: 100%; max-width: 400px; background-color: #1e1e1e; padding: 2rem; border-radius: 10px; border: 1px solid #ff69b4;">
            <h2 style="color: #ff69b4; text-align: center; margin-bottom: 20px;">Register</h2>
            
            @if ($errors->any())
                <div style="background-color: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; color: #dc3545; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 0.9rem;">
                    <ul style="margin: 0; padding-left: 15px; color: #dc3545;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 8px; background: #212121; border: 1px solid #ff69b4; color: white; box-sizing: border-box;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; background: #212121; border: 1px solid #ff69b4; color: white; box-sizing: border-box;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Password</label>
                    <input type="password" name="password" required style="width: 100%; padding: 8px; background: #212121; border: 1px solid #ff69b4; color: white; box-sizing: border-box;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Confirm Password</label>
                    <input type="password" name="password_confirmation" required style="width: 100%; padding: 8px; background: #212121; border: 1px solid #ff69b4; color: white; box-sizing: border-box;">
                </div>
                <button type="submit" style="width: 100%; padding: 10px; background-color: #ff69b4; border: none; font-weight: bold; cursor: pointer; color: black;">Register</button>
            </form>

            <div style="text-align: center; margin-top: 15px; color: white; font-size: 0.9rem;">
                Already registered? <a href="{{ route('login') }}" style="color: #ff69b4; text-decoration: none;">Login Here!</a>
            </div>
        </div>
    </div>
</x-guest-layout>