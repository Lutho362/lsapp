{{-- <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/lsapp/public/pages">{{ config('app.name') }}</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="/lsapp/public/pages">Home</a></li>
          <li><a href="/lsapp/public/pages/about">About</a></li>
          <li><a href="/lsapp/public/pages/services">Services</a></li>
          <li><a href="/lsapp/public/posts">Blog</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/lsapp/public/posts/create">Create</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav> --}}

  <nav class="navbar navbar-inverse ">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href='/lsapp/public/'><i>
                {{ config('app.name', 'Laravel') }}
              </i></a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
              <li><a href="/lsapp/public/home">Dashboard</a></li>
              <li><a href="/lsapp/public/pages/about">About</a></li>
              <li><a href="/lsapp/public/pages/services">Services</a></li>
              <li><a href="/lsapp/public/posts">Blog</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                  <li><a href="/lsapp/public/posts/create">Create</a></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu" role="menu">
                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
                @endif
            </ul>
        </div>
    </div>
</nav>