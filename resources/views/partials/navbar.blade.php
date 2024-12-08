<nav class="navbar navbar-expand-lg navbar-dark bg-success py-3 shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center me-auto" href="{{ route('home') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-tree me-2" viewBox="0 0 16 16">
          <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777l-3-4.5zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507z"/>
        </svg>
        <span class="h4 mb-0 text-white">Wild Time Zoo</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse fs-4" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('animals.*') ? 'active' : '' }}" href="{{ route('animals.index') }}">Animals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('testimonials.*') ? 'active' : '' }}" href="{{ route('testimonials.index') }}">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('contact.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
          </li>
        </ul>
        
        <!-- Authentication Links -->
        <ul class="navbar-nav">
          @guest
            <li class="nav-item">
              <a class="nav-link btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-light text-success" href="{{ route('register') }}">Register</a>
            </li>
          @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" alt="{{ Auth::user()->name }}" class="rounded-circle me-2" width="32" height="32">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                  <i class="bi bi-person-circle me-2"></i>Profile
                </a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                      <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>