  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
      <div class="topbar">
          <div class="container">
              <div class="row">
                  <div class="col-sm-8 text-sm">
                      <div class="site-info">
                          <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                          <span class="divider">|</span>
                          <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                      </div>
                  </div>
                  <div class="col-sm-4 text-right text-sm">
                      <div class="social-mini-button">
                          <a href="#"><span class="mai-logo-facebook-f"></span></a>
                          <a href="#"><span class="mai-logo-twitter"></span></a>
                          <a href="#"><span class="mai-logo-dribbble"></span></a>
                          <a href="#"><span class="mai-logo-instagram"></span></a>
                      </div>
                  </div>
              </div> <!-- .row -->
          </div> <!-- .container -->
      </div> <!-- .topbar -->

      <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
          <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}"><span class="text-primary">Home</span>-Ray</a>

              <!-- <form action="#">
                  <div class="input-group input-navbar">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                      </div>
                      <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
                  </div>
              </form> -->

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupport">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('home') }}">Home</a>
                      </li>
                      <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('about') }}">About Us</a>
                      </li>
                      <!-- <li class="nav-item">
                          <a class="nav-link" href="doctors.html">Doctors</a>
                      </li> -->
                      <li class="nav-item {{ Route::currentRouteName() == 'services' ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('services') }}">Services</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="blog.html">News</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                      </li>
                      @auth
                      <li class="nav-item">
                          <div class="user-box dropdown">
                              <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <div class="user-info ps-3">
                                      <p class="user-name mb-0"><span class="text-primary">Hi, </span> {{ auth()->user()->first_name}}</p>
                                      <!-- <p class="designattion mb-0">xxx</p> -->
                                  </div>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end">
                                  <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                                  </li>
                                  <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                                  </li>
                                  <li>
                                      <div class="dropdown-divider mb-0"></div>
                                  </li>
                                  <li>
                                      <form action="{{ route('logout') }}" method="POST">
                                          @csrf
                                          <button class="dropdown-item">
                                              <i class='bx bx-log-out-circle'></i><span>Logout</span>
                                          </button>
                                      </form>
                                  </li>
                              </ul>
                          </div>
                      </li>
                      @else
                      <li class="nav-item">
                          <!-- <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                          <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a> -->
                          <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login / Register</a>
                      </li>
                      @endauth
                  </ul>
              </div> <!-- .navbar-collapse -->
          </div> <!-- .container -->
      </nav>
  </header>