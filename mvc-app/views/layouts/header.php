<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px 0;
            position: fixed;
            width: 250px;
            overflow-y: auto;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 20px;
            border-left: 4px solid transparent;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            border-left-color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        .navbar-brand {
            color: white;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <nav class="sidebar">
            <div class="text-white mb-4 p-3">
                <h5><i class="bi bi-mortarboard"></i> Project Sekolah</h5>
            </div>
            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'home') ? 'active' : '' ?>" href="index.php?page=home">
                        <i class="bi bi-house"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'mahasiswa') ? 'active' : '' ?>" href="index.php?page=mahasiswa">
                        <i class="bi bi-people"></i> Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'products') ? 'active' : '' ?>" href="index.php?page=products">
                        <i class="bi bi-box-seam"></i> Products
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-danger" href="index.php?page=login&action=logout">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        
        <main class="main-content w-100">