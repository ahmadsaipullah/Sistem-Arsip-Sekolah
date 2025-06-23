<style>
    .sidebar-gradient-primary {
        background: linear-gradient(to bottom, #1e3c72, #2a5298); /* Gradasi biru */
        color: #ffffff;
    }

    .sidebar-gradient-primary .nav-link {
        color: #ffffff;
    }

    .sidebar-gradient-primary .nav-link.active,
    .sidebar-gradient-primary .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #ffffff;
    }

    .sidebar-gradient-primary .brand-link {
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
    }

    .sidebar-gradient-primary .brand-text {
        color: #ffffff;
    }

    .sidebar-gradient-primary .user-panel .info a,
    .sidebar-gradient-primary .user-panel .info span {
        color: #ffffff;
    }

    .sidebar-gradient-primary .nav-header {
        color: #ffffff;
        font-weight: bold;
    }
</style>


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-gradient-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/img/logoft.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8; border: 2px solid white;">
        <span class="brand-text font-weight-light text-white">SMP NEGRI 2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth()->user()->image)
                    <img src="{{Storage::url(Auth()->user()->image) }}" alt="gambar"
                        width="120px" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                @else
                    <img src="{{ asset('assets/img/user_default.png') }}" class="img-circle elevation-2"
                        alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('profile.index', encrypt(auth()->user()->id)) }}"
                    class="d-block text-white">{{ Auth()->user()->name }}</a>
                <span class="text-white text-xs"><i class="fa fa-circle text-success"></i> Online</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link @yield('dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard</p>
                    </a>
                </li>
                @if (auth()->user()->level_id == 4)
                    <li class="nav-header">Menu</li>
                          <li class="nav-item">
                        <a href="{{ route('data-kepegawaian.index') }}" class="nav-link @yield('kepegawaian')">
                            <i class="nav-icon fas fa-id-card-alt"></i>
                            <p>Data Kepegawaian</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('surat-masuk-keluar.index') }}" class="nav-link @yield('surat')">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>Surat</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('soal.index') }}" class="nav-link @yield('soal')">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Soal</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('siswa.index') }}" class="nav-link @yield('siswa')">
                             <i class="nav-icon fas fa-users"></i>
                            <p>Siswa/i</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokumen-sekolah.index') }}" class="nav-link @yield('dokumen')">
                          <i class="nav-icon fas fa-archive"></i>
                            <p>Dokumen Sekolah/i</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->level_id == 3)
                    <li class="nav-header">Menu</li>
                          <li class="nav-item">
                        <a href="{{ route('data-kepegawaian.index') }}" class="nav-link @yield('kepegawaian')">
                            <i class="nav-icon fas fa-id-card-alt"></i>
                            <p>Data Kepegawaian</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('surat-masuk-keluar.index') }}" class="nav-link @yield('surat')">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>Surat</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('soal.index') }}" class="nav-link @yield('soal')">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Soal</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('siswa.index') }}" class="nav-link @yield('siswa')">
                             <i class="nav-icon fas fa-users"></i>
                            <p>Siswa/i</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokumen-sekolah.index') }}" class="nav-link @yield('dokumen')">
                          <i class="nav-icon fas fa-archive"></i>
                            <p>Dokumen Sekolah/i</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->level_id == 2)
                    <li class="nav-header">Menu</li>
                          <li class="nav-item">
                        <a href="{{ route('data-kepegawaian.index') }}" class="nav-link @yield('kepegawaian')">
                            <i class="nav-icon fas fa-id-card-alt"></i>
                            <p>Data Kepegawaian</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('surat-masuk-keluar.index') }}" class="nav-link @yield('surat')">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>Surat</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('soal.index') }}" class="nav-link @yield('soal')">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Soal</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('siswa.index') }}" class="nav-link @yield('siswa')">
                             <i class="nav-icon fas fa-users"></i>
                            <p>Siswa/i</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dokumen-sekolah.index') }}" class="nav-link @yield('dokumen')">
                          <i class="nav-icon fas fa-archive"></i>
                            <p>Dokumen Sekolah/i</p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->level_id == 1)
                    <li class="nav-header">Admin Super</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link @yield('admin')">
                            <i class="nav-icon ion ion-person-add"></i>
                            <p>Admin</p>
                        </a>
                    </li>


                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
