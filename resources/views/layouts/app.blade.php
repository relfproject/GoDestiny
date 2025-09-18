<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoDestiny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Navbar */
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            transition: background-color 0.4s ease, box-shadow 0.4s ease;
        }

        .navbar.scrolled {
            background-color: hsla(0, 0%, 100%, 0.69) !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link {
            color: #000000ff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar.scrolled .nav-link {
            color: #000 !important;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            color: #0066ffff;
        }

        .navbar.scrolled .navbar-brand {
            color: #0066ffff !important;
        }

        .content-wrapper {
            flex: 1;
            padding-top: 80px;
            /* biar ga ketutup navbar */
        }

        footer {
            background: #0d1b2a;
            color: #ddd;
            padding: 30px 0 15px;
            margin-top: auto;
            /* ini kunci utama */
        }

        footer a {
            text-decoration: none;
            color: #ddd;
            transition: 0.3s;
        }

        footer a:hover {
            color: #fff;
        }

        footer .footer-title {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #fff;
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">GoDestiny</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('destination.index') }}">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog*') ? 'active fw-semibold text-primary' : '' }}"
                            href="{{ route('blog.index') }}">
                            Blog
                        </a>
                    </li>

                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger ms-2">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main style="margin-top: 85px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Brand -->
                <div class="col-md-4 mb-4">
                    <h4 class="fw-bold text-primary">GoDestiny</h4>
                    <p>Temukan destinasi terbaik untuk perjalanan tak terlupakan Anda.
                        Kami siap menemani setiap langkah liburan Anda.</p>
                </div>

                <!-- Contact -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">Contact</h5>
                    <p><i class="bi bi-telephone"></i> +62 882 2464 4796</p>
                    <p><i class="bi bi-envelope"></i> support@godestiny.com</p>
                </div>

                <!-- Social Media -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-title">Follow Us</h5>
                    <a href="#" class="me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="me-3"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#"><i class="bi bi-youtube fs-4"></i></a>
                </div>
            </div>
            <hr class="border-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 GoDestiny. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Change navbar bg on scroll
        window.addEventListener("scroll", function () {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>