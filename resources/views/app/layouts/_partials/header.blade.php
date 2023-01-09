<div class="container-fluid">
  <nav class="navbar navbar-expand-lg border-bottom border-primary">
      <a class="navbar-brand ms-5" href="{{route('app.home')}}">
        <h3 class="text-primary">Task Manager</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
            @if (!Request::routeIs('app.home'))
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('task.index') ? 'active' : '' }}" href="{{route('task.index')}}">List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('task.create') ? 'active' : '' }}" href="{{route('task.create')}}">Create</a>
              </li>
            @endif
          </ul>

          <form class="d-flex">
            <a href="{{route('app.exit')}}" class="btn btn-outline-primary me-2 pt-2" >Log out</a>
          </form>
      </div>
  </nav>
</div>