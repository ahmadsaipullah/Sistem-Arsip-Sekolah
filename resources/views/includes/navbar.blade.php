 <style>
    .navbar-gradient-primary {
        background: linear-gradient(to right, #1e3c72, #2a5298); /* Gradient biru */
        color: #ffffff;
    }

    .navbar-gradient-primary .nav-link,
    .navbar-gradient-primary .nav-item .dropdown-menu {
        color: #ffffff;
    }

    .navbar-gradient-primary .nav-link:hover,
    .navbar-gradient-primary .nav-link:focus {
        color: #d1d1d1;
    }

    .navbar-gradient-primary .dropdown-menu {
        background-color: #2a5298;
        border: none;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .navbar-gradient-primary .dropdown-item {
        color: #ffffff;
    }

    .navbar-gradient-primary .dropdown-item:hover {
        background-color: rgba(255,255,255,0.1);
        color: #ffffff;
    }

    .navbar-gradient-primary .dropdown-header {
        color: #ffffff;
        font-weight: bold;
        border-bottom: 1px solid rgba(255,255,255,0.2);
    }
</style>
 <!-- Navbar -->
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-gradient-primary fixed-top">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Akun Profile</span>
          <div class="dropdown-divider">
          </div>

          <a href="{{route('profile.index', encrypt(auth()->user()->id))}}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>

          <div class="dropdown-divider"></div>
             <div class="d-flex  justify-content-end">
                @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger m-1" type="submit">Logout <i
                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></button>
                </form>
                @endauth
                </div>
        </div>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->
