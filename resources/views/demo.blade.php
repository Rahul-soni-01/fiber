<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('storage/favicon.ico') }}">
    <link rel="stylesheet" href="css/style.css">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}

    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.0/purify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
    {{--
    <link rel="stylesheet" href="css/bootstrap.min.css"> --}}
</head>

<body id="header">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <div class="container-fluid">
            <!-- Toggle Button -->
            <button class="navbar-toggler d-block" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- ADMIN & LogOut Button -->
            <div class="ms-auto d-flex align-items-center justify-content-center">
                {{-- <span class="navbar-text text-dark me-3">ADMIN</span> --}}
                {{-- <button class="btn btn-outline-light text-dark">LogOut</button> --}}
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
    </nav>

    <!-- Sidebar and Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 col-md-3 col-sm-4 sidebar collapse show bg-dark">
                <!-- Logo -->
                <div class="text-center py-3 ">
                    @php
                    $websetting = DB::table('web_settings')->where('id', 1)->first();
                    @endphp
                    <img src="{{ asset($websetting->logo ?? 'storage/default_logo.jpg') }}" alt="Logo" class="img-fluid">
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
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#supplierMenu">
                            <i class="ri-user-star-line"></i> Supplier <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="supplierMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('party.create') }}" class="nav-link">Add Supplier</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('party.show') }}" class="nav-link">Show Supplier</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('payment.create') }}" class="nav-link">Add Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('payment.index') }}" class="nav-link">Supplier Payment</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Departments -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#departmentMenu">
                            <i class="ri-user-line"></i> Departments <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="departmentMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('departments.index') }}" class="nav-link">Show Departments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('departments.create') }}" class="nav-link">Add Departments</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Types -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#typeMenu">
                            <i class="ri-user-line"></i> Types <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="typeMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('type.index') }}" class="nav-link">Show Types</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('type.create') }}" class="nav-link">Add Types</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Permissions -->
                    @if(auth()->user()->type === 'admin')
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#permissionMenu">
                            <i class="ri-lock-2-line"></i> Permissions <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="permissionMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('user.index') }}" class="nav-link">Show User</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('user.create') }}" class="nav-link">Add User</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manage.permissions') }}" class="nav-link">Show Permission</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manage.permissions.create') }}" class="nav-link">Add
                                        Permission</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif

                    <!-- Category -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#categoryMenu">
                            <i class="ri-folder-line"></i> Category <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="categoryMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('category.create') }}" class="nav-link">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">Show Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('subcategory.index') }}" class="nav-link">Show Sub Category</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Inward -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#inwardMenu">
                            <i class="ri-download-line"></i> Inward <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="inwardMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('inward.good.view') }}" class="nav-link">Add Good Inward</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('inward.index') }}" class="nav-link">Show Inward</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('inward.return.index') }}" class="nav-link">Show Return
                                        Purchase</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('inward.payment.index') }}" class="nav-link">Show Payment</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>

                    <!-- Report -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#reportMenu">
                            <i class="ri-file-chart-line"></i> Report <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="reportMenu">
                            <ul class="nav flex-column ms-3">
                                @if(in_array(auth()->user()->type, ['admin', 'user', 'account', 'cavity', 'electric']))
                                <li class="nav-item">
                                    <a href="{{ route('report.index') }}" class="nav-link">Show Report</a>
                                </li>
                                @endif
                                @if(in_array(auth()->user()->type, ['admin', 'electric', 'godown']))
                                <li class="nav-item">
                                    <a href="{{ route('report.create') }}" class="nav-link">Add Report</a>
                                </li>
                                @endif
                                @if(auth()->user()->type === 'user')
                                <li class="nav-item">
                                    <a href="{{ route('report.reject') }}" class="nav-link">Rejected Report</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{ route('report.search') }}" class="nav-link">Search Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.new') }}" class="nav-link">All Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.stock') }}" class="nav-link">Stock Report</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('report.ready') }}" class="nav-link">Ready Report</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Sale -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#saleMenu">
                            <i class="ri-download-line"></i> Sale <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="saleMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('sale.create') }}" class="nav-link">Add Sale</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sale.index') }}" class="nav-link">Show Sale</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sale.return.index') }}" class="nav-link">Sale Return</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Customer -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#customerMenu">
                            <i class="ri-user-star-line"></i> Customer <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="customerMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('customer.create') }}" class="nav-link">Add Customer</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('customer.index') }}" class="nav-link">Show Customer</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('payment.customer.create') }}" class="nav-link">Add Payment</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('payment.customer.index') }}" class="nav-link">Customer
                                        Payment</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Pre Account -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#accountMenu">
                            <i class="ri-user-star-line"></i> Pre Account <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="accountMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('gst-pdf.index') }}" class="nav-link">GST PDF Invoice</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Bank -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#bankMenu">
                            <i class="ri-bank-line"></i> Bank <i class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="bankMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('banks.create') }}" class="nav-link">Add Bank</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('banks.index') }}" class="nav-link">Show Bank</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Expense -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#expenseMenu">
                            <i class="ri-money-dollar-circle-line"></i> Expense <i
                                class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="expenseMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('expenses.create') }}" class="nav-link">Add Expense</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('expenses.index') }}" class="nav-link">Show Expense</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Sale Product List -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#saleProductMenu">
                            <i class="ri-money-dollar-circle-line"></i> Sale Product List <i
                                class="ri-arrow-down-s-line float-end"></i>
                        </a>
                        <div class="collapse" id="saleProductMenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a href="{{ route('saleproductcategory.create') }}" class="nav-link">Add Sale
                                        Product Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('saleproductcategory.index') }}" class="nav-link">Show Sale
                                        Product Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('saleproductsubcategory.create') }}" class="nav-link">Add Sale
                                        Product Sub Category</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('saleproductsubcategory.index') }}" class="nav-link">Show Sale
                                        Product Sub Categories</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10 col-md-9 col-sm-4 text-white">
                <div class="p-4">
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