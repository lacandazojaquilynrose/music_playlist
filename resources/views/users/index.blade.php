<x-app-layout>
    <div class="container mt-5" style="padding: 40px;">
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background-color: #198754; color: white; border: 1px solid #ff69b4; border-radius: 8px;">
             {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="background-color: #dc3545; color: white; border: 1px solid #ff69b4; border-radius: 8px;">
             {{ session('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h1 style="color: #ff69b4; margin-bottom: 20px; font-weight: bold;">User Management Dashboard</h1>
        
        <div class="mb-4 text-end" style="margin-bottom: 20px;">
            <a href="{{ route('users.create') }}" class="btn" style="background-color: #ff69b4; color: black; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; text-transform: uppercase; font-size: 0.85rem;">+ Create New User</a>
        </div>

        <div class="card p-4" style="background-color: #1e1e1e; color: white; border: 1px solid #ff69b4; border-radius: 10px; padding: 20px;">
            <table class="table table-dark table-striped" style="width: 100%; border-collapse: collapse; text-align: left; vertical-align: middle;">
                <thead>
                    <tr style="border-bottom: 2px solid #ff69b4; color: #ff69b4;">
                        <th style="padding: 12px; font-weight: bold;">User Name</th>
                        <th style="padding: 12px; font-weight: bold;">Email Address</th>
                        <th style="padding: 12px; font-weight: bold;">Created Date</th>
                        <th style="padding: 12px; text-align: center; font-weight: bold;">Management Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr style="border-bottom: 1px solid #333; background: transparent;">
                        <td style="padding: 12px; color: white; font-weight: 600;">{{ $user->name }}</td>
                        <td style="padding: 12px; color: #b3b3b3;">{{ $user->email }}</td>
                        <td style="padding: 12px; color: #aaa; font-size: 0.9rem;">{{ $user->created_at->format('M d, Y') }}</td>
                        <td style="padding: 12px; text-align: center;">
                            
                            <a href="{{ route('users.edit', $user->id) }}" style="color: #ff69b4; text-decoration: none; font-weight: bold; margin-right: 20px; font-size: 0.9rem;" class="hover-opacity">
                                Edit
                            </a>
                            
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; font-size: 0.9rem;" onclick="return confirm('Are you sure you want to permanently delete this user account?')">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 30px; color: #aaa;">No registered platform users found.</td>
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