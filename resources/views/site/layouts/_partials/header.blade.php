<div class="container-fluid">
  <nav class="navbar navbar-expand-lg border-bottom border-primary">
      <a class="navbar-brand ms-5" href="{{route('site.index')}}">
        <h3 class="text-primary">Task Manager</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('site.index') ? 'active' : '' }}" aria-current="page" href="{{route('site.index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('site.about') ? 'active' : '' }}" href="{{route('site.about')}}">About</a>
          </li>
        </ul>
          <form class="d-flex">
              <a href="{{route('site.login')}}" class="btn btn-outline-primary me-2 pt-2" >Sign in</a>
              <a href="{{route('site.register')}}" class="btn btn-sm btn-outline-primary pt-2">Sign up</a>
          </form>
      </div>
  </nav>
</div>