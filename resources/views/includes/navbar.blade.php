<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Branding Image -->
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Ahmed Adel') }}
      </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Post">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Post/create">Create Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
      
      </ul>
    </div>
    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav">
    <!-- Authentication Links -->
    @guest
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
    @else
      <li class="nav-item" >
        <a href="#"  class="navbar-brand" data-toggle="dropdown" role="button" aria-expanded="true" aria-haspopup="true">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu ">
          <li><a href="/dashboard"  >Dashboard</a></li>  
          <li>
            <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();" >
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
         </ul>
      </li>
    @endguest
    </ul>
  
</nav>
