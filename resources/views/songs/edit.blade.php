<x-app-layout>
    <div class="container mt-5" style="padding: 40px; max-width: 600px; margin: 0 auto;">
        <div class="card p-4" style="background-color: #1e1e1e; color: white; border: 1px solid #ff69b4; border-radius: 10px; padding: 30px;">
            <h3 style="color: #ff69b4; margin-bottom: 25px; font-weight: bold;">Edit Song Details</h3>
            
            <form action="{{ route('songs.update', $song->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: white; font-weight: 600;">Song Title</label>
                    <input type="text" name="title" value="{{ $song->title }}" style="width: 100%; padding: 12px; background-color: #121212; color: white; border: 1px solid #ff69b4; border-radius: 6px;" required>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: white; font-weight: 600;">Artist</label>
                    <input type="text" name="artist" value="{{ $song->artist }}" style="width: 100%; padding: 12px; background-color: #121212; color: white; border: 1px solid #ff69b4; border-radius: 6px;" required>
                </div>
                
                <div style="margin-bottom: 25px;">
                    <label style="display: block; margin-bottom: 8px; color: white; font-weight: 600;">Genre</label>
                    <input type="text" name="genre" value="{{ $song->genre }}" style="width: 100%; padding: 12px; background-color: #121212; color: white; border: 1px solid #ff69b4; border-radius: 6px;" required>
                </div>
                
                <button type="submit" style="width: 100%; background-color: #ff69b4; color: black; padding: 12px; border: none; border-radius: 6px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.05rem; cursor: pointer;" class="hover-glow">Update Details</button>
                
                <a href="{{ route('songs.index') }}" style="display: block; text-align: center; margin-top: 15px; color: #b3b3b3; text-decoration: none; font-size: 0.9rem;" class="hover-underline">Cancel</a>
            </form>
        </div>
    </div>

    <style>
        .hover-glow:hover {
            opacity: 0.9;
            box-shadow: 0 0 12px rgba(255, 105, 180, 0.4);
        }
        .hover-underline:hover {
            text-decoration: underline !important;
            color: white !important;
        }
    </style>
</x-app-layout>