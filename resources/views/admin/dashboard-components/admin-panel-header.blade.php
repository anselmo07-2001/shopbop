<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom px-3 mb-4">
        <div class="container-fluid">
          <span class="navbar-brand fw-bold">Dashboard</span>

          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-circle fa-lg me-2"></i>
                <span>Admin</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('admin.editProfile') }}"><i class="fa fa-user-edit me-2"></i> Edit Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route("logout.admin") }}">
                      @csrf
                      <button class="dropdown-item text-danger">
                        <i class="fa fa-sign-out-alt me-2"></i> Logout
                      </button>
                    </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
</nav>