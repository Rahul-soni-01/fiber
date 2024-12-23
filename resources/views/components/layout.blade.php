<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="shortcut icon" href="{{asset('storage/favicon.ico') }}">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{asset('Denis/css/style.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('Denis/css/bootstrap.min.css')}}"> --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="js/jquery-3.7.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- plugins:css -->
    {{-- <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" /> --}}
   
</head>

<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div id="header" class="row">
        <div class="col-md-1 header-first d-flex justify-content-center align-items-center"><label id="menu" class="button" for="check"><i
                    class="ri-menu-line"></i></label></div>
        <div class="col-md-2 logo"> <a href="/"><img src="{{asset('storage/logo.jpg') }}" alt=""></a></div>
        <div class="col-md-3 offset-md-6 d-flex align-items-center justify-content-center">
            <strong>{{ auth()->user()->type }}</strong> &nbsp; || &nbsp; <strong>{{ auth()->user()->name }}</strong>
            <a href="{{ route('logout') }}" class="logout-link d-flex flex-column align-items-center p-2"><i
                    class="ml-2 fa-solid fa-user"></i>
                <span class="logout-text">Log out</span>
            </a>
        </div>
            </div>
    {{-- <div id="fakeheader"></div> --}}
    {{-- <input type="checkbox" id="check" checked hidden> --}}
    {{-- {{$permissions}} --}}
    <div class="slidebar" id="slidebar">
        <ul>
            <li id="Home" class="sidebar">
                <a href="{{ route('home') }}"><i class="ri-home-2-line"></i>Home</a>
            </li>

            <li id="Party" class="sidebar">
                <a class="sub-btn" id="sub-btn-add"><i class="ri-user-star-line"></i>Supplier<i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('party.create') }}" id="add" class="sub-item">Add Supplier</a></li>
                    <li><a href="{{ route('party.show') }}" id="view" class="sub-item">Show Supplier</a></li>
                    
                    <li><a href="{{ route('payment.create') }}" id="add" class="sub-item">Add Payment</a></li>
                    <li><a href="{{ route('payment.index') }}" id="view" class="sub-item">Supplier Payment</a></li>
                </ul>
            </li>

            <li id="Department" class="sidebar">
                <a class="sub-btn" id="sub-btn-add"><i class="ri-user-line"></i>Departments<i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('departments.index') }}" id="view" class="sub-item">Show Departments</a></li>
                    <li><a href="{{ route('departments.create') }}" id="add" class="sub-item">Add Departments</a></li>
                </ul>

            </li>
            <li id="Type" class="sidebar">
                <a class="sub-btn" id="sub-btn-add"><i class="ri-user-line"></i>Types<i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('type.index') }}" id="view" class="sub-item">Show Types</a></li>
                    <li><a href="{{ route('type.create') }}" id="add" class="sub-item">Add Types</a></li>
                </ul>
            </li>
            {{-- @if('admin' === auth()->user()->type) --}}

            <li id="Permission" class="sidebar">
                <a class="sub-btn" id="sub-btn-permissions"><i class="ri-lock-2-line"></i>Permissions <i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('user.index') }}" id="view" class="sub-item">Show User</a></li>
                    <li><a href="{{ route('user.create') }}" id="view" class="sub-item">Add User</a></li>
                    <li><a href="{{ route('manage.permissions') }}" id="view" class="sub-item">Show Permission</a></li>
                    {{-- <li><a href="{{ route('manage.permissions') }}" id="add" class="sub-item">Add Permission</a></li> --}}
                    <li><a href="{{ route('manage.permissions.create') }}" id="add" class="sub-item">Add Permission</a></li>
                </ul>
            </li>
            {{-- @endif --}}

            <li id="Category" class="sidebar">
                <a class="sub-btn" id="sub-btn-show"><i class="ri-folder-line"></i>Category <i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('category.create') }}" id="add" class="sub-item">Add Category</a></li>
                    <li><a href="{{ route('category.index') }}" id="view" class="sub-item">Show Category</a></li>
                    {{-- <li><a href="{{ route('category.create') }}" id="add" class="sub-item">Add Sub Category</a>
                    </li> --}}
                    <li><a href="{{ route('subcategory.index') }}" id="view" class="sub-item">Show Sub Category</a></li>
                </ul>
            </li>

            <li id="Inward" class="sidebar">
                <a class="sub-btn" id="sub-btn-show"><i class="ri-download-line"></i>Inward <i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('inward.good.view') }}" id="add" class="sub-item">Add Good Inward</a></li>
                    <li><a href="{{ route('inward.index') }}" id="view" class="sub-item">Show Inward</a></li>
                    <li><a href="{{ route('inward.return.index') }}" id="view" class="sub-item">Show Return Purchase</a>
                    <li><a href="{{ route('inward.payment.index') }}" id="view" class="sub-item">Show Payment</a>
                    </li>
                </ul>
            </li>
            <li id="Report" class="sidebar">
                <a class="sub-btn" id="sub-btn-show"><i class="ri-file-chart-line"></i>Report <i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    @if(auth()->user()->type === 'admin' || auth()->user()->type === 'user' || auth()->user()->type ===
                    'account' || auth()->user()->type === 'cavity' || auth()->user()->type === 'electric' )
                    <li><a href="{{ route('report.index') }}" id="view" class="sub-item">Show Report</a></li>
                    @endif
                    @if(auth()->user()->type === 'admin' || auth()->user()->type === 'electric' || auth()->user()->type
                    === 'godown')
                    <li><a href="{{ route('report.create') }}" id="add" class="sub-item">Add Report</a></li>
                    @endif

                    @if(auth()->user()->type === 'user' )
                    <li><a href="{{ route('report.reject') }}" id="view" class="sub-item">Rejected Report</a></li>
                    @endif
                    <li><a href="{{ route('report.search') }}" id="add" class="sub-item">Search Report</a></li>
                    <li><a href="{{ route('report.new') }}" id="add" class="sub-item">Report New Stock</a></li>
                    <li><a href="{{ route('report.stock') }}" id="add" class="sub-item">stock Report</a></li>
                </ul>
            </li>

            <li id="Sale" class="sidebar">
                <a class="sub-btn" id="sub-btn-show"><i class="ri-download-line"></i>Sale <i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('sale.create') }}" id="add" class="sub-item">Add Sale</a></li>
                    <li><a href="{{ route('sale.index') }}" id="view" class="sub-item">Show Sale</a></li>
                    <li><a href="{{ route('sale.return.index') }}" id="view" class="sub-item">Sale Return</a></li>
                </ul>
            </li>
           
            <li id="Customer" class="sidebar">
                <a class="sub-btn" id="sub-btn-add"><i class="ri-user-star-line"></i>Customer<i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('customer.create') }}" id="add" class="sub-item">Add Customer</a></li>
                    <li><a href="{{ route('customer.index') }}" id="view" class="sub-item">Show Customer</a></li>

                    
                    <li><a href="{{ route('payment.customer.create') }}" id="add" class="sub-item">Add Payment</a></li>
                    {{-- <li><a href="{{ route('payment.index') }}" id="view" class="sub-item">Supplier Payment</a></li> --}}
                    <li><a href="{{ route('payment.customer.index') }}" id="view" class="sub-item">Customer Payment</a></li>
                </ul>
            </li>

            <li id="Account" class="sidebar">
                <a class="sub-btn" id="sub-btn-add"><i class="ri-user-star-line"></i>Pre Account <i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('acccoa.create') }}" id="add" class="sub-item">Add Account</a></li>
                    <li><a href="{{ route('acccoa.index') }}" id="view" class="sub-item">Chart of Accounts </a></li>
                    <li><a href="{{ route('predefine.index') }}" id="view" class="sub-item">Predefine of Accounts </a></li>
                </ul>
            </li>
            <li id="Bank" class="sidebar">
                <a class="sub-btn" id="sub-btn-add"><i class="ri-bank-line"></i>Bank <i
                        class="ri-arrow-down-s-line"></i></a>
                <ul class="sub-menu">
                    <li><a href="{{ route('banks.create') }}" id="add" class="sub-item">Add Bank</a></li>
                    <li><a href="{{ route('banks.index') }}" id="view" class="sub-item"> Show Bank </a></li>
                </ul>
            </li>

            <li id="Expense" class="sidebar">
                <a class="sub-btn" id="sub-btn-expense">
                    <i class="ri-money-dollar-circle-line"></i> Expense
                    <i class="ri-arrow-down-s-line"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{ route('expenses.create') }}" id="add" class="sub-item">Add Expense</a></li>
                    <li><a href="{{ route('expenses.index') }}" id="view" class="sub-item">Show Expense</a></li>
                </ul>
            </li>

            <li id="Sale Product List" class="sidebar">
                <a class="sub-btn" id="sub-btn">
                    <i class="ri-money-dollar-circle-line"></i> Sale Product List
                    <i class="ri-arrow-down-s-line"></i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('saleproductcategory.create') }}" id="add" class="sub-item">Add Sale Product Category</a>
                    </li>
                    <li>
                        <a href="{{ route('saleproductcategory.index') }}" id="view" class="sub-item">Show Sale Product Categories</a>
                    </li>
                    <li>
                        <a href="{{ route('saleproductsubcategory.create') }}" id="add" class="sub-item">Add Sale Product Sub Category</a>
                    </li>
                    <li>
                        <a href="{{ route('saleproductsubcategory.index') }}" id="view" class="sub-item">Show Sale Product Sub Categories</a>
                    </li>
                </ul>
                
            </li>
            
        </ul>

    </div>
    <div class="special-main" id="special-main">
        <h3>{{$title}}</h3>
        <hr style="border:0.5px solid lightgray;">
        {{$main}}
    </div>

    <!-- <div class="footer" id="footer">
        <h1>Footer Page</h1>
    </div> -->

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).ready(function () {
            // $('.table').DataTable();
                $('.table').not('.datatable-remove').DataTable({
                    pageLength: 25 
                });
                
            });

            const menuButton = document.getElementById('menu');
            const sidebar = document.getElementById('slidebar');
            const mainContent = document.getElementById('special-main');

            menuButton.addEventListener('click', () => {
                // Toggle sidebar visibility
                if (sidebar.style.display === 'none') {
                    sidebar.style.display = 'block';
                    mainContent.style.marginLeft = '15%';
                    mainContent.style.width = '85%';
                } else {
                    sidebar.style.display = 'none';
                    mainContent.style.width = '100%';
                    mainContent.style.marginLeft = '0';
                }
            });

            $(".sub-btn").on("click", function (e) {
                $(this).next('.sub-menu').slideToggle();
            });

            $('.toggle-icon').click(function() {
                $(this).closest('.form-check').next('.category-list').toggle(); // Toggle the next .category-list
            });

            $('.select2').select2({
                maximumInputLength: 20,
                placeholder: "Select an option",
                allowClear: true
            });
        });

        var count = 1;
        function BtnAdd(categories, subCategories) {
            if (window.location.pathname == '/sale-create') {
            $('#TBody').append(`        
                <div class="row custom-row g-2 align-items-center" id="row_${count}" style="margin-top:10px;">
                        <div class="col custom-col">
                            <select id="data[${count}][cname]" name=cname[]" class="form-control" onchange="filterOptions(event)">
                                <option value="" disabled selected class="0" >Choose a Category</option>
                            </select>
                        </div>
                        <div class="col custom-col">
                            <select id="data[${count}][scname]" name="scname[]" class="form-control" onchange="filterOptions(event)">
                                <option value="" disabled selected class="0" data-unit="">Choose a Sub Category</option>
                            </select>
                        </div>
                        <div class="col custom-col">
                            <select id="data[${count}][unit]" name="unit[]"
                                class="form-control">
                                <option value="" disabled>Select</option>
                                <option value="Pic">Pic</option>
                                <option value="Mtr">Mtr</option>
                            </select>
                        </div>
                        <div class="col custom-col" id="sr_no_div_${count}" style="display:none;">
                            <select id="data[${count}][sr_no]" name="sr_no[]"
                                class="form-control select2">
                                <option value="" disabled>Select Sr No</option>
                            </select>
                        </div>
                        <div class="col custom-col" id="col_div_${count}">
                            <input type="text" name="sr_no[]" class="form-control" id="sr_no_${count}" >
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][qty]" name="qty[]" placeholder="Quantity"
                                class="form-control" onchange="total()">
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][rate]" name="rate[]" placeholder="Rate"
                                class="form-control" onchange="total()">
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][p_tax]" value="0" name="p_tax[]" step="0.01" placeholder="Tax"class="form-control" onchange="total()">
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][tax]" step="0.01" name="tax[]"
                                class="form-control" disabled>
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][total]" name="total[]" placeholder="Total"
                            step="0.01" class="form-control">
                        </div>
                        <div class="col custom-col">
                            <button type="button" class="btn btn-grey" onclick="BtnDel(this)">Delete</button>
                        </div>
                    </div>
             `);

             if (categories && Array.isArray(categories)) {
                    categories.forEach(category => {
                        $(`#data\\[${count}\\]\\[cname\\]`).append(`
                        <option value="${category.id}">${category.name}</option>`);
                    });
                }
                
                // Append subcategories
                if (subCategories && Array.isArray(subCategories)) {
                    subCategories.forEach(subCategory => {
                        $(`#data\\[${count}\\]\\[scname\\]`).append(`<option value="${subCategory.id}" class="${subCategory.spcid}" data-unit="${subCategory.unit}" data-sr_no="${subCategory.sr_no}"  data-value="${subCategory.name}" >${subCategory.name}</option>`);
                    });
                }
            }
            else{
                $('#TBody').append(`
                    <div class="row custom-row g-2 align-items-center" id="row_${count}" style="margin-top:10px;">
                        <div class="col custom-col">
                            <select id="data[${count}][cname]" name=cname[]" class="form-control" onchange="filterOptions(event)">
                                <option value="" disabled selected class="0" >Choose a Category</option>
                            </select>
                        </div>
                        <div class="col custom-col">
                            <select id="data[${count}][scname]" name="scname[]" class="form-control" onchange="filterOptions(event)">
                                <option value="" disabled selected class="0" data-unit="">Choose a Sub Category</option>
                            </select>
                        </div>
                        <div class="col custom-col">
                            <select id="data[${count}][unit]" name="unit[]"
                                class="form-control">
                                <option value="">Select</option>
                                <option value="Pic">Pic</option>
                                <option value="Mtr">Mtr</option>
                            </select>
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][qty]" name="qty[]" placeholder="Quantity"
                                class="form-control" onchange="total()">
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][rate]" name="rate[]" placeholder="Rate"
                                class="form-control" onchange="total()">
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][p_tax]" value="0" name="p_tax[]" step="0.01" placeholder="Tax"class="form-control" onchange="total()">
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][tax]" step="0.01" name="tax[]"
                                class="form-control" disabled>
                        </div>
                        <div class="col custom-col">
                            <input type="number" id="data[${count}][total]" name="total[]" placeholder="Total"
                            step="0.01" class="form-control">
                        </div>
                        <div class="col custom-col">
                            <button type="button" class="btn btn-grey" onclick="BtnDel(this)">Delete</button>
                        </div>
                    </div>
                `);
                
                // Append categories
                if (categories && Array.isArray(categories)) {
                    categories.forEach(category => {
                        $(`#data\\[${count}\\]\\[cname\\]`).append(`
                        <option value="${category.id}">${category.category_name}</option>`);
                    });
                }
                
                // Append subcategories
                if (subCategories && Array.isArray(subCategories)) {
                    subCategories.forEach(subCategory => {
                        $(`#data\\[${count}\\]\\[scname\\]`).append(`<option value="${subCategory.id}" class="${subCategory.cid}" data-unit="${subCategory.unit}" >${subCategory.sub_category_name}</option>`);
                    });
                }
            }

            count++;
        }
        countserial_no = 0;
        function SaleRowadd(serial_nos){
            countserial_no++;
            let rowHtml = `
                        <div class="row custom-row mt-2 g-2 align-items-center">
                            <div class="col">
                                <select required id="serial_no" class="form-control select2" name="serial_no[]" onchange="serial_no_append(${countserial_no},event)">
                                    <option value="" disabled selected>Select</option>`;

                            serial_nos.forEach(serial_no => {
                                rowHtml += `<option value="${serial_no.sr_no_fiber}">${serial_no.sr_no_fiber}</option>`;
                            });
            rowHtml += `</select> </div> <div class="col"> </div>
                    <div class="col">
                        <button type="button" onclick="SaleremoveRow(this)" class="btn btn-danger margin-btn">Delete</button>
                    </div>
                </div>
            `;
            $('#row-container').append(rowHtml);
            // SaleFinalAmount();
            $('.select2').select2();
        }

        function SaleremoveRow(button) {
            $(button).closest('.custom-row').remove();
            SaleFinalAmount();
        }

        function serial_no_append(countserial_no,event){
            const serialNoDropdown = event.target;
            const selectedId = serialNoDropdown.value;            
            const spanElements = document.querySelectorAll(`.cstmspan_${countserial_no}`);
            // console.log(spanElements,selectedId);

            spanElements.forEach(span => {
                if (span.id == selectedId) {
                    span.style.display = 'block';
                } else {
                    span.style.display = 'none'; 
                }
            });
            SaleFinalAmount();
        }

        function SaleFinalAmount(){
            let final_amount = 0;
            const spanElements = document.querySelectorAll(`.final_amount`);
        
            spanElements.forEach(span => {
                if (span.style.display === 'block') {
                    final_amount += parseFloat(span.textContent) || 0; 
                }
            });

            const finalPriceInput = document.getElementById('final_price');
            if (finalPriceInput) {
                finalPriceInput.value = final_amount.toFixed(2);
            }
        }

        function BtnDel(button) {
            $(button).closest('.custom-row').remove();
            // count--;
            total();
        }


        function total() {
            for (var i = 0; i < count; i++) {
                var qtyElement = document.getElementById(`data[${i}][qty]`);
                if (qtyElement) {
                    var qty = parseFloat(qtyElement.value) || 0;
                    var rate = parseFloat(document.getElementById(`data[${i}][rate]`).value) || 0;
                    var p_tax = parseFloat(document.getElementById(`data[${i}][p_tax]`).value) || 0;
                    // console.log(i, 'qty:', qty, 'rate:', rate, 'p_tax:', p_tax);
                    var amount_d = parseFloat(document.getElementById(`amount_d`).value) || 0;

                    var total = qty * rate;
                    var taxAmount = (total * p_tax) / 100;
                    total += taxAmount;

                    document.getElementById(`data[${i}][tax]`).value = taxAmount.toFixed(2);
                    document.getElementById(`data[${i}][total]`).value = total.toFixed(2);
                }
            }
            sub_total();
            // calculateshipping();
        }

        function rate() {
            var amount1 = parseFloat(document.getElementById(`amount_d`).value) || 0;
            var rate1 = parseFloat(document.getElementById(`rate_r`).value) || 0;

            var amount = amount1 * rate1;

            document.getElementById(`sub_total`).value = amount.toFixed(2);
            document.getElementById(`amount_r`).value = amount.toFixed(2);
            document.getElementById(`amount`).value = amount.toFixed(2);
            sub_total();
        }

        function calculateshipping() {
            var amount = parseFloat(document.getElementById(`amount_r`).value) || 0;
            var shipping_cost = parseFloat(document.getElementById(`shipping_cost`).value) || 0;
            var round_total = parseFloat(document.getElementById(`round_total`).value) || 0;

            var total = shipping_cost + amount;
            
            document.getElementById(`sub_total`).value = total.toFixed(2);
            var aftertotal = total - round_total;

            document.getElementById(`amount`).value = aftertotal.toFixed(2);

        }

        function sub_total() {
            var subtotal = 0;
            for (var i = 0; i < count; i++) {
                var totalElement = document.getElementById(`data[${i}][total]`);
                if (totalElement) {
                    var total = parseFloat(document.getElementById(`data[${i}][total]`).value) || 0;
                    subtotal += total;
                }
            }
            document.getElementById("amount_d").value = subtotal.toFixed(2);
            // var rate_r = document.getElementById(`rate_r`).value;
            var rate_r = parseFloat(document.getElementById(`rate_r`).value) || 0;
            if (isNaN(rate_r) || isNaN(subtotal)) {
                console.error("Invalid input: rate_r or subtotal is not a number.");
            } else {
                let rate = rate_r * subtotal;
                // console.log("Rate:", rate);

                document.getElementById("amount_r").value = rate.toFixed(2);
                document.getElementById("sub_total").value = rate.toFixed(2);
            }
            
            calculateAmount();
        }

        function calculateAmount() {
            var subtotal = parseFloat(document.getElementById("sub_total").value) || 0;
            var roundAmount = parseFloat(document.getElementById("round_total").value) || 0;
            var amount = subtotal - roundAmount;
            document.getElementById("amount").value = amount.toFixed(2);
            
           /* var paid_total = parseFloat(document.getElementById("paid_total").value) || 0;
            if (paid_total > 0 && amount >= paid_total) {
                var remaining_amount = amount - paid_total;
                // console.log(amount,paid_total,remaining_amount);
                if(remaining_amount > 0 || remaining_amount == 0){
                    document.getElementById("remaining_amount").value = remaining_amount.toFixed(2);
                }else{
                    alert("!! You Can't Paid More Amount, Please Change your Paid Amount !!");
                    // document.getElementById("paid_total").value = 0.toFixed(2);
                }
            }*/
            calculateshipping();
        }

        var row = 1;
        function AddRow(subcategories) {
            $('#TBody').append(`
                <tr>
                    <td class="d-flex">
                        <h5>LED  </h5>
                            <select required onchange="tbl_stock(${row});" id="subcategory_${row}"  name="sub_category[]" class="tbl_sub ml-2 form-control">
                                    <option value="" disabled selected>Select</option>
                                </select>
                      
                    </td>
                    <td>
                        <input type="text" name="srled[]" list="srled_${row}" class="form-control" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                        <datalist id="srled_${row}">
                            <option value=""></option>
                        </datalist>
                    </td>
                    <td><input type="text" id="ampled_${row}" name="ampled[]" class="form-control"  placeholder="Enter AMP"></td>
                    <td><input type="text" id="voltled_${row}" name="voltled[]" class="form-control" placeholder="Enter VOLY"> </td>
                    <td class="d-flex"><input type="text" id="wattled_${row}" name="wattled[]" class="form-control" placeholder="Enter WATT" >
                        <button type="button" onclick="removeRow(this)" class="btn btn-danger margin-btn" id="${row}">Delete</i></button>
                    </td>
                </tr>
            `);
            if (subcategories && Array.isArray(subcategories)) {
                subcategories.forEach(sub_category => {
                    $(`#subcategory_${row}`).append(`<option value="${sub_category.id}">${sub_category.sub_category_name}</option>`);
                });
            }
            row++;
        }

        function removeRow(buttonId){
            $(buttonId).closest('tr').remove();
        }

        function NewremoveRow(buttonId){
            $(buttonId).closest('.align-items-center').remove();
        }

        function updateHiddenInput(checkbox) {
            console.log(checkbox);
            if (checkbox.checked) {
                checkbox.previousElementSibling.value = "1";
            } else {
                checkbox.previousElementSibling.value = "0";
            }
        }

        function syncHiddenInput(checkbox, rowId) {
            const hiddenInput = document.querySelector(`.hidden-dead-${rowId}`);
            if (checkbox.checked) {
                hiddenInput.disabled = true; // Disable the hidden input if the checkbox is checked
            } else {
                hiddenInput.disabled = false; // Enable the hidden input if the checkbox is unchecked
            }
        }

        function tbl_stock(row_id){
            // alert(row_id);
            var subcategory_id = document.getElementById(`subcategory_${row_id}`).value;

            var subcategoryElement = document.getElementById(`subcategory_${row_id}`);
            var Tdhtml = document.getElementById(`col_${row_id}`);
            if (Tdhtml && Tdhtml.innerHTML.trim() !== '') {
                Tdhtml.innerHTML= '';
            }

            var selectedOption = subcategoryElement.options[subcategoryElement.selectedIndex];

            if (selectedOption && selectedOption.dataset.unit) {
                var Datasr_no = selectedOption.dataset.sr_no;
              if(Datasr_no === "0"){
                Tdhtml.innerHTML += `
                
                </div> <!-- End previous col div -->
                <div class="row mt-1" id="row_${row_id}">
                    <input type="hidden" name="sr_no_or_not[]" value="0">
                    <div class="col-12 col-md-4">
                        <input type="text" name="srled[]" list="srled_${row_id}" class="form-control" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                        <datalist id="srled_${row_id}">
                            <option value=""></option>
                        </datalist>
                    </div>
                    <div class="col-12 col-md-2">                     
                        <input type="hidden" name="dead[]" value="0" class="hidden-dead-${row_id}">
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="hidden" id="ampled_${row_id}" name="ampled[]" value="">

                        <input type="hidden" id="voltled_${row_id}" name="voltled[]" value="">

                        <input type="hidden" id="wattled_${row_id}" name="wattled[]" value="">
                    </div>
                    <div class="col-12 col-md-2">
                            <input type="checkbox" name="dead[]" value="1" class="m-2" onchange="syncHiddenInput(this, ${row_id})">

                        <lable class="m-2">Dead</lable>
                    </div>
                    <div class="col-12 col-md-2 text-right">
                        <button type="button" onclick="NewremoveRow(this)" class="btn btn-danger margin-btn" id="${row_id}">Delete</button>
                    </div>
                </div>`;
              }
              else if(Datasr_no === "1"){
                    Tdhtml.innerHTML += `
                        </div> <!-- End previous col div -->
                        <div class="row" id="row_${row_id}">
                            <input type="hidden" name="sr_no_or_not[]" value="1">
                            <div class="col-12 col-md-3">
                                <input type="text" name="srled[]" list="srled_${row_id}" class="form-control" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                                <datalist id="srled_${row_id}">
                                    <option value=""></option>
                                </datalist>
                            </div>

                            <div class="col-12 col-md-2">
                                <input type="text" id="ampled_${row_id}" name="ampled[]" class="form-control" placeholder="Enter AMP">
                            </div>

                            <div class="col-12 col-md-2">
                                <input type="text" id="voltled_${row_id}" name="voltled[]" class="form-control" placeholder="Enter VOLT">
                            </div>
                            <input type="hidden" name="dead[]" value="0" class="hidden-dead-${row_id}">

                            <div class="col-12 col-md-5 d-flex justify-content-between">
                                
                                <input type="text" id="wattled_${row_id}" name="wattled[]" class="form-control" placeholder="Enter WATT">
                            
                                <input type="checkbox" name="dead[]" value="1" class="m-2" onchange="syncHiddenInput(this, ${row_id})">
                                
                                <lable class="m-2">Dead</lable>
                                <button type="button" onclick="NewremoveRow(this)" class="btn btn-danger margin-btn" id="${row_id}">Delete</button>
                            </div>
                        </div>
                    `;
                } 
               
            }
            
            if (!subcategory_id) {
                console.error(`Element with ID subcategory_${row_id} not found!`);
                return; 
            }
            
            if(!row_id){
                console.error(`Element with ID subcategory_${row_id} not found!`);
                return; 
            }
           
            csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajax({
                type: "POST",
                url: "/check_stock",
                data: {
                    _token: csrfToken,
                    subcategory_id: subcategory_id,
                },
                success: function (response) {
                    var data = response.data;
                    var srled = document.getElementById(`srled_${row_id}`);
                    // console.log(srled);
                    
                    // var inputField = document.querySelector(`input[list="srled_${row_id}"]`);
                    // console.log(inputField);
                    // inputField.removeAttribute('value');
                    // if (inputField) {
                        // inputField.value = '';
                    // }

                    srled.innerHTML = '<option value="" selected disable>Select</option>';
                    
                    data.forEach(function(item) {
                        var option = document.createElement("option");
                        option.value = item.serial_no;
                        option.text = item.serial_no;
                        srled.appendChild(option);
                    });
                    // console.log(srled);
                }
            });
        }

        function tbl_card (row_id){
            var card_id = document.getElementById(`card_${row_id}`).value;
            if (!card_id) {
                console.error(`Element with ID subcategory_${row_id} not found!`);
                return; 
            }
            
            csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajax({
                type: "POST",
                url: "/check_stock",
                data: {
                    _token: csrfToken,
                    subcategory_id: card_id,
                },
                success: function (response) {
                    var data = response.data;
                    var srled = document.getElementById(`srcard_${row_id}`);

                    var inputField = document.querySelector(`input[list="srcard_${row_id}"]`);
                    inputField.removeAttribute('value');
                    console.log(inputField);
                    /*const element12 = document.querySelector(`.sr_card_${row_id}`);

                    document.querySelector(`.sr_card_${row_id}`).textContent = ""; 
                    document.querySelector(`.sr_card_${row_id}`).innerHTML = "";   

                    if (element12) {
                        element12.value = ""; // Clear the value
                    } else {
                        console.error(`Element with class 'srled_${row_id}' not found.`);
                    }*/

                    srled.innerHTML = '<option value="">Select</option>';
                    
                    data.forEach(function(item) {
                        var option = document.createElement("option");
                        option.value = item.serial_no;
                        option.text = item.serial_no;
                        srled.appendChild(option);
                    });
                }
            });
        }

        function Add_Cards(cards){
            $('#TCards').append(`
                <tr>
                    <td class="d-flex">
                        <h5>CARD</h5>
                        <select required onchange="tbl_card(${row});" id="card_${row}" class="tbl_sub ml-2 form-control" name="card[]">
                            <option value="" disabled selected>Select</option>
                            
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="sr_card[]" list="srcard_${row}" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                        <datalist id="srcard_${row}">
                            <!-- options can be dynamically inserted here if needed -->
                        </datalist>
                    </td>
                    <td><input type="text" id="ampled_${row}" name="sr_cardamp[]" class="form-control" placeholder="Enter AMP"></td>
                    <td><input type="text" id="voltled_${row}" name="sr_cardvolt[]" class="form-control" placeholder="Enter VOLT"></td>
                    <td class="d-flex">
                        <input type="text" id="wattled_${row}" name="sr_cardwatt[]" class="form-control" placeholder="Enter WATT">
                        <button type="button" onclick="removeRow(this)" class="btn btn-danger margin-btn" id="${row}">Delete</button>
                    </td>
                </tr>
            `);
            if (cards && Array.isArray(cards)) {
                cards.forEach(card => {
                    $(`#card_${row}`).append(`<option value="${card.id}">${card.sub_category_name}</option>`);
                });
            }
            row++;
        }

        function BtnReturnAdd(categories, subCategories) {

            $('#TBody').append(`
                <div class="row custom-row g-2 align-items-center" id="row_${count}" style="margin-top:10px;">
                    <div class="col custom-col">
                        <select id="data[${count}][cname]" name=cname[]" class="form-control" onchange="filterOptions(event)">
                            <option value="" disabled selected class="0" >Choose a Category</option>
                        </select>
                    </div>
                    <div class="col custom-col">
                        <select id="data[${count}][scname]" name="scname[]" class="form-control" onchange="filterOptions(event)">
                            <option value="" disabled selected class="0" data-unit="">Choose a Sub Category</option>
                        </select>
                    </div>
                    <div class="col custom-col">
                        <select id="data[${count}][unit]" name="unit[]"
                            class="form-control">
                            <option value="">Select</option>
                            <option value="Pic">Pic</option>
                            <option value="Mtr">Mtr</option>
                        </select>
                    </div>
                    <div class="col custom-col">
                        <input type="number" id="data[${count}][qty]" name="qty[]" placeholder="Quantity"
                            class="form-control" onchange="total()">
                    </div>
                    <div class="col custom-col">
                        <input type="number" id="data[${count}][rate]" name="rate[]" placeholder="Rate"
                            class="form-control" onchange="total()">
                    </div>
                  
                    <div class="col custom-col">
                        <button type="button" class="btn btn-grey" onclick="BtnReturnDel(this)">Delete</button>
                    </div>
                </div>
            `);

            // Append categories
            if (categories && Array.isArray(categories)) {
                categories.forEach(category => {
                    $(`#data\\[${count}\\]\\[cname\\]`).append(`
                <option value="${category.id}">${category.category_name}</option>`);
                });
            }

            // Append subcategories
            if (subCategories && Array.isArray(subCategories)) {
                subCategories.forEach(subCategory => {
                    $(`#data\\[${count}\\]\\[scname\\]`).append(`<option value="${subCategory.id}" class="${subCategory.cid}" data-unit="${subCategory.unit}" >${subCategory.sub_category_name}</option>`);
                });
            }

            count++;
        }

        function BtnReturnDel(button){
            $(button).closest('.custom-row').remove();
        }

        function NewReportCreateRow(subcategories){
            $('#TBody').append(`
              <div class="row mb-3 align-items-center" id="row_${row}">
                    <!-- Select Dropdown -->
                    <div class="col-12 col-md-2 d-flex">
                        <select required onchange="tbl_stock(${row});" id="subcategory_${row}" name="sub_category[]" class="tbl_sub ml-2 form-control">
                            <option value="" selected disabled>Select</option>
                        </select>
                    </div>
                    
                    <!-- Dynamic Content -->
                    <div class="col-12 col-md-10" id="col_${row}"></div>
                </div>
            `);
            if (subcategories && Array.isArray(subcategories)) {
                subcategories.forEach(sub_category => {
                    $(`#subcategory_${row}`).append(`<option value="${sub_category.id}" data-unit="${sub_category.unit}" data-sr_no="${sub_category.sr_no}">${sub_category.category.category_name} - ${sub_category.sub_category_name}</option>`);
                });
            }
            row++;
        }
        
        // <td class="d-flex"><input type="text" id="wattled_${row}" name="wattled[]" class="form-control" placeholder="Enter WATT" >
        //                 <button type="button" onclick="removeRow(this)" class="btn btn-danger margin-btn" id="${row}">Delete</i></button>
        //             </td>
    </script>
</body>

</html>