<div class="sidebar-sticky bg-light p-3">
    <ul class="nav flex-column">
        @auth
            @if(Auth::user()->is_admin)
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="{{ route('admin.animals.index') }}">
                        Admin - Animals
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link fs-5" href="{{ route('admin.services.index') }}">
                        Admin - Services
                    </a>
                </li>
            
            @endif
        @endauth
  
        @auth
            <li class="nav-item mb-3">
                <a class="nav-link fs-5" href="{{ route('profile.edit') }}">
                    Profile
                </a>
            </li>
        @endauth
            <li class="nav-item mb-3">
                <a class="nav-link fs-5" href="{{ route('animals.index') }}">
                    Animals
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link fs-5" href="{{ route('services.index') }}">
                    Services
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link fs-5" href="{{ route('testimonials.index') }}">
                    Testimonials
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link fs-5" href="{{ route('contact.index') }}">
                    Contact Us
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link fs-5" href="{{ route('about') }}">
                    About Us
                </a>
            </li>
    </ul>
 </div>
 
 <style>
 .nav-link {
    color: #333;
    padding: 0.75rem 1rem;
    text-decoration: none;
    transition: all 0.3s ease;
    border-radius: 0.5rem;
 }
 
 .nav-link:hover {
    background-color: #f8f9fa;
    color: #007bff;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transform: translateY(-3px);
 }
 </style>