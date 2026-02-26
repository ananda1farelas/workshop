@php
    /** @var \App\Models\User|null $user */
    $user = Auth::user();
@endphp
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">

        <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}">
        <img src="{{ asset('template/assets/images/logo.svg') }}" alt="logo" />
        </a>

        <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}">
        <img src="{{ asset('template/assets/images/logo-mini.svg') }}" alt="logo" />
        </a>

    </div>

    <div class="navbar-menu-wrapper d-flex align-items-stretch">

        <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
        </button>

        <div class="search-field d-none d-md-block">
        <form class="d-flex align-items-center h-100">
            <div class="input-group">
            <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
            </div>
            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
        </form>
        </div>

        <ul class="navbar-nav navbar-nav-right">

        <!-- PROFILE / LOGIN -->
        @auth
        <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <div class="nav-profile-img">
                    <img src="{{ asset('template/assets/images/faces/face1.jpg') }}">
                </div>
                <div class="nav-profile-text">
                    <p class="mb-1 text-black">{{ $user?->name }}</p>
                </div>
            </a>

            <div class="dropdown-menu navbar-dropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout me-2 text-primary"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="mdi mdi-login me-1"></i> Login
            </a>
        </li>
        @endauth



        <!-- MESSAGE -->
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" data-bs-toggle="dropdown">
            <i class="mdi mdi-email-outline"></i>
            <span class="count-symbol bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list">
            <h6 class="p-3 mb-0">Messages</h6>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                <img src="{{ asset('template/assets/images/faces/face4.jpg') }}" class="profile-pic">
                </div>
            </a>

            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                <img src="{{ asset('template/assets/images/faces/face2.jpg') }}" class="profile-pic">
                </div>
            </a>

            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                <img src="{{ asset('template/assets/images/faces/face3.jpg') }}" class="profile-pic">
                </div>
            </a>

            </div>
        </li>

        <!-- NOTIFICATION -->
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" data-bs-toggle="dropdown">
            <i class="mdi mdi-bell-outline"></i>
            <span class="count-symbol bg-danger"></span>
            </a>
        </li>

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>

    </div>
    </nav>
