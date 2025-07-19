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
                sidebar.style.display = '';
                sidebar.classList.add('visible');
            }
        }, 500);
    
    setTimeout(function () {
            $('#loading-spinner').fadeOut();
        }, 1000);
    });

    setInterval(checkReportCount, 4000);

</script>

<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="loading-spinner" class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <!-- Toast Container -->
    <div class="position-fixed end-0 p-3" style="z-index: 9999">
        <div id="reportToast" class="toast align-items-center text-bg-primary border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toast-message">
                    <!-- Will be updated by JS -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

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

                    <!-- Companies -->
                    <li class="nav-item" id="Company">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#company">
                            <i class="ri-community-line"></i> Companies <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="company">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item nav-sub-item">
                                    <a href="{{ route('companies.index') }}" class="nav-link">
                                        <i class="ri-list-check"></i> All Companies
                                    </a>
                                </li>
                                <li class="nav-item nav-sub-item">
                                    <a href="{{ route('companies.create') }}" class="nav-link">
                                        <i class="ri-add-circle-line"></i> Add New Company
                                    </a>
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
                                <li class="nav-item nav-sub-item" id="view">
                                    <a href="{{ route('report-permission.index') }}" class="nav-link">Report
                                        Permission</a>
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
                                    <a href="{{ route('invoices.index') }}" id="view" class="nav-link">Live Stock
                                        setting</a>
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
                                    <a href="{{ route('financial-years.index') }}" class="nav-link">Financial Year</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="show">
                                    <a href="{{ route('openingbalance.index') }}" class="nav-link">Opening balance</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="show">
                                    <a href="{{ route('acccoa.index') }}" id="show" class="nav-link">Chart of
                                        Account</a>
                                </li>
                                <li class="nav-item nav-sub-item" id="show">
                                    <a href="{{ route('predefine.index') }}" id="view" class="nav-link">Predefine of
                                        Accounts </a>
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
            <div class="col-lg-10 col-md-9 col-sm-12" id="maincontent">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <!-- Sidebar Toggle Button -->
                        <button class="navbar-toggler d-block" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebar">
                            <i class="fa-solid fa-angles-right"></i>
                        </button>
                        <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Main Menu -->
                        <div class="collapse navbar-collapse" id="mainNavbar">

                        </div>

                        <!-- ADMIN & LogOut Button -->
                        <div
                            class="ms-auto d-flex align-items-center gap-3 px-3 py-2 bg-light rounded shadow-sm text-dark">
                            <!-- User Info -->
                            <div class="d-flex flex-column align-items-end text-end">
                                <strong class="text-capitalize">{{ auth()->user()->type }}</strong>
                                <small>{{ auth()->user()->name }}</small>
                            </div>

                            <!-- 🔔 Notification Dropdown -->
                            <div class="dropdown position-relative">
                                <a class="btn position-relative" href="#" role="button" id="notificationDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bell fs-4 text-primary"></i>

                                    <!-- Notification Badge -->
                                    @php
                                    $sessionCount = session('report_count') ?? 0;
                                    @endphp
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-size: 0.6rem;">
                                        {{ $sessionCount }}
                                    </span>
                                </a>

                                <!-- Dropdown Content -->
                                <ul class="dropdown-menu dropdown-menu-end shadow p-3"
                                    aria-labelledby="notificationDropdown" style="min-width: 200px;">
                                    <li class="fw-bold">Fiber Count:</li>
                                    <li class="text-center text-primary fs-5" id="report-count-text">{{
                                        session('report_count') }}</li>
                                    <li>
                                        <a href="{{ route('report.new') }}" class="btn btn-sm btn-primary w-100">
                                            View All
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Logout Button -->
                            <a href="{{ route('logout') }}"
                                class="d-flex align-items-center justify-content-center bg-danger text-white rounded-circle"
                                style="width: 40px; height: 40px; transition: 0.3s;">
                                <i class="fa-solid fa-sign-out-alt"></i>
                            </a>

                            <!-- Web Setting Link for Admin -->
                            @if(auth()->user()->type === 'admin')
                            <a href="{{ route('websetting') }}"
                                class="text-primary d-flex align-items-center gap-1 text-decoration-none"
                                style="transition: 0.3s;">
                                <i class="ri-settings-3-line fs-5"></i>
                                <span class="d-none d-md-inline">Web Setting</span>
                            </a>
                            @endif
                        </div>

                    </div>
                </nav>
                <div class="p-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Fixed Chat Icon Button -->
    <button type="button" class="btn btn-primary rounded-circle shadow position-fixed bottom-0 end-0 m-4"
        data-bs-toggle="modal" data-bs-target="#chatModal" style="width: 60px; height: 60px;">
        💬
    </button>

    <!-- Chat Mini Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm position-fixed bottom-0 end-0 m-5">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h6 class="modal-title" id="chatModalLabel">Chat</h6>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body overflow-auto" style="max-height: 200px;" id="chat-messages">

                </div>
                <div class="modal-footer py-2">

                </div>
            </div>
        </div>
    </div>

    <!-- Second Chat Modal (User Conversation) -->
    <div class="modal fade" id="userChatModal" tabindex="-1" aria-labelledby="userChatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm position-fixed bottom-0 end-0 m-5">
            <div class="modal-content d-flex flex-column" style="height: 400px;">
                <!-- Header -->
                <div class="modal-header py-2 bg-success text-white">
                    <h6 class="modal-title mb-0" id="userChatModalLabel">
                        <i class="bi bi-person-circle me-1"></i> Chat with <span id="chat-user-name"></span>
                    </h6>
                    <button type="button" class="btn-close btn-close-white btn-sm" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Chat Messages Area -->
                <div class="modal-body flex-grow-1 overflow-auto px-2 py-1" id="user-chat-body"
                    style="background-color: #f0f0f0;">
                    <!-- Messages will go here -->
                    <div class="text-muted text-center small">Start chatting...</div>
                </div>

                <!-- Footer Input -->
                <div class="modal-footer p-2 bg-light">
                    <form class="w-100 d-flex align-items-center gap-2" id="chat-send-form">
                        <!-- Hidden Receiver ID -->
                        <input type="hidden" id="chat-receiver-id" name="receiver_id" value="">

                        <!-- Message Input -->
                        <input type="text" class="form-control form-control-sm" id="chat-message-input"
                            placeholder="Type a message..." required>

                        <!-- Send Button -->
                        <button type="submit" class="btn btn-sm btn-success">
                            >
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast" id="reportToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notification</strong>
                <small>Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toast-message">
                <!-- Dynamic message here -->
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