<x-app-layout>
    <div class="container mt-5" style="padding: 40px;">
        <h1 style="color: #ff69b4; margin-bottom: 20px; font-weight: bold;">My Pink Playlist</h1>
        
        <div class="mb-4 text-end" style="margin-bottom: 20px;">
            <a href="{{ route('songs.create') }}" class="btn" style="background-color: #ff69b4; color: black; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; text-transform: uppercase; font-size: 0.85rem;">+ Add New Song</a>
        </div>

        <div class="card p-4" style="background-color: #1e1e1e; color: white; border: 1px solid #ff69b4; border-radius: 10px; padding: 20px;">
            <table class="table table-dark table-striped" style="width: 100%; border-collapse: collapse; text-align: left; vertical-align: middle;">
                <thead>
                    <tr style="border-bottom: 2px solid #ff69b4; color: #ff69b4;">
                        <th style="padding: 12px; font-weight: bold;">Title</th>
                        <th style="padding: 12px; font-weight: bold;">Artist</th>
                        <th style="padding: 12px; font-weight: bold;">Genre</th>
                        <th style="padding: 12px; font-weight: bold;">Created Date</th> <th style="padding: 12px; text-align: center; font-weight: bold;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($songs as $song)
                    <tr style="border-bottom: 1px solid #333; background: transparent;">
                        <td style="padding: 12px; color: white;">{{ $song->title }}</td>
                        <td style="padding: 12px; color: #b3b3b3;">{{ $song->artist }}</td>
                        <td style="padding: 12px;"><span class="badge border border-pink text-pink bg-dark px-2 py-1" style="color: #ff69b4; border-color: #ff69b4 !important;">{{ $song->genre }}</span></td>
                        <td style="padding: 12px; color: #aaa; font-size: 0.9rem;">{{ $song->created_at ? $song->created_at->format('M d, Y') : 'N/A' }}</td>
                        <td style="padding: 12px; text-align: center;">
                            
                            <a href="{{ route('songs.edit', $song->id) }}" style="color: #ff69b4; text-decoration: none; font-weight: bold; margin-right: 20px; font-size: 0.9rem;" class="hover-opacity">
                            Edit
                            </a>
                            
                            <form action="{{ route('songs.destroy', $song->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; font-size: 0.9rem;" onclick="return confirm('Are you sure you want to delete this song?')">
                                Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 30px; color: #aaa;">No songs found. Click "+ Add New Song" to build your list!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .hover-opacity:hover {
            opacity: 0.8;
            text-decoration: underline !important;
        }
    </style>
</x-app-layout>