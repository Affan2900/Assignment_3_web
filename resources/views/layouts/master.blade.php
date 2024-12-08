<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wild Time Zoo')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Apply the font globally */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e0f5d1; /* Light green */
            margin: 0;
            padding: 0;
        }

        /* Navbar styles */
        .navbar {
            background-color: #004d00; /* Dark green */
            color: #ffffff;
        }

        /* Sidebar styles */
        .sidebar {
            background-color: #a2d9a5; /* Soft green */
            height: 100vh;
            overflow-y: auto;
            padding: 1rem;
        }

        /* Footer styles */
        .footer {
            background-color: #004d00; /* Dark green */
            color: #ffffff;
            text-align: center;
            font-size: 0.9rem;
        }

        /* Links in the footer */
        .footer a {
            color: #c3f0a2; /* Highlight color */
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <header>
        @include('partials.navbar')
    </header>

    <!-- Sidebar and Main Content -->
    <div class="container-fluid">
        <div class="row flex-grow-1">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar">
                @include('partials.sidebar')
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3">
        @include('partials.footer')
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
