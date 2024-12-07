<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Animal Shelter</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('animals.index') }}">Animals</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('services.index') }}">Services</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('testimonials.index') }}">Testimonials</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>
          </ul>
          
          <!-- Authentication Links -->
          <ul class="navbar-nav ms-auto">
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
              @else
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                          {{ Auth::user()->name }}
                      </a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                          <li>
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <button type="submit" class="dropdown-item">Logout</button>
                              </form>
                          </li>
                      </ul>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>