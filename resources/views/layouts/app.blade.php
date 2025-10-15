<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoDestiny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }

        /* Navbar */
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand span {
            font-size: 1.4rem;
            color: #4DB8FF;
            /* biru lembut seperti di gambar */
            letter-spacing: 1px;
        }

        .nav-links {
            list-style: none;
            gap: 20px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links li a:hover {
            color: #4DB8FF;
        }

        .social-icons a {
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #4DB8FF;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                /* bisa diganti dengan menu toggle kalau mau responsive */
            }
        }

        .modern-footer {
            background-color: #0d0d0d;
            border-radius: 20px 20px 0 0;
            color: #f1f1f1;
            width: 100%;
            margin: 0;
        }

        .modern-footer h6,
        .modern-footer h4 {
            color: #fff;
        }

        .modern-footer a {
            text-decoration: none;
            color: #dcdcdc;
            transition: color 0.3s ease;
        }

        .modern-footer a:hover {
            color: #fff;
        }

        .social-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f1f1f1;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background-color: #fff;
            color: #111;
            transform: translateY(-3px);
        }

        hr {
            opacity: 0.1;
        }

        @media (max-width: 768px) {
            .modern-footer {
                text-align: center;
                border-radius: 0;
            }

            .social-icon {
                margin: 0 auto;
            }
        }
    </style>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar-custom">
        <div class="container d-flex justify-content-between align-items-center py-3">

            <!-- Logo -->
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <span class="text-primary">GoDestiny</span>
            </a>

            <!-- Navigation Links -->
            <ul class="nav-links d-flex align-items-center m-0">
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

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger ms-2">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                @endauth
            </ul>

            <!-- Social Icons -->
            <div class="social-icons d-flex align-items-center gap-3">
                <a href="#" class="text-secondary"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/whosrelfl/" class="text-secondary"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </nav>
    <!-- Content -->
    <main style="margin-top: 85px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="modern-footer mt-5">
        <div class="container-fluid py-5 px-5">
            <div class="row justify-content-between align-items-start">

                <!-- Brand & Description -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="fw-bold text-white">GoDestiny™</h4>
                    <p class="text-light opacity-75 small mt-3">
                        Explore breathtaking destinations and unforgettable journeys.
                        Let’s make your travel dreams come true.
                    </p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/whosrelfl/" class="social-icon"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <!-- Extra Links -->
                <div class="col-md-3 mb-4 mb-md-0">
                    <h6 class="fw-semibold text-white mb-3">Extra Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('destination.index') }}">Destinations</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-md-4">
                    <h6 class="fw-semibold text-white mb-3">Contact</h6>
                    <p class="text-light small mb-2">123 Example Road, Surabaya, Indonesia</p>
                    <p class="text-light small mb-2">email@godestiny.com</p>
                    <p class="text-light small">(021) 555-5555</p>
                </div>
            </div>

            <hr class="border-secondary mt-5">
            <div class="text-center">
                <p class="text-light opacity-75 small mb-0">&copy; 2025 GoDestiny. All rights reserved.</p>
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