<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Laravel Developer</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* =========================================
           FAST & OPTIMIZED THEME (No Heavy Blurs)
        ========================================= */
        :root {
            --bg-color: #0b0c10;
            --card-bg: #15171e; /* Solid dark color instead of transparent */
            --primary-neon: #8b5cf6;
            --secondary-neon: #06b6d4;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            overflow-x: hidden;
            /* Replaced heavy gradients with a fast static dot pattern */
            background-image: radial-gradient(rgba(139, 92, 246, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
        }

        ::selection {
            background-color: var(--primary-neon);
            color: white;
        }

        .text-gradient {
            background: linear-gradient(to right, var(--primary-neon), var(--secondary-neon));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-nav {
            background: linear-gradient(to right, #c084fc, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 900;
            letter-spacing: 0.1em;
        }

        /* Navbar - Removed backdrop-filter for speed */
        .navbar-custom {
            background-color: rgba(11, 12, 16, 0.98); 
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .nav-link {
            color: var(--text-main) !important;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            transition: color 0.3s;
        }
        .nav-link:hover { color: var(--secondary-neon) !important; }

        /* Buttons - Lightweight shadows */
        .btn-custom-primary {
            background: linear-gradient(135deg, var(--primary-neon), var(--secondary-neon));
            color: white;
            font-weight: 700;
            border: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 92, 246, 0.4);
            color: white;
        }
        
        .btn-custom-secondary {
            background: var(--card-bg);
            color: white;
            font-weight: 700;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }
        .btn-custom-secondary:hover {
            border-color: var(--primary-neon);
            color: var(--primary-neon);
            transform: translateY(-2px);
        }

        /* =========================================
           FAST CARDS (Solid Background + GPU Accel)
        ========================================= */
        .cyber-card {
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1rem;
            /* Hardware acceleration for smooth hover */
            transform: translateZ(0);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .cyber-card:hover {
            transform: translateY(-5px); /* Simple lift */
            box-shadow: 0 10px 20px -5px rgba(139, 92, 246, 0.2);
            border-color: rgba(139, 92, 246, 0.5);
        }

        /* Fast Icon Animation */
        .cyber-card .card-icon-wrapper {
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .cyber-card:hover .card-icon-wrapper {
            transform: scale(1.1);
            color: var(--secondary-neon) !important;
        }

        /* Form Inputs */
        .form-control-custom {
            background-color: #0b0c10;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 0.5rem;
            transition: border-color 0.3s;
        }
        .form-control-custom:focus {
            background-color: #0b0c10;
            color: white;
            border-color: var(--secondary-neon);
            box-shadow: none;
        }
        
        .footer-custom {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: var(--text-muted);
        }

        /* =========================================
           FAST SLIDER (Removed 3D Coverflow)
        ========================================= */
        .swiper {
            padding-bottom: 40px !important;
            overflow: hidden; /* Fast rendering */
        }

        /* Removed opacity and scale changes to prevent lag */
        .swiper-slide {
            height: auto;
        }

        .swiper-slide-active .cyber-card {
            border-color: rgba(139, 92, 246, 0.6);
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.15);
        }

        .swiper-pagination-bullet-active {
            background: var(--primary-neon) !important;
            width: 20px !important;
            border-radius: 999px !important;
        }
        .swiper-pagination-bullet { background: #475569; }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <nav class="navbar navbar-expand-md fixed-top navbar-custom py-3">
        <div class="container" style="max-width: 80rem;">
            <a class="navbar-brand text-decoration-none" href="#">
                <span class="text-gradient-nav fs-4">DEV<span style="color: white; -webkit-text-fill-color: white;">.PORTFOLIO</span></span>
            </a>
            
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navMenu">
                <div class="d-flex flex-column flex-md-row align-items-center gap-4 mt-3 mt-md-0">
                    <a href="#about" class="nav-link text-decoration-none">ABOUT</a>
                    <a href="#skills" class="nav-link text-decoration-none">SKILLS</a>
                    <a href="#projects" class="nav-link text-decoration-none">PROJECTS</a>
                    <a href="#contact" class="nav-link text-decoration-none">CONTACT</a>
                    <a href="{{ route('login') }}" class="btn btn-custom-primary rounded-pill px-4 py-2 shadow-sm">
                        Admin Portal
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Removed AOS for instant load) -->
    <section id="about" class="d-flex flex-column justify-content-center align-items-center text-center position-relative" style="min-height: 100vh; padding-top: 7rem; padding-left: 1.5rem; padding-right: 1.5rem;">
        <div style="max-width: 56rem;">
            <div class="d-inline-flex align-items-center gap-2 rounded-pill px-4 py-2 mb-4" style="background: rgba(139, 92, 246, 0.1); border: 1px solid rgba(139, 92, 246, 0.3);">
                <span class="rounded-circle" style="width: 10px; height: 10px; background: var(--secondary-neon);"></span>
                <span class="text-uppercase font-monospace fw-bold" style="color: #22d3ee; font-size: 0.7rem; letter-spacing: 0.1em;">Available for New Projects</span>
            </div>
            
            <h1 class="fw-black mb-4 tracking-tight leading-none" style="font-size: clamp(3rem, 6vw, 4.5rem); font-weight: 900;">
                CRAFTING SCALABLE <br />
                <span class="text-gradient">WEB SOLUTIONS</span>
            </h1>
            
            <p class="text-secondary mb-5 mx-auto fw-light leading-relaxed" style="max-width: 42rem; font-size: 1.15rem;">
                Full-Stack Developer crafting high-performance, responsive web applications using <strong class="text-white fw-semibold">Laravel</strong>, PHP, MySQL, and Modern UI Frameworks with <strong class="text-white fw-semibold">Bootstrap</strong>.
            </p>

            <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
                <a href="#projects" class="btn btn-custom-primary rounded-3 px-4 py-3 d-flex align-items-center gap-3">
                    <span>Explore Projects</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="{{ route('cv.download') }}" class="btn btn-custom-secondary rounded-3 px-4 py-3 d-flex align-items-center gap-3">
                    <i class="fa-solid fa-file-arrow-down"></i>
                    <span>Download CV</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-5 position-relative">
        <div class="container py-4" style="max-width: 80rem;">
            <div class="text-center mb-5">
                <h2 class="fw-bolder tracking-tight" style="font-size: 2.25rem;">TECHNICAL <span class="text-gradient">STACK</span></h2>
                <p class="text-secondary text-uppercase font-monospace mt-2" style="font-size: 0.75rem; letter-spacing: 0.1em;">Modern Frameworks & Architecture</p>
            </div>

            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <div class="cyber-card p-4 text-center h-100">
                        <div class="card-icon-wrapper fs-1 mb-3" style="color: #ff2d20;"><i class="fa-brands fa-laravel"></i></div>
                        <h3 class="fs-6 fw-bold text-white mb-1">Laravel 11</h3>
                        <p class="text-secondary font-monospace mb-0" style="font-size: 0.7rem;">Backend Core</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="cyber-card p-4 text-center h-100">
                        <div class="card-icon-wrapper fs-1 mb-3" style="color: #8892be;"><i class="fa-brands fa-php"></i></div>
                        <h3 class="fs-6 fw-bold text-white mb-1">PHP 8.x</h3>
                        <p class="text-secondary font-monospace mb-0" style="font-size: 0.7rem;">OOP Architecture</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="cyber-card p-4 text-center h-100">
                        <div class="card-icon-wrapper fs-1 mb-3" style="color: #00758f;"><i class="fa-solid fa-database"></i></div>
                        <h3 class="fs-6 fw-bold text-white mb-1">MySQL</h3>
                        <p class="text-secondary font-monospace mb-0" style="font-size: 0.7rem;">Schema Design</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="cyber-card p-4 text-center h-100">
                        <div class="card-icon-wrapper fs-1 mb-3" style="color: #7952b3;"><i class="fa-brands fa-bootstrap"></i></div>
                        <h3 class="fs-6 fw-bold text-white mb-1">Bootstrap 5</h3>
                        <p class="text-secondary font-monospace mb-0" style="font-size: 0.7rem;">Responsive UI</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Slider -->
    <section id="projects" class="py-5 position-relative">
        <div class="container py-4" style="max-width: 80rem;">
            <div class="text-center mb-5">
                <h2 class="fw-bolder tracking-tight" style="font-size: 2.25rem;">FEATURED <span class="text-gradient">WORKS</span></h2>
                <p class="text-secondary text-uppercase font-monospace mt-2" style="font-size: 0.75rem; letter-spacing: 0.1em;">Swipe to explore</p>
            </div>

            <div class="swiper projectSwiper py-4">
                <div class="swiper-wrapper">
                    @forelse($projects as $project)
                        <div class="swiper-slide">
                            <div class="cyber-card p-4 h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="card-icon-wrapper rounded-3 d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px; background: rgba(139, 92, 246, 0.1); color: var(--primary-neon);">
                                            <i class="fa-solid fa-code"></i>
                                        </div>
                                        <span class="font-monospace fw-semibold rounded-pill px-3 py-1" style="background: rgba(0,0,0,0.4); color: var(--secondary-neon); font-size: 0.7rem;">
                                            {{ $project->technologies }}
                                        </span>
                                    </div>
                                    <h3 class="fs-5 fw-bold mb-2 text-white">
                                        {{ $project->title }}
                                    </h3>
                                    <p class="text-secondary mb-4" style="font-size: 0.875rem; line-height: 1.6;">
                                        {{ $project->description }}
                                    </p>
                                </div>
                                <div class="d-flex gap-3 pt-3" style="border-top: 1px solid rgba(255,255,255,0.05);">
                                    @if($project->github_link)
                                        <a href="{{ $project->github_link }}" target="_blank" class="text-decoration-none fw-bold d-flex align-items-center gap-2" style="color: #cbd5e1; font-size: 0.75rem;">
                                            <i class="fa-brands fa-github"></i> Repo
                                        </a>
                                    @endif
                                    @if($project->demo_link)
                                        <a href="{{ $project->demo_link }}" target="_blank" class="text-decoration-none fw-bold d-flex align-items-center gap-2" style="color: var(--secondary-neon); font-size: 0.75rem;">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="cyber-card p-5 text-center text-secondary" style="font-size: 0.875rem;">
                                No projects added yet.
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination mt-4 position-relative"></div>
            </div>
        </div>
    </section>

    <!-- Contact Form -->
    <section id="contact" class="py-5 position-relative">
        <div class="container py-4" style="max-width: 40rem;">
            <div class="cyber-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="fs-3 fw-bolder mb-1 text-white">LET'S <span class="text-gradient">CONNECT</span></h2>
                    <p class="text-secondary" style="font-size: 0.75rem;">Send a direct message and let's work together.</p>
                </div>

                @if(session('success'))
                    <div class="text-center fw-bold mb-4 p-3 rounded-3" style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.3); color: #4ade80; font-size: 0.75rem;">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-uppercase font-monospace fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em; color: var(--text-muted);">Your Name</label>
                        <input type="text" name="name" required class="form-control form-control-custom p-3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase font-monospace fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em; color: var(--text-muted);">Your Email</label>
                        <input type="email" name="email" required class="form-control form-control-custom p-3">
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-uppercase font-monospace fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em; color: var(--text-muted);">Message</label>
                        <textarea name="message" rows="4" required class="form-control form-control-custom p-3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom-primary w-100 py-3 rounded-3">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4 footer-custom" style="font-size: 0.75rem;">
        &copy; {{ date('Y') }} Portfolio. Engineered with Laravel & Bootstrap.
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Fast Swiper Slider (Removed heavy 3D effects)
        new Swiper(".projectSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 300, // Very fast sliding
            autoplay: {
                delay: 3000, 
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    </script>
</body>
</html>