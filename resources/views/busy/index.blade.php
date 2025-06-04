<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ERP System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Multi-level dropdown support - CSS only version */
        .dropdown-menu .dropdown-submenu {
            position: relative;
        }
        
        .dropdown-menu .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            display: none;
        }
        
        .dropdown-menu .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }
        
        .dropdown-menu .dropdown-submenu > a::after {
            content: " ▸";
            float: right;
        }
        
        /* Make dropdown work on hover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        /* Adjust for mobile view */
        @media (max-width: 991.98px) {
            .dropdown-menu .dropdown-submenu .dropdown-menu {
                position: static;
                margin-left: 15px;
                margin-top: 0;
                border-left: 1px solid #dee2e6;
            }
            
            .dropdown:hover .dropdown-menu {
                display: none;
            }
            
            .dropdown.show .dropdown-menu {
                display: block;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ERP System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto">

                <!-- Company -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="companyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-building"></i> Company
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Company Info</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">A</a></li>
                                <li><a class="dropdown-item" href="#">B</a></li>
                                <li><a class="dropdown-item" href="#">C</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Branches</a></li>
                        <li><a class="dropdown-item" href="#">Financial Year</a></li>
                    </ul>
                </li>

                <!-- Administration -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user-shield"></i> Administration
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Department</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('departments.index') }}">Show Departments</a></li>
                                <li><a class="dropdown-item" href="{{ route('departments.create') }}">Add Departments</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Product Section</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('mainstore.section') }}">Main Store</a></li>
                                <li><a class="dropdown-item" href="{{ route('Manufactur.section') }}">Manufacturer</a></li>
                                <li><a class="dropdown-item" href="{{ route('Repair.section') }}">Repair</a></li>
                                <li><a class="dropdown-item" href="{{ route('baddesk.section') }}">Bad Desk</a></li>
                                <li><a class="dropdown-item" href="{{ route('sell.section') }}">Sell</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Roles</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('user.index') }}">Show User</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.create') }}">Add User</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#">Permissions</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('manage.permissions') }}">Show Permission</a></li>
                                <li><a class="dropdown-item" href="{{ route('manage.permissions.create') }}">Add Permission</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Transaction -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="transactionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-arrows-rotate"></i> Transaction
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="transactionDropdown">
                        <li><a class="dropdown-item" href="#">Product Purchase</a></li>
                        <li><a class="dropdown-item" href="#">Product Return</a></li>
                        <li><a class="dropdown-item" href="#">Product Issue</a></li>
                        <li><a class="dropdown-item" href="#">Product Issue Return</a></li>
                    </ul>
                </li>

                <!-- Display -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="displayDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-display"></i> Display
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="displayDropdown">
                        <li><a class="dropdown-item" href="#">All Store Inventory</a></li>
                        <li><a class="dropdown-item" href="#">Purchase Table</a></li>
                        <li><a class="dropdown-item" href="#">Issue Table</a></li>
                        <li><a class="dropdown-item" href="#">Product Master Table</a></li>
                    </ul>
                </li>

                <!-- Reports -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-file-alt"></i> Reports
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                        <li><a class="dropdown-item" href="#">Store</a></li>
                        <li><a class="dropdown-item" href="#">Manufacturer</a></li>
                        <li><a class="dropdown-item" href="#">Repair</a></li>
                        <li><a class="dropdown-item" href="#">Sell</a></li>
                        <li><a class="dropdown-item" href="#">Bad Desk</a></li>
                    </ul>
                </li>

                <!-- Master -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="masterDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-database"></i> Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="masterDropdown">
                        <li><a class="dropdown-item" href="#">Department</a></li>
                        <li><a class="dropdown-item" href="#">User</a></li>
                        <li><a class="dropdown-item" href="#">Permission</a></li>
                        <li><a class="dropdown-item" href="#">Roles</a></li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
@include('busy.login-modal')
<!-- Bootstrap JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>