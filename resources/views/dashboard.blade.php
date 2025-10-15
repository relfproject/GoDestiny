<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            background-color: #f4f6fa;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .dashboard-wrapper {
            width: 100%;
            max-width: 1200px;
            padding: 40px 20px;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: white;
            text-align: center;
            border-radius: 25px;
            padding: 60px 40px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .dashboard-header h1 {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .dashboard-header p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .dashboard-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn-main {
            background: #fff;
            color: #224abe;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .btn-main:hover {
            background: #e9ecff;
            transform: translateY(-3px);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 60px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .blue { color: #4e73df; }
        .green { color: #1cc88a; }
        .yellow { color: #f6c23e; }
    </style>
</head>

<body>
    <div class="dashboard-wrapper animate__animated animate__fadeIn">
        
        <!-- Header -->
        <div class="dashboard-header">
            <h1>Welcome, Admin 🎉</h1>
            <p>Kamu berhasil login! Dari sini kamu bisa mengelola destinasi wisata atau kembali ke halaman utama.</p>
            <div class="dashboard-actions">
                <a href="{{ route('home') }}" class="btn-main">
                    <i class="fas fa-home me-2"></i> Home
                </a>
                <a href="{{ route('admin.destinations.index') }}" class="btn-main">
                    <i class="fas fa-map-marker-alt me-2"></i> Kelola Destinasi
                </a>
            </div>
        </div>

        <!-- Statistik -->
        <div class="stats-grid animate__animated animate__fadeInUp">
            <div class="stat-card">
                <i class="fas fa-map-marked-alt icon blue"></i>
                <h5>Total Destinasi</h5>
                <h2>{{ \App\Models\Destination::count() }}</h2>
            </div>

            <div class="stat-card">
                <i class="fas fa-users icon green"></i>
                <h5>Pengguna</h5>
                <h2>{{ \App\Models\User::count() }}</h2>
            </div>

            <div class="stat-card">
                <i class="fas fa-chart-line icon yellow"></i>
                <h5>Statistik</h5>
                <h2>+25%</h2>
            </div>
        </div>

    </div>
</body>
</html>
