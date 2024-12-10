<nav class="navbar navbar-expand-lg navbar-light bg-warning border-bottom border-success">
    <div class="container-fluid">
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            

            <!-- User Dropdown -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-outline-success" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-success" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item text-white" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user-cog me-1"></i> {{ __('Profile') }}
                            </a>
                        </li>
                        <li><hr class="dropdown-divider bg-light"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-white">
                                    <i class="fas fa-sign-out-alt me-1"></i> {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Wild Zoo Theme Enhancements */
.navbar {
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" width="80" height="80"><rect width="80" height="80" fill="%23f0ad4e"/><path d="M0 0 L80 0 L40 40 Z" fill="%23ffd700" opacity="0.3"/><path d="M80 80 L0 80 L40 40 Z" fill="%23ffd700" opacity="0.3"/></svg>');
    background-repeat: repeat;
}

.dropdown-menu {
    background-color: #28a745 !important;
    border: 2px solid #ffc107;
}

.dropdown-item:hover {
    background-color: #218838;
    color: #fff !important;
}

.nav-link {
    color: #333;
    padding: 0.75rem 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border-radius: 0.5rem;
 }
 
 .nav-link:hover {
    background-color: #28a745;
    color: #007bff;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transform: translateY(-3px);
 }


</style>