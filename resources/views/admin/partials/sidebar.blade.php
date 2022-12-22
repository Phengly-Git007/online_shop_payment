  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
          <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
      </a>

      <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item menu-open">
                      <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>

                  </li>
                  <li class="nav-item">
                      <a href="{{ route('categories.index') }}" class="nav-link @yield('category')">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Category
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Widgets
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item menu-open">
                      <a href="{{ route('logout') }}" class="nav-link "
                          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>Logout
                              <span class="right badge badge-warning">logout</span>
                          </p>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>

              </ul>
          </nav>
      </div>
  </aside>
