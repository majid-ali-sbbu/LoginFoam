<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Additional Page Styles -->
    @yield('styles')

     <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f0f2f5;
            color: #333;
        }

        .wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding: 1rem 0;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .sidebar h4 {
            color: #ffc107;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #fff;
            padding: 0.8rem;
            margin: 0.2rem 0;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar a.active {
            background-color: #157fe8;
            color: yellow;
            font-weight: bold;
            scroll-margin-top: 50%;
            /* Center the active link in the sidebar */
            text-align: center;

        }

        .sidebar a.active:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(21, 127, 232, 0.8);
            z-index: -1;
            border-radius: 4px;
            align-items: center;
        }

        .sidebar a:hover {
            background-color: #157fe8;
            color: yellow;
            transition: all 0.3s ease;
            align-items: center;
        }

        .content {
            margin-left: 220px;
            padding: 2rem;
            flex-grow: 1;
        }

        footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 1rem 0;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Dashboard Header -->
        <h4><i class="fas fa-home"></i> Dashboard</h4>

        <!-- Sidebar Links -->
        <a href="{{ route('users') }}" class="{{ request()->routeIs('users') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Users
        </a>
        <a href="{{ route('calendar') }}" class="{{ request()->routeIs('calendar') ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i> Calendar
        </a>
        <a href="{{ route('map.show') }}" class="{{ request()->routeIs('map.show') ? 'active' : '' }}">
            <i class="fas fa-map-marked-alt"></i> Map
        </a>
        <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Alert Section -->
        <div class="alert-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <b><span style="color:blue">{{ Auth::user()->name ?? 'Guest' }}</span></b>
            </div>
        </nav>

        <!-- Dynamic Content -->
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 SideWeb. All rights reserved.</p>
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
    </footer>

    <!-- Additional Scripts -->
    @yield('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const activeLink = document.querySelector(".sidebar a.active");
            if (activeLink) {
                activeLink.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });
            }
        });
    </script>
</body>

</html>
