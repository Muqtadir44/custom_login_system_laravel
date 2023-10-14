{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li>
        <li class="nav-item">
          <span class="nav-link d-flex ">
            {{auth()->user()->name}}
        </span>
        </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
        @endauth
      </ul>
      <div class="d-flex">
      </div>
    </div>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
    </ul>
    @auth
    <div class="dropdown me-5">
      <a href="#" class="d-flex align-items-center text_color text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('storage/pictures/'.auth()->user()->profile_picture) }}" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-light text-small shadow">
        <li><a class="dropdown-item" href="{{route('dashboard')}}"><i class="fa-solid fa-briefcase"></i> Dashboard</a></li>
        <li><a class="dropdown-item dash-btn" href="{{route('settings')}}"><i class="fa-solid fa-gear"></i> Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="{{route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</a></li>
      </ul>
    </div>			
      @else
      <form class="d-flex">
        <a href="{{route('login')}}" class="nav-link">Sign In</a>
        <a href="{{route('register')}}" class="nav-link mx-2">Sign Up</a>
      </form>
    @endauth
    </div>
  </div>
</nav>