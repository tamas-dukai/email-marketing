  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('public/assets/backend/images/logo-admin.png') }}" alt="Logo" style="display: block; margin: 0 auto;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __("admin.dashboard2") }}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ Request::is('admin/settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>{{ __("admin.settings") }}</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.blacklist') }}" class="nav-link {{ Request::is('admin/blacklist') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-slash"></i>
              <p>{{ __("admin.blacklist") }}</p>
            </a>
          </li>


          <li class="nav-item {{ Request::is('admin/providers*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('admin/providers*') ? 'active show-sub' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                {{ __("admin.email_providers") }}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('admin.sendy') }}" class="nav-link {{ Request::is('admin/providers/sendy') ? 'active' : '' }}">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>{{ __("admin.sendy") }}</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ route('admin.mailchimp') }}" class="nav-link {{ Request::is('admin/providers/mailchimp') ? 'active' : '' }}">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>{{ __("admin.mailchimp") }}</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.convertkit') }}" class="nav-link {{ Request::is('admin/providers/convertkit') ? 'active' : '' }}">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>{{ __("admin.convertkit") }}</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.sendinblue') }}" class="nav-link {{ Request::is('admin/providers/sendinblue') ? 'active' : '' }}">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>{{ __("admin.sendinblue") }}</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.getresponse') }}" class="nav-link {{ Request::is('admin/providers/getresponse') ? 'active' : '' }}">
                  <i class="fas fa-angle-double-right nav-icon"></i>
                  <p>{{ __("admin.getresponse") }}</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
