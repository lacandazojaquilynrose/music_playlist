<x-app-layout>
    <div class="container mt-5" style="padding: 40px; max-width: 600px; margin: 0 auto;">
        
        <h1 style="color: #ff69b4; margin-bottom: 25px; font-weight: bold; text-align: center;">Add New Song</h1>

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
            <form action="{{ route('songs.store') }}" method="POST">
                @csrf

                <div class="mb-4" style="margin-bottom: 20px;">
                    <label for="title" style="color: white; display: block; margin-bottom: 8px; font-weight: bold;">Song Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required 
                           style="width: 100%; padding: 12px; background-color: #111; border: 1px solid #ff69b4; border-radius: 5px; color: white; box-sizing: border-box;">
                </div>

                <div class="mb-4" style="margin-bottom: 20px;">
                    <label for="artist" style="color: white; display: block; margin-bottom: 8px; font-weight: bold;">Artist Name</label>
                    <input type="text" id="artist" name="artist" value="{{ old('artist') }}" required 
                           style="width: 100%; padding: 12px; background-color: #111; border: 1px solid #ff69b4; border-radius: 5px; color: white; box-sizing: border-box;">
                </div>

                <div class="mb-4" style="margin-bottom: 25px;">
                    <label for="genre" style="color: white; display: block; margin-bottom: 8px; font-weight: bold;">Genre</label>
                    <input type="text" id="genre" name="genre" value="{{ old('genre') }}" required 
                           style="width: 100%; padding: 12px; background-color: #111; border: 1px solid #ff69b4; border-radius: 5px; color: white; box-sizing: border-box;">
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('songs.index') }}" style="color: #ff69b4; text-decoration: none; font-weight: bold;">Cancel</a>
                    <button type="submit" class="btn" style="background-color: #ff69b4; color: black; padding: 12px 25px; border: none; border-radius: 5px; font-weight: bold; text-transform: uppercase; font-size: 0.85rem; cursor: pointer;">
                         Save Song
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>