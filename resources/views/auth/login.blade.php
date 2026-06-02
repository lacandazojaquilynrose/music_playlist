<x-guest-layout>
    <div style="background-color: #121212; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        <div style="width: 100%; max-width: 400px; background-color: #1e1e1e; padding: 2rem; border-radius: 10px; border: 1px solid #ff69b4;">
            <h2 style="color: #ff69b4; text-align: center; margin-bottom: 20px;">Login</h2>
            
            @if ($errors->any())
                <div style="background-color: rgba(220, 53, 69, 0.2); border: 1px solid #dc3545; color: #dc3545; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 0.9rem;">
                    <ul style="margin: 0; padding-left: 15px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="color: white; display: block; margin-bottom: 5px;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 8px; background: #212121; border: 1px solid #ff69b4; color: white; box-sizing: border-box;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="color: white; display: block; margin-bottom: 5px;">Password</label>
                    <input type="password" name="password" required style="width: 100%; padding: 8px; background: #212121; border: 1px solid #ff69b4; color: white; box-sizing: border-box;">
                </div>
                <button type="submit" style="width: 100%; padding: 10px; background-color: #ff69b4; border: none; font-weight: bold; cursor: pointer; color: black;">Log in</button>
            </form>
            
            <div style="text-align: center; margin-top: 15px; color: white; font-size: 0.9rem;">
                Don't have an account yet? <a href="{{ route('register') }}" style="color: #ff69b4; text-decoration: none;">Register</a>
            </div>
        </div>
    </div>

    @if (session('status'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
        <div id="regToast" class="toast align-items-center text-white bg-dark border-0" role="alert" aria-live="assertive" aria-atomic="true" style="border: 1px solid #ff69b4 !important;">
            <div class="d-flex">
                <div class="toast-body">
                    <span style="color: #ff69b4; font-weight: bold;">✨ Notification:</span> {{ session('status') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastEl = document.getElementById('regToast');
            if (toastEl) {
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    </script>
    @endif
</x-guest-layout>