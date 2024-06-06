<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
    /* CSS for Sidebar */

    .sidebar {
        height: 100%;
        width: 250px;
        /* Lebar sidebar */
        position: fixed;
        top: 0;
        left: 0;
        background-color: #5f3bc8;
        color: #fff;
        ;
        /* Warna background sidebar */
        padding-top: 60px;
        /* Sesuaikan dengan tinggi navbar jika menggunakan fixed navbar */
        overflow-x: hidden;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar li {
        margin-bottom: 5px;
    }

    .sidebar a {
        display: block;
        padding: 10px 15px;
        text-decoration: none;
        color: #fff;
        /* Warna teks link */
    }

    .sidebar a:hover {
        background-color: #e9ecef;
        /* Warna background link saat dihover */
        color: #000;
        /* Warna teks link saat dihover */
    }

    /* CSS for Main Content */
    #app {
        margin-left: 250px;
        /* Sesuaikan dengan lebar sidebar */
        transition: margin-left 0.5s;
        /* Animasi saat menyembunyikan/menampilkan sidebar */
    }

    .hamburger {
        position: fixed;
        /* Membuat hamburger menu tetap terlihat */
        top: 20px;
        left: 10px;
        cursor: pointer;
        z-index: 999;
        /* Pastikan hamburger tampil di atas konten */
    }

    .hamburger .line {
        width: 25px;
        height: 3px;
        background-color: #fff;
        margin: 5px 0;
        transition: all 0.3s ease;
    }

    .hamburger.active .line:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active .line:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .hamburger.active .line:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 80px;
        }

        .sidebar.minimized {
            width: 80px;
        }

        #app {
            margin-left: 80px;
        }

        .navbar {
            position: fixed;
            width: calc(100% - 80px);
            /* Adjust navbar width */
            top: 0;
            left: 80px;
            /* Align navbar below sidebar */
            z-index: 1000;
            /* Ensure navbar stays on top */
        }

        .navbar.minimized {
            margin-left: 0;
            /* Reset margin for minimized sidebar */
        }
    }

    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
    }

    label {
        font-weight: bold;
    }

    input,
    textarea {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="hamburger" id="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/profile') }}">
                                    {{ __('Profil') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="sidebar">
            <img src="https://www.uhb.ac.id/site/assets/files/2071/logo_uhb_r.420x0-is-pid1040.png"
                style="width: 100px; margin-left: 70px; margin-top: -40px; margin-bottom: 20px" alt="">
            @Auth
            <ul class="nav flex-column">
                <li class="nav-item" style="margin-left: 20px">
                    <a class="navbar-brand" href="{{ url('/home') }}"> Beranda
                    </a>
                </li>
                <li class="nav-item" style="margin-left: 20px">
                    <a class="navbar-brand" href="{{ url('/pinjam_ruang') }}"> Peminjaman Ruang
                    </a>
                </li>
                <li class="nav-item" style="margin-left: 20px">
                    <a class="navbar-brand" href="{{ url('/pengolahan_ruang') }}"> Pengelolaan Ruangan
                    </a>
                </li>
                <li class="nav-item" style="margin-left: 20px">
                    <a class="navbar-brand" href="{{ url('/user_pengolahan') }}"> User
                    </a>
                </li>

            </ul>
            @endauth
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const app = document.getElementById('app');
        const navbar = document.querySelector('.navbar');

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            toggleSidebar();
        });

        // Function to toggle sidebar visibility
        function toggleSidebar() {
            sidebar.classList.toggle('minimized');
            app.classList.toggle('minimized');
            navbar.classList.toggle('minimized');

            // If sidebar is minimized, hide it when clicking outside the sidebar
            if (sidebar.classList.contains('minimized')) {
                document.addEventListener('click', closeSidebar);
            } else {
                document.removeEventListener('click', closeSidebar);
            }
        }

        // Function to close sidebar when clicking outside the sidebar
        function closeSidebar(event) {
            if (!sidebar.contains(event.target) && !hamburger.contains(event.target)) {
                toggleSidebar();
            }
        }

        // Close sidebar when window is resized to larger size
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                sidebar.classList.add('minimized');
                app.classList.add('minimized');
                navbar.classList.add('minimized');
                hamburger.classList.remove('active');
                document.removeEventListener('click', closeSidebar);
            }
        });
    });
    </script>

</body>

</html>