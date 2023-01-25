<div class="container-fluid">
  <nav class="navbar navbar-expand-lg border-bottom border-primary">
      <a class="navbar-brand ms-lg-5" href="{{route('app.home')}}">
        <h3 class="text-primary">Task Manager</h3>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
            @if (!Request::routeIs('app.home'))
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('task.index') ? 'active' : '' }}" href="{{route('task.index')}}">Tasks</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('task.create') ? 'active' : '' }}" href="{{route('task.create')}}">Create Task</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('list.index') ? 'active' : '' }}" href="{{route('list.index')}}">Lists</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('list.create') ? 'active' : '' }}" href="{{route('list.create')}}">Create List</a>
              </li>
            @endif
              <li class="nav-item dropdown ms-5">
                  <a href="#" class="nav-link btn btn-outline-primary me-2 p-2 dropdown-toggle" role="button" data-bs-toggle="dropdown">{{$name}}</a>
                  <ul class="dropdown-menu dropdown-menu-end">
                      <li><a href="{{route('user.index')}}" class="dropdown-item">Profile</a></li>
                      <li><div class="dropdown-divider"></div></li>
                      <li><a href="{{route('app.exit')}}" class="dropdown-item">Log out</a></li>
                  </ul>
              </li>
          </ul>
          
      </div>
  </nav>
</div>