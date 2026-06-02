<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212121; border-bottom: 2px solid #ff69b4;">
    <div class="container-fluid">
        <a class="navbar-brand text-pink fw-bold" href="{{ route('dashboard') }}">MY PLAYLIST</a>
        
        <button class="navbar-toggler border-pink" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link text-pink" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="nav-link text-pink" href="/songs">Songs</a>
                
                <a class="nav-link text-pink" href="{{ route('users.index') }}">Users</a>
                
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-pink" href="#" role="button" data-bs-toggle="dropdown">Profile</a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" style="border: 1px solid #ff69b4;">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Account Settings</a></li>
                        <li><hr class="dropdown-divider border-secondary"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>