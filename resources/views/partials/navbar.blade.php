<nav class="navbar navbar-expand-lg bg-danger" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="/">SUBAI Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home")? 'active' : ''}}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "About")? 'active' : ''}}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "All Posts")? 'active' : ''}}" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Categories")? 'active' : ''}}" href="/categories">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Authors")? 'active' : ''}}" href="/authors">Authors</a>
        </li>
      </ul>
      <ul class="navbar-nav mr-3 ms-auto ">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome, {{ auth()->user()->name }}
            <img class="img-profile rounded-circle" src="https://source.unsplash.com/500x500?person={{ auth()->user()->name }}" style="width:30px; height:30px">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar"></i> My Dashboard</a></li>
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
        @endauth
        
      </ul>
    </div>
  </div>
</nav>