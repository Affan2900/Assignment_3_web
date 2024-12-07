<div class="sidebar-sticky">
  <ul class="nav flex-column">
      @auth
          @if(Auth::user()->is_admin)
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.animals.index') }}">
                      Admin - Animals
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.services.index') }}">
                      Admin - Services
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.testimonials.index') }}">
                      Admin - Testimonials
                  </a>
              </li>
          @endif
      @endauth
      
      <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
      </li>
      @auth
          <li class="nav-item">
              <a class="nav-link" href="{{ route('testimonials.create') }}">
                  Submit Testimonial
              </a>
          </li>
      @endauth
  </ul>
</div>