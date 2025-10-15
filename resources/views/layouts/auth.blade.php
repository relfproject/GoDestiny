<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth Page' }} | GoDestiny</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(120deg, #0e0f13 0%, #1b1e27 100%);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .auth-wrapper {
            display: flex;
            width: 900px;
            height: 550px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        .auth-wrapper.show {
            opacity: 1;
            transform: translateY(0);
        }
        .auth-left {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease;
        }
        .auth-left h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .auth-left p {
            color: #aaa;
            margin-bottom: 1.5rem;
        }
        .auth-left input {
            width: 100%;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            outline: none;
        }
        .auth-left input:focus {
            border: 1px solid #2563eb;
        }
        .auth-left button {
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            border: none;
            border-radius: 12px;
            padding: 0.9rem;
            color: #fff;
            font-weight: 600;
            margin-top: 0.5rem;
            cursor: pointer;
            transition: 0.3s;
        }
        .auth-left button:hover {
            transform: scale(1.03);
            opacity: 0.95;
        }
        .auth-left a {
            color: #60a5fa;
            text-decoration: none;
            transition: 0.3s;
        }
        .auth-left a:hover {
            text-decoration: underline;
            color: #93c5fd;
        }
        .auth-right {
            flex: 1;
            background: url('storage/images/new.jpg') center center/cover no-repeat;
            position: relative;
        }
        .auth-right::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .auth-wrapper {
                flex-direction: column;
                width: 95%;
                height: auto;
            }
            .auth-right {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper" id="authBox">
        @yield('content')
        <div class="auth-right"></div>
    </div>

    <script>
        // Smooth muncul saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const box = document.getElementById('authBox');
            setTimeout(() => box.classList.add('show'), 100);
        });

        // Animasi transisi halus saat klik Sign Up / Login link
        document.querySelectorAll('a[data-animate]').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const box = document.getElementById('authBox');
                box.classList.remove('show');
                setTimeout(() => {
                    window.location.href = link.getAttribute('href');
                }, 500); // waktu fade out
            });
        });
    </script>
</body>
</html>
