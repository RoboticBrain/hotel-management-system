<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#2b3035">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title>@yield('title', 'Dashboard')</title>

    <!-- Vite CSS/JS -->
    @vite(['resources/css/main.css', 'resources/js/color-modes.js'])

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Chartist CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

    <!-- Custom inline styles -->
    <style>
        body {
            opacity: 0;
            height: 100%;
            background-color: #2b3035;
            transition: opacity 0.15s ease-in;
        }
        body.loaded {
            opacity: 1;
        }

        aside {
            position: fixed;
            overflow: auto;
            height: calc(100vh - 68px);
        }

        main {
            margin-left: auto;
            overflow: auto;
        }

        .green-circle {
            width: 15px;
            height: 15px;
            background-color: green;
            border-radius: 50%;
            margin-left: 5px;
        }

        @media screen and (max-width: 575px) {
            #sidebarshow { display: inline; }
            #sidebartoggle { display: none; }
        }
    </style>
</head>
<body>
    <!-- SVG icons -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162z"/>
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13z"/>
        </symbol>
    </svg>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg border-bottom bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <button class="btn btn-outline-secondary me-2" type="button" id="sidebartoggle" onclick="toggleSidebar()">
                    <i class="bi bi-arrows-expand-vertical"></i>
                </button>
                <a class="navbar-brand" href="#">Umbrella Hotel Management System</a>
            </div>
            <div class="d-flex align-items-center">
                <p class="mb-0 fw-bold">System Online</p>
                <div class="green-circle"></div>
                <!-- Theme dropdown -->
             <div class="dropdown-center" style="padding-left: 10px;">
          <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
              <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#sun-fill"></use>
                </svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
                </svg>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#moon-stars-fill"></use>
                </svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
                </svg>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                aria-pressed="true">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#circle-half"></use>
                </svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
                </svg>
              </button>
            </li>
          </ul>
        </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="collapse show collapse-horizontal col-sm-2 p-3 border-end bg-body-tertiary" id="sidebar">
        <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span>Sidebar</span>
        </a>
        <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li>
        <x-nav-link class="bi bi-house" :href="route('admin.dashboard.home')" :active="request()->is('admin/dashboard/home')">
            Home
        </x-nav-link>
    </li>
    <li>
        <x-nav-link class="bi bi-speedometer2" :href="route('admin.dashboard')" :active="request()->is('admin/dashboard')">
            Dashboard
        </x-nav-link>
    </li>
    <li>
        <x-nav-link class="bi bi-grid" :href="route('admin.show.rooms')" :active="request()->is('admin/dashboard/rooms')">
            Rooms
        </x-nav-link>
    </li>
    <li>
        <x-nav-link class="bi bi-person-circle" :href="route('admin.show.customers')" :active="request()->is('admin/dashboard/customers')">
            Customers
        </x-nav-link>
    </li>
    <li>
        <x-nav-link class="bi bi-table" :href="route('admin.dashboard.booking')" :active="request()->is('admin/dashboard/bookings')">
            Bookings
        </x-nav-link>
    </li>
</ul>

        <hr>
        <!-- User Dropdown -->
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ auth()->user()->customer->first_name }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="{{ route('profile.show', auth()->user()->id) }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Sign out</button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main content -->
    <main class="col-sm-10 bg-body-tertiary" id="main">
        <div class="container-fluid">
            <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('selection', 'Home')</h1>
            </div>
            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script>
        // Sidebar toggle
        function toggleSidebar() {
            document.getElementById('main').classList.toggle('col-sm-12');
            document.getElementById('main').classList.toggle('col-sm-10');
        }

        // Page load animation
        window.addEventListener('DOMContentLoaded', () => {
            document.body.classList.add('loaded');
        });
    </script>
</body>
</html>
