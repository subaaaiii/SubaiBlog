<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard') ? 'active' : 'text-dark' }}" href="/dashboard">
                  <i class="bi bi-speedometer2"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : 'text-dark' }}" href="/dashboard/posts">
                  <i class="bi bi-file-text"></i> My Posts
              </a>
            </li>
          </ul>
          @can('admin')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Administrator</span>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : 'text-dark' }}" href="/dashboard/category">
                <i class="bi bi-tags"></i> Category
              </a>
            </li>
          </ul>
          @endcan
          <hr>
          @auth
          <ul class="nav-item">
            <li class="nav-link dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome {{ auth()->user()->name }}
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/500x500?person={{ auth()->user()->name }}" style="width:30px; height:30px">
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/"><i class="bi bi-house"></i> Back Home</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
            @else
            <li class="nav-item">
              <a href="/login" class="text-decoration-none text-white">
                <i class="bi bi-box-arrow-in-right"></i> Login</a>
              </li>
            </ul>
            @endauth
          
        </div>
      </div>
    </div>
