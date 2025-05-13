<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="shortcut icon" href="{{asset('storage/favicon.ico') }}">-->
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="/public/js/jquery-3.7.1.min.js"></script>
    <script src="/public/js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="css/style.css">-->
    <!--<script src="js/jquery-3.7.1.min.js"></script>-->
    <!--<script src="{{ asset('js/script.js') }}"></script>-->
    <link rel="shortcut icon" href="/public/storage/favicon.ico">
    <link rel="stylesheet" href="/public/css/style.css">
    <!--<link rel="stylesheet" href="public/css/bootstrap.min.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}

    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

    {{--
    <link rel="stylesheet" href="css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Before closing </body> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<script>
    window.addEventListener('load', function () {
        setTimeout(function () {
            const sidebar = document.getElementById('sidebar');

            if (sidebar && sidebar.style.display === 'none') {
                sidebar.style.display = ''; // Remove display: none
                sidebar.classList.add('visible'); // Add visible class for transition
            }
        }, 500); // 500 milliseconds = 0.5 seconds
    
    setTimeout(function () {
            $('#loading-spinner').fadeOut(); // Fade out the spinner
        }, 1000);
    });

    
</script>
<style>
    /* Dropdown background and text color fix for dark navbar */
    .navbar-dark .dropdown-menu {
        background-color: #343a40;
        /* dark background */
    }

    .navbar-dark .dropdown-menu .dropdown-item {
        color: #ffffff;
        /* white text */
    }

    .navbar-dark .dropdown-menu .dropdown-item:hover,
    .navbar-dark .dropdown-menu .dropdown-item:focus {
        background-color: #495057;
        /* darker hover */
        color: #ffffff;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .collapse {
        position: static;
    }

    .dropdown-submenu .dropdown-item[aria-expanded="true"] {
        background-color: rgba(0, 0, 0, 0.1);
    }

    .dropdown-submenu .list-unstyled {
        margin-bottom: 0;
    }

    /* .dropdown-menu .dropdown-submenu > a {
        pointer-events: none;
    }
    
    .dropdown-menu .dropdown-submenu > .collapse {
        pointer-events: auto;
    }
        
    */
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-left: 0;
        margin-right: 0;
        display: none;
        position: absolute;
    }

    .dropdown-submenu:hover .dropdown-menu {
        display: block;
    }
</style>

<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="loading-spinner" class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <div class="container-fluid">
            <!-- Sidebar Toggle Button -->
            <button class="navbar-toggler d-block" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
                <i class="fa-solid fa-angles-right"></i>
            </button>
            <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Main Menu -->
            <div class="collapse navbar-collapse bg-dark" id="mainNavbar">
                <ul class="navbar-nav me-auto">
                    <!-- Company -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="companyDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-building"></i> Company
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Nested Dropdown -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Company Info</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">A</a></li>
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
                        <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user-shield"></i> Administration
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Department Dropdown Item -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Department</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('departments.index') }}" class="dropdown-item">Show
                                            Departments</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('departments.create') }}" class="dropdown-item">Add
                                            Departments</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Product Section --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                   </i>Product Section
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('mainstore.section') }}" class="dropdown-item">Main Store</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('Manufactur.section') }}" class="dropdown-item">Manufacturer</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('Repair.section') }}" class="dropdown-item">Repair</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('baddesk.section') }}" class="dropdown-item">Bad Desk</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sell.section') }}" class="dropdown-item">Sell</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Roles --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Roles</a>
                                <ul class="dropdown-menu">

                                    <!-- Roles Submenu with collapse toggle -->
                                    <li>

                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ route('user.index') }}" class="dropdown-item">Show User</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('user.create') }}" class="dropdown-item">Add User</a>
                                            </li>

                                        </ul>

                                    </li>
                                </ul>
                            </li>
                            {{-- Permissions --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Permissions</a>
                                <ul class="dropdown-menu">
                                    <!--PPermission -->
                                    <li>
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ route('manage.permissions') }}" class="dropdown-item">Show
                                                    Permission</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('manage.permissions.create') }}"
                                                    class="dropdown-item">Add Permission</a>
                                            </li>
                                        </ul>

                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- Transaction -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="transactionDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-exchange-alt"></i> Transaction
                        </a>
                        <ul class="dropdown-menu">
                            {{-- Supplier --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Supplier</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('party.create') }}" class="dropdown-item">Add Supplier</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('party.show') }}" class="dropdown-item">Show Supplier</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('payment.create') }}" class="dropdown-item">Add Payment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('payment.index') }}" class="dropdown-item">Supplier Payment</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Category --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Category</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('category.create') }}" class="dropdown-item">Add Category</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('category.index') }}" class="dropdown-item">Show Category</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('subcategory.index') }}" class="dropdown-item">Show Sub Category</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Purchase --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"> Purchase
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('inward.good.view') }}" class="dropdown-item">Add Purchase</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('inward.index') }}" class="dropdown-item">Show Purchase</a>
                                    </li>
                                    <li>
                                     
                                    </li>
                                </ul>
                            </li>
                            {{-- Sale --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Sale/Product Out-In</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('sale.create') }}" class="dropdown-item">Add Sale/Product Out</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sale.repair.create') }}" class="dropdown-item">Add Repair/Product Out</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('replacement.create') }}" class="dropdown-item">Replacement</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sale.index') }}" class="dropdown-item">Show Product Out</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sale.return.index') }}" class="dropdown-item">Sale Return</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- Purchase Return --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"> Purchase Return
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('inward.index') }}" class="dropdown-item">Show Return Purchase</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('purchase.return.create') }}" class="dropdown-item">Add Return Purchase</a>
                                    </li>
                                </ul>
                            </li>
                            {{--  Sale Return --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#"> Sale Return
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('sale.return.index') }}" class="dropdown-item">Show Return Sale</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sale.return') }}" class="dropdown-item">Add Return Sale</a>
                                    </li>
                                </ul>
                            </li>
                            {{--  GST PDF --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <i class="ri-user-star-line me-1"></i> GST PDF
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('gst-pdf.index') }}" class="dropdown-item">GST PDF Invoice</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('gst-pdf.create') }}" class="dropdown-item">GST PDF Create</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <!-- Display -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="displayDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-desktop"></i> Display
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Reports</a></li>
                            <li><a class="dropdown-item" href="#">Dashboards</a></li>
                            <li><a class="dropdown-item" href="#">Custom Views</a></li>
                        </ul>
                    </li>

                    <!-- Print/Email/SMS -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="communicationDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-paper-plane"></i> Print/Email/SMS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Print Documents</a></li>
                            <li><a class="dropdown-item" href="#">Email Templates</a></li>
                            <li><a class="dropdown-item" href="#">SMS Gateway</a></li>
                        </ul>
                    </li>

                    <!-- House Keeping -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="housekeepingDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-broom"></i> House Keeping
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Database Maintenance</a></li>
                            <li><a class="dropdown-item" href="#">Backup/Restore</a></li>
                            <li><a class="dropdown-item" href="#">System Cleanup</a></li>
                        </ul>
                    </li>

                    <!-- Help -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-question-circle"></i> Help
                        </a>
                    </li>

                    <!-- Favorites -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="favoritesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-star"></i> Favorites
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Saved Reports</a></li>
                            <li><a class="dropdown-item" href="#">Quick Links</a></li>
                            <li><a class="dropdown-item" href="#">Bookmarks</a></li>
                        </ul>
                    </li>

                    <!-- Add-On -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="addonDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <i class="fa-solid fa-puzzle-piece"></i> Add-On
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Plugins</a></li>
                            <li><a class="dropdown-item" href="#">Integrations</a></li>
                            <li><a class="dropdown-item" href="#">Extensions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- ADMIN & LogOut Button -->
            <div class="ms-auto d-flex align-items-center justify-content-center">
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

                <!-- Mobile Menu Toggle Button -->

            </div>
        </div>
    </nav>

    <!-- Sidebar and Main Content -->
    <div class="container-fluid" id="content">
        <div class="row h-100">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 col-sm-12 sidebar collapse show bg-dark" id="sidebar">
                <!-- Logo -->
                <div class="text-center py-3 ">
                    @php
                    $websetting = DB::table('web_settings')->where('id', 1)->first();
                    @endphp
                    <img src="{{ asset($websetting->logo ?? 'storage/default_logo.jpg') }}" alt="Logo"
                        class="img-fluid">
                    {{-- <img src="{{ asset('storage/logo.jpg')}}" alt="Logo" class="img-fluid"> --}}
                </div>
                <!-- Sidebar Content -->
                <ul class="nav flex-column">
                    <!-- Home -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="ri-home-2-line"></i> Home
                        </a>
                    </li>
                    <!-- Supplier -->
                    <li class="nav-item" id="Party">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#supplier">
                            <i class="ri-user-star-line"></i> Supplier <i class="ri-arrow-down-s-line float-end"></i>
                        </a>

                        <div class="collapse" id="supplier">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('party.create') }}" class="nav-link">Add Supplier</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('party.show') }}" class="nav-link">Show Supplier</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('payment.create') }}" class="nav-link">Add Payment</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('payment.index') }}" class="nav-link">Supplier Payment</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Departments -->
                    <li class="nav-item" id="Department">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#department">
                            <i class="ri-building-line"></i> Departments <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="department">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item">
                                    <a href="{{ route('departments.index') }}" class="nav-link">Show Departments</a>
                                </li>
                                <li class="nav-item nav-sub-item">
                                    <a href="{{ route('departments.create') }}" class="nav-link">Add Departments</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Types -->
                    <li class="nav-item" id="Type">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#typeMenu">
                            <i class="ri-user-line"></i> Types <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="typeMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('type.index') }}" class="nav-link">Show Types</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('type.create') }}" class="nav-link">Add Types</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Permissions -->
                    @if(auth()->user()->type === 'admin')
                    <li class="nav-item" id="Permission">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#permissionMenu">
                            <i class="ri-lock-2-line"></i> Permissions <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="permissionMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('user.index') }}" class="nav-link">Show User</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('user.create') }}" class="nav-link">Add User</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('manage.permissions') }}" class="nav-link">Show Permission</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('manage.permissions.create') }}" class="nav-link">Add
                                        Permission</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <!-- Category -->
                    <li class="nav-item" id="Category">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#categoryMenu">
                            <i class="ri-folder-line"></i> Category <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="categoryMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('category.create') }}" class="nav-link">Add Category</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('category.index') }}" class="nav-link">Show Category</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('subcategory.index') }}" class="nav-link">Show Sub Category</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Inward -->
                    <li class="nav-item" id="Inward">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#inwardMenu">
                            <i class="ri-download-line"></i> Purchase <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="inwardMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('inward.good.view') }}" class="nav-link">Add Purchase</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('inward.index') }}" class="nav-link">Show Purchase</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('inward.return.index') }}" class="nav-link">Show Return
                                        Purchase</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('inward.payment.index') }}" class="nav-link">Show Payment</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item" id="Layout">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#ReportLayout">
                            <i class="ri-layout-line"></i> Report Layout <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="ReportLayout">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('layouts.create') }}" class="nav-link">Add Report Layout</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('layouts.index') }}" class="nav-link">Show Report Layout</a>
                                </li>
                        </div>
                    </li>
                    <!-- Report -->
                    <li class="nav-item" id="Report">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#reportMenu">
                            <i class="ri-file-chart-line"></i> Report <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="reportMenu">
                            <ul class="nav flex-column ms-3">
                                @if(in_array(auth()->user()->type, ['admin', 'electric', 'godown']))
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('report.create') }}" class="nav-link">Add Report</a>
                                </li>
                                @endif

                                @if(in_array(auth()->user()->type, ['admin', 'user', 'account', 'cavity', 'electric']))
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('report.index') }}" class="nav-link">Show Report</a>
                                </li>
                                @endif
                                @if(in_array(auth()->user()->type, ['admin', 'user', 'account']) )
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('report.reject') }}" class="nav-link">Rejected Report</a>
                                </li>
                                @endif
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('report.search') }}" class="nav-link">Search Report</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('report.new') }}" class="nav-link">All Report</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('report.stock') }}" class="nav-link">Stock Report</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('report.ready') }}" class="nav-link">Ready Report</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('invoices.index') }}" id="view" class="nav-link">Select
                                        Invoice</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Sale -->
                    <li class="nav-item" id="Sale">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#saleMenu">
                            <i class="fa-brands fa-sellsy me-1"></i>Sale/ Product Out-In <i
                                class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="saleMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('sale.create') }}" class="nav-link">Add Sale/Product Out</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('sale.repair.create') }}" class="nav-link">Add Repair/ Product Out
                                    </a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('replacement.create') }}" class="nav-link">Replacement </a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('sale.index') }}" class="nav-link">Show Product Out</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('sale.return.index') }}" class="nav-link">Sale Return</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Customer -->
                    <li class="nav-item" id="Customer">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#customerMenu">
                            <i class="ri-user-star-line"></i> Customer <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="customerMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('customer.create') }}" class="nav-link">Add Customer</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('customer.index') }}" class="nav-link">Show Customer</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('payment.customer.create') }}" class="nav-link">Add Payment</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('payment.customer.index') }}" class="nav-link">Customer
                                        Payment</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Section -->
                    <li class="nav-item" id="Section">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#SectionMenu">
                            <i class="fa-solid fa-puzzle-piece"></i> Section <i
                                class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="SectionMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('mainstore.section') }}" class="nav-link">Main Store</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('Manufactur.section') }}" class="nav-link">Manufacturer</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('Repair.section') }}" class="nav-link">Repair</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('baddesk.section') }}" class="nav-link"> Bad Desk </a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('sell.section') }}" class="nav-link"> Sell </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Pre Account -->
                    <li class="nav-item" id="Account">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#accountMenu">
                            <i class="ri-user-star-line"></i> Pre Account <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="accountMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('gst-pdf.index') }}" class="nav-link">GST PDF Invoice</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="show">
                                    <a href="{{ route('final.balance') }}" class="nav-link">Final balance</a>
                                </li>
                                 <li class="nav-item nav-sub-item" id="show">
                                    <a href="{{ route('openingbalance.index') }}" class="nav-link">Opening balance</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Bank -->
                    <li class="nav-item" id="Bank">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#bankMenu">
                            <i class="ri-bank-line"></i> Bank <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="bankMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('banks.create') }}" class="nav-link">Add Bank</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('banks.index') }}" class="nav-link">Show Bank</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Expense -->
                    <li class="nav-item" id="Expense">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#expenseMenu">
                            <i class="ri-money-dollar-circle-line"></i> Expense <i
                                class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="expenseMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('expenses.create') }}" class="nav-link">Add Expense</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('expenses.index') }}" class="nav-link">Show Expense</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Sale Product List -->
                    <li class="nav-item" id="Sale Product List">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#saleProductMenu">
                            <i class="ri-money-dollar-circle-line"></i> Sale Product List <i
                                class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="saleProductMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('saleproductcategory.create') }}" class="nav-link">Add Sale
                                        Product Category</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('saleproductcategory.index') }}" class="nav-link">Show Sale
                                        Product Categories</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="add">
                                    <a href="{{ route('saleproductsubcategory.create') }}" class="nav-link">Add Sale
                                        Product Sub Category</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('saleproductsubcategory.index') }}" class="nav-link">Show Sale
                                        Product Sub Categories</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>

            </div>
            <!-- Main Content -->
            <div class="col-lg-10 col-md-9 col-sm-12 text-white" id="maincontent">
                <div class="p-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <div class="text-white bg-dark" id="footer">
        {{$websetting->footer_text ?? null}}
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>