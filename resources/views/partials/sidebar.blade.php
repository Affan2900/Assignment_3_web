<div class="sidebar-sticky bg-light border-right p-3">
    <ul class="nav flex-column">
        @auth
            @if(Auth::user()->is_admin)
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('admin.animals.index') }}">
                        <i class="bi bi-boxes"></i> Admin - Animals
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('admin.services.index') }}">
                        <i class="bi bi-briefcase"></i> Admin - Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('admin.testimonials.index') }}">
                        <i class="bi bi-chat-left-quote"></i> Admin - Testimonials
                    </a>
                </li>
            @endif
        @endauth
  
        <li class="nav-item">
            <a class="nav-link text-secondary" href="{{ route('home') }}">
                <i class="bi bi-house"></i> Dashboard
            </a>
        </li>
        @auth
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{ route('testimonials.create') }}">
                    <i class="bi bi-pencil-square"></i> Submit Testimonial
                </a>
            </li>
        @endauth
    </ul>
  </div>

  
<style>

.nav-link {
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #0056b3;
    text-decoration: underline;
}

</style>