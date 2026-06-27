<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dapur MBG')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        <style>
    .navbar {
        background-color: #96f511 !important; 
    }
    .btn-primary {  
        background-color: #2e7f32 !important;
        border-color: #0e96ae !important;
    }
    h2, h5 {
        color: #000000;
    }
        .fab:hover {
            transform: scale(9  .8);
            transition: 0,3s;
        }
        <style>
    .card-statistik {
        transition: transform 0.3s;
        color: white;
    }

    .card-statistik:hover {
        transform: translateY(-10px); 
    }

    .bg-gradient-penerima {
        background: linear-gradient(45deg, #2ecc71, #27ae60);
    }

    .bg-gradient-rating {
        background: linear-gradient(45deg, #f1c40f, #f39c12);
    }
</style>
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">Dapur MBG Profile</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                     <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/social-media">Media & Article</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="text-center py-4 text-muted">        +++
        <hr>
        &copy; 2026 Dapur MBG Cibeuteung Muara
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>