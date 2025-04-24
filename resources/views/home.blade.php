<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom CSS for Banner */
        .banner {
            background: linear-gradient(rgba(0, 0, 0, 0.6)), 
                        url('{{ asset("images/banner.jpg") }}') no-repeat center center;
            background-size: cover;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            margin-bottom: 3rem;
            position: relative;
        }
        
        .banner::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }
        
        .banner-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem;
            max-width: 800px;
        }
        
        /* Card styling */
        .card-img-container {
            height: 200px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            padding: 1rem;
        }
        
        .card-img-top {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.1);
        }
        
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-body {
            flex-grow: 1;
            padding: 1.5rem;
        }
        
        /* Navbar styling */
        .navbar {
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        /* Footer styling */
        footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .banner {
                height: 300px;
            }
            
            .card-img-container {
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-book me-2"></i>Library System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/books') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/students') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/librarians') }}">Librarians</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/borrowings') }}">Borrowings</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-light me-3">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                    </span>
                    <a href="{{ route('logout') }}" class="btn btn-outline-light"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Banner Section -->
    <div class="banner">
        <div class="banner-content">
            <h1 class="display-4 fw-bold mb-3">Library Management System</h1>
            <p class="lead">Efficiently manage your library resources, students, and borrowing records</p>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="container">
        <div class="row g-4">
            <!-- Books Card -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-img-container">
                        <img src="{{ asset('images/books.jpg') }}" class="card-img-top" alt="Books Management">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Books Management</h5>
                        <p class="card-text text-muted">Manage all book information in the library collection.</p>
                        <div class="mt-auto">
                            <a href="{{ url('/books') }}" class="btn btn-primary">
                                <i class="fas fa-book me-1"></i> Manage Books
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Students Card -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-img-container">
                        <img src="{{ asset('images/student.jpg') }}" class="card-img-top" alt="Students Management">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Students Management</h5>
                        <p class="card-text text-muted">Register and manage student accounts and borrowing privileges.</p>
                        <div class="mt-auto">
                            <a href="{{ url('/students') }}" class="btn btn-primary">
                                <i class="fas fa-users me-1"></i> Manage Students
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Librarians Card -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-img-container">
                        <img src="{{ asset('images/librarians.png') }}" class="card-img-top" alt="Librarians Management">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Librarians Management</h5>
                        <p class="card-text text-muted">Manage librarian accounts and system access.</p>
                        <div class="mt-auto">
                            <a href="{{ url('/librarians') }}" class="btn btn-primary">
                                <i class="fas fa-user-shield me-1"></i> Manage Librarians
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <!-- Main Content -->
 <div class="container mt-5">
        <h2 class="text-center">Explore Our Features</h2>
        <p class="text-center">Use the navigation menu to explore Students, Books, and Librarians.</p>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 School Library</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>