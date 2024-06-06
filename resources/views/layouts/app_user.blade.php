<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Ruang</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Tambahkan gaya kustom di sini */
    .navbar-brand img {
        height: 30px;
        margin-right: 10px;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
    }

    .logout-icon {
        margin-right: 5px;
    }

    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .close-modal {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    .room-gallery-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .room-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .room-photo {
        width: 100%;
        height: auto;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .room-info {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 10px;
        transition: opacity 0.3s ease;
        opacity: 0;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .room-item:hover .room-info {
        opacity: 1;
    }

    .room-item:hover .room-photo {
        transform: scale(1.05);
    }

    .form-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        margin-bottom: 30px;
        text-align: center;
        color: #333;
    }

    .form-label {
        font-weight: bold;
        color: #555;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-success {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    #notificationBox {
        position: fixed;
        bottom: 40px;
        right: 10px;
        background-color: #ffffff;
        border: 1px solid #cccccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        padding: 10px;
        border-radius: 5px;
        display: none;
        z-index: 999;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-10px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }

        .welcome-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .welcome-text {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .welcome-description {
            font-size: 18px;
            color: #666;
        }
    }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://www.uhb.ac.id/site/assets/files/2071/logo_uhb_r.420x0-is-pid1040.png" alt="Logo">
            </a>
            <a class="navbar-brand" href="{{ url('/userpinjam_ruang') }}">
                Peminjaman
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <!-- Jika pengguna belum masuk -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <!-- Jika pengguna telah masuk -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span class="logout-icon">&#x21a9;</span>{{ __('Logout') }}
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

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 IwanSafi'i</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function toggleNotificationBox() {
        var notificationBox = document.getElementById("notificationBox");
        if (notificationBox.style.display === "none") {
            notificationBox.style.display = "block";
        } else {
            notificationBox.style.display = "none";
        }
    }
    </script>

</body>

</html>