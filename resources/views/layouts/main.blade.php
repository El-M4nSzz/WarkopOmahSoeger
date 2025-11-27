<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Warkop Omah Soeger</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- 1. VARIABEL WARNA --- */
        :root {
            --bg-black: #050505;
            --bg-card: #121212;
            --color-blue: #00acee;
            --color-gold: #a08155;
            --text-grey: #b3b3b3;
        }
        
        body {
            background-color: var(--bg-black);
            color: white;
            font-family: 'Poppins', sans-serif;
            padding-top: 80px; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- 2. STYLE HEADER (NAVBAR) --- */
        .navbar-custom {
            background-color: var(--bg-black);
            padding: 15px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .logo-container {
            display: flex; align-items: center; gap: 10px; text-decoration: none;
        }
        .logo-text h1 { font-size: 1.1rem; font-weight: 600; color: white; margin: 0; line-height: 1.2; }
        .logo-text small { font-size: 0.75rem; color: var(--color-gold); display: block; }

        .nav-link {
            color: white !important; padding: 8px 20px !important;
            border-radius: 50px; font-weight: 400; font-size: 0.95rem; transition: 0.3s;
        }
        .nav-link:hover { color: var(--color-blue) !important; }
        .nav-link.active {
            background-color: var(--color-blue); color: white !important;
            font-weight: 500; box-shadow: 0 4px 15px rgba(0, 172, 238, 0.3);
        }
        
        /* Tombol Auth */
        .btn-login-text { color: white; text-decoration: none; font-weight: 500; margin-right: 25px; transition: 0.3s; }
        .btn-login-text:hover { color: var(--color-blue); }
        .btn-register-pill {
            background-color: var(--color-blue); color: white; padding: 8px 30px;
            border-radius: 50px; font-weight: 600; text-decoration: none; transition: 0.3s;
            display: inline-block; /* Agar rapi di mobile */
            text-align: center;
        }
        .btn-register-pill:hover { background-color: #0088cc; transform: translateY(-2px); }

        /* --- 3. STYLE FOOTER --- */
        footer {
            background-color: var(--bg-black);
            border-top: 1px solid #1a1a1a;
            margin-top: 120px;  
            padding-top: 80px;  
            padding-bottom: 40px;
        }
        .footer-title {
            color: var(--color-blue); font-weight: 500; margin-bottom: 25px;
            display: inline-block; position: relative;
        }
        .footer-title::after {
            content: ''; display: block; width: 40px; height: 2px;
            background-color: var(--color-blue); margin-top: 8px;
        }
        .footer-link {
            color: var(--text-grey); text-decoration: none; display: block;
            margin-bottom: 12px; transition: 0.3s;
        }
        .footer-link:hover { color: var(--color-blue); padding-left: 5px; }
        .social-item {
            display: flex; align-items: center; gap: 15px; margin-bottom: 20px;
            text-decoration: none; transition: transform 0.2s;
        }
        .social-item:hover { transform: translateX(5px); }
        .social-text { color: white; font-size: 1rem; font-weight: 400; }
        .social-icon { font-size: 1.5rem; }
        .icon-wa { color: #25D366; } .icon-ig { color: #E4405F; }
        .icon-email { color: #007BFF; } .icon-fb { color: #1877F2; }

        /* --- 4. STYLE UMUM LAINNYA --- */
        .card-custom { background-color: var(--bg-card); border: 1px solid #222; border-radius: 15px; }
        .btn-gold { background: var(--color-gold); color: black; border: none; }
        .btn-filter { transition: 0.3s; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
      <div class="container">
        
        <a class="logo-container" href="{{ route('home') }}">
            <div class="logo-icon-wrapper">
                 <img src="{{asset('img/logo warkop.png')}}" alt="Logo" style="height: 50px; width: auto; object-fit: contain;">
            </div>
        </a>

        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          
          <ul class="navbar-nav mx-auto gap-1 text-center">
            <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('menu') ? 'active' : '' }}" href="{{ route('menu') }}">Menu</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('events') ? 'active' : '' }}" href="{{ route('events') }}">Events</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('profil') ? 'active' : '' }}" href="{{ route('about') }}">Profile</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('lokasi') ? 'active' : '' }}" href="{{ route('contact') }}">Location</a></li>
          </ul>

          <div class="d-flex align-items-center justify-content-center mt-3 mt-lg-0">
              @auth
                  <span class="text-white me-3 d-none d-lg-inline">Hi, {{ Auth::user()->name }}</span>
                  
                  @if(Auth::user()->role == 'admin')
                      <a href="{{ route('dashboard') }}" class="btn-register-pill">Admin Panel</a>
                  @else
                      <a href="{{ route('user.dashboard') }}" class="btn-register-pill">My Dashboard</a>
                  @endif
  
              @else
                  <a href="{{ route('login') }}" class="btn-login-text">Login</a>
                  <a href="{{ route('register') }}" class="btn-register-pill">Register</a>
              @endauth
          </div>

        </div>
      </div>
    </nav>

    <div class="flex-grow-1">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 mb-5">
                    <div class="logo-container mb-4">
                        <div class="logo-icon-wrapper">
                         <img src="{{asset('img/logo warkop.png')}}" alt="Logo" style="height: 50px; width: auto; object-fit: contain;">
                        </div>
                    </div>
                    
                    <p class="mb-4" style="color: var(--text-grey); line-height: 1.6; max-width: 400px;">
                        Tempat ngopi yang nyaman dengan suasana modern. Hub untuk komunitas gamers dan pecinta kopi di Blitar.
                    </p>

                    <div class="d-flex align-items-center gap-3 mb-3" style="color: var(--text-grey);">
                        <i class="bi bi-geo-alt fs-5" style="color: var(--color-blue);"></i>
                        <span>Blitar, Jawa Timur</span>
                    </div>
                    <div class="d-flex align-items-center gap-3" style="color: var(--text-grey);">
                        <i class="bi bi-clock fs-5" style="color: var(--color-blue);"></i>
                        <span>09:00 - 02:00 WIB</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5 ps-lg-5">
                    <h5 class="footer-title">Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link">Profil Warkop</a></li>
                        <li><a href="{{ route('menu') }}" class="footer-link">Menu Kopi</a></li>
                        <li><a href="{{ route('events') }}" class="footer-link">Event E-Sport</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Lokasi</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-5">
                    <h5 class="footer-title">Social Media</h5>
                    <a href="https://wa.me/6285649347525" target="_blank" class="social-item">
                        <i class="bi bi-whatsapp social-icon icon-wa"></i>
                        <span class="social-text">+62 856-4934-7525</span>
                    </a>
                    <a href="https://www.instagram.com/warkop.soeger/" class="social-item">
                        <i class="bi bi-instagram social-icon icon-ig"></i>
                        <span class="social-text">@omahsoeger</span>
                    </a>
                    <a href="https://www.tiktok.com/@warkopsoeger_blitar" class="social-item">
                        <i class="bi bi-tiktok social-icon icon-tt"></i>
                        <span class="social-text">Warkop Soeger Blitar</span>
                    </a>
                    <a href="mailto:warkopsoeger@gmail.com" class="social-item">
                        <i class="bi bi-envelope social-icon icon-email"></i>
                        <span class="social-text">warkopsoeger@gmail.com</span>
                    </a>
                </div>
            </div>

            <hr style="border-color: #222; margin-bottom: 30px;">
            <div class="row" style="color: #666; font-size: 0.9rem;">
                <div class="col-md-6 text-center text-md-start mb-2">
                    © 2025 Warkop Omah Soeger.<a href="https://github.com/El-M4nSzz"> By Afton Ilman.</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Blitar, Jawa Timur, Indonesia
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>