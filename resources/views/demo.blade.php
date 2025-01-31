<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header & Sidebar with Theme Colors</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Remix Icons (if needed) -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Font Awesome (if needed) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        /* Header and Sidebar Background */
        #header, #sidebar {
            background-color: #1E1E2D; /* Light gray */
        }

        /* Main Content Background */
        .main-content {
            background-color: #2F2F3B; /* Off-white */
			color: white;
        }

        /* Text and Icon Colors */
        #header, #sidebar {
            color: #ffffff; /* Dark gray for text */
        }

        /* Hover and Active States */
        .nav-link:hover, .logout-link:hover, .link:hover {
            color: white; /* Blue for hover states */
        }

        /* Button Styles */
        .button {
            color: #ffffff; /* Dark gray for icons */
        }

        .button:hover {
            color: #007BFF; /* Blue for hover states */
        }

        /* Logo and Branding */
        .logo img {
            max-height: 50px; /* Adjust logo size */
        }

        /* Sidebar Menu */
        .nav-link {
            padding: 10px 15px;
            border-radius: 5px;
        }

        .nav-link.active {
            background-color: #007BFF; /* Blue for active menu item */
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div id="header" class="row fixed-top p-2">
        <!-- Toggle Button -->
        <div class="col-md-1 header-first d-flex justify-content-center align-items-center">
            <label id="menu" class="button" for="check" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                <i class="ri-menu-line"></i>
            </label>
        </div>

        <!-- Logo -->
        <div class="col-md-2 logo">
            <a href="/">
                @php
                $websetting = DB::table('web_settings')->where('id', 1)->first();
                @endphp
                <img src="{{ asset($websetting->logo ?? 'storage/default_logo.jpg') }}" alt="Logo" class="img-fluid">
            </a>
        </div>

        <!-- User Info and Logout -->
        <div class="col-md-3 offset-md-6 d-flex align-items-center justify-content-center">
            <strong>{{ auth()->user()->type }}</strong> &nbsp; || &nbsp; <strong>{{ auth()->user()->name }}</strong>
            <a href="{{ route('logout') }}" class="logout-link d-flex flex-column align-items-center p-2">
                <i class="ml-2 fa-solid fa-user"></i>
                <span class="logout-text">Log out</span>
            </a>
            @if(auth()->user()->type === 'admin')
            <a href="{{ route('websetting') }}" class="ml-2 link">
                <i class="ri-settings-line"></i>
                <span class="websetting">Web Setting</span>
            </a>
            @endif
        </div>
    </div>

    <!-- Sidebar and Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 col-sm-4 vh-100 offcanvas offcanvas-start" id="sidebar">
                <div class="p-3">
                    <h5>Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9 col-sm-8 main-content">
                <div class="p-4 mt-5">
                    <h1>Main Content</h1>
                    <p>This is the main content area. It adjusts automatically based on the sidebar's visibility.</p>
                    <p>Resize the browser window to see the responsive behavior.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>