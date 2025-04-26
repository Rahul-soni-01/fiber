document.addEventListener('DOMContentLoaded', function () {

    function change_purchase() {
        var invoice_no = document.getElementById("invoice_no").value;
        if (invoice_no) {
            ajax(invoice_no, 'change_purchase');
        }

    }

    function change_category() {
        var category_id = document.getElementById("category").value;
        if (category_id) {
            ajax(category_id, 'change_category');
        }
    }

    function change_subcategory() {
        var subcategory_id = document.getElementById("subcategory").value;
        if (subcategory_id) {
            ajax(subcategory_id, 'change_subcategory');
        }
    }

    function ajax($id, caller) {
        $('#Category option').css('display', 'block');
        $('#SubCategory option').css('display', 'block');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        var data = {
            _token: csrfToken
        };
        if (caller === 'change_purchase') {
            data.invoice_no = $id;
        } else if (caller === 'change_category') {
            data.category_id = $id;
            data.invoice_no = document.getElementById("invoice_no").value;
        }
        else if (caller === 'change_subcategory') {
            data.subcategory_id = $id;
            data.category_id = document.getElementById("category").value;
            data.invoice_no = document.getElementById("invoice_no").value;
        }
        $.ajax({
            url: "/get-invoice-details",
            type: "POST",
            data: data,
            success: function (response) {
                // Handle success response
                if (response.status === 'success') {
                    var data = response.data;
                    if (data.length > 0) {
                        var categoryId = response.category_id;
                        var subcategory_id = response.subcategory_id;

                        if (!categoryId && !subcategory_id) {
                            $('#category option').css('display', 'none');
                            Object.entries(data).forEach(function ([key, value]) {
                                if (value.cid) { // Check if cid exists
                                    // console.log('value' + value);
                                    $('#category option').each(function () {
                                        var optionClass = $(this).attr('class');
                                        if (optionClass === value.cid) {
                                            $(this).css('display', 'block');
                                        }
                                    });
                                }
                            });
                        }
                        if (categoryId) {
                            $('#subcategory option').css('display', 'none');
                            Object.entries(data).forEach(function ([key, value]) {
                                if (value.scid) {
                                    $('#subcategory option').each(function () {
                                        var optionClass_subcategory = $(this).attr('class');
                                        if (optionClass_subcategory === value.scid) {
                                            $(this).css('display', 'block');
                                        }
                                    });
                                }
                            });
                            /*$('#category option').each(function() {
                                $(this).css('display', 'block');
                            });*/
                        }
                        if (subcategory_id) {
                            Object.entries(data).forEach(function ([key, value]) {
                                document.getElementById('qty').value = value.qty;
                                finalprice = value.price * value.qty;
                                document.getElementById('price').value = finalprice;
                                document.getElementById('unit').value = value.sub_category.unit;
                                $('.append_fields').html('');
                                if (value.sub_category.sr_no === 1) {
                                    append_fields();
                                }
                            });
                        }
                    }
                } else {
                    $('#invoice-details').html('<p>Error retrieving invoice details</p>');
                }
            },
            error: function (xhr, status, error) {
                // Handle error
                $('#invoice-details').html('<p>An error occurred. Please try again.</p>');
            }
        });
    }

    function append_fields() {
        var qty = document.getElementById("qty").value;
        for (var i = 0; i < qty; i++) {
            $('.append_fields').append('<div class="col-sm-1">' + (i + 1) + '</div> <div class="col-sm-11 mt-2"> <input type="text" class="form-control" required name="serial_no[]" placeholder="Enter SR No." id="sr_' + i + '" /></div>');
        }
    }


    function checkQueryParams() {
        if (window.location.pathname === '/add_sr_no') {
            urlParams = new URLSearchParams(window.location.search);
            invoiceNo = urlParams.get('invoice_no');
            category = urlParams.get('category');
            subcategory = urlParams.get('subcategory');
            qty = urlParams.get('qty');
            price = urlParams.get('price');
            unit = urlParams.get('unit');
            if (invoiceNo && category && subcategory && qty && price) {
                var sr_no = document.getElementById('sr_no').value;  // Correct 'sr_no'
                document.getElementById('qty').value = qty;
                document.getElementById('price').value = qty * price;
                $('.append_fields').html('');
                if (sr_no === '1') {
                    append_fields();
                }
            }
        }
    }

    function check_permission() {
        csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.ajax({
            type: "POST",
            url: "/check_permission",
            data: {
                _token: csrfToken,
                id: 1,
            },
            success: function (response) {
                data = response.permissions;
                type = response.type;
                if (type !== 'admin') {
                    // $('ul.nav.flex-column').css('display', 'none');
                    $('#sidebar .nav-item').css('display', 'none');
                    Object.entries(data).forEach(function ([key, value]) {
                        var menuItems = $('.nav-item');
                        // console.log(menuItems);
                        menuItems.each(function () {
                            var itemId = $(this).attr('id');
                            if (key === itemId) {
                                $(this).css('display', 'block');
                                value.forEach(function (permission) {
                                    var submenu = $('.nav-sub-item');
                                    submenu.each(function () {
                                        var permission_id = $(this).attr('id');
                                        if (value.includes(permission_id) || permission === permission_id) {
                                            $(this).css('display', 'block');
                                        } else {
                                            $(this).css('display', 'none');
                                        }
                                    });
                                });
                            } else if (itemId === 'Home') {
                                $(this).css('display', 'block');
                            }
                        });
                    });
                } else {
                    // console.log("798");
                }
            }
        });
    }

    window.onload = checkQueryParams(), check_permission();

    // this is for only purchase rerun create time
    const currentPath = window.location.pathname;
    const targetPath = "/inward-return-create";

    if (currentPath === targetPath) {
        document.getElementById('AddReturnRow').addEventListener('click', function () {
            if (!invoiceResponse || !invoiceResponse.inwardsItems) {
                Swal.fire({
                    icon: "error",
                    title: "No Items Available",
                    text: "Please fetch invoice details first.",
                });
                return;
            }

            // Create a new row element
            const returnRow = document.createElement('div');
            returnRow.classList.add('row', 'return-item', 'mt-2');

            returnRow.innerHTML = `
            <div class="col">
             <input type="hidden" class="form-control" name="pid" value="${invoiceResponse.data[0].pid}" placeholder="Qty" min="1">
             <input type="hidden" class="form-control" name="invoice_no" value="${invoiceResponse.inwardsItems[0].invoice_no}" placeholder="Qty" min="1">
                <select class="form-control return-item-select" name="purchaseitems[]">
                    <option value="" disabled selected>Select Item</option>
                    ${invoiceResponse.inwardsItems.map(item =>
                `<option value="${item.id}" 
                            data-category="${item.category.category_name}" 
                            data-subcategory="${item.sub_category.sub_category_name}" 
                            data-unit="${item.unit}" 
                            data-price="${item.price}">
                            ${item.category.category_name} - ${item.sub_category.sub_category_name}
                        </option>`).join('')}
                </select>
            </div>
            <div class="col">
                <input type="number" class="form-control return-qty" name="qty[]" placeholder="Qty" min="1">
            </div>
            <div class="col">
                <textarea class="form-control return-reason" name="reason[]"placeholder="Reason"></textarea>
            </div>
            <div class="col">
                <button type="button" class="btn btn-danger remove-return-row">Remove</button>
            </div>
        `;

            // Append the new row to the container
            document.getElementById('ReturnItems').appendChild(returnRow);

            // Attach event listener to the "Remove" button of the new row
            returnRow.querySelector('.remove-return-row').addEventListener('click', function () {
                returnRow.remove();
            });
        });
    }
    else if (currentPath == "/sale-return") {
        document.getElementById('AddReturnRow').addEventListener('click', function () {
            if (!invoiceResponse || !invoiceResponse.inwardsItems) {
                Swal.fire({
                    icon: "error",
                    title: "No Items Available",
                    text: "Please fetch invoice details first.",
                });
                return;
            }

            // Create a new row element
            const returnRow = document.createElement('div');
            returnRow.classList.add('row', 'return-item', 'mt-2');

            returnRow.innerHTML = `
            <div class="col">
             <input type="hidden" class="form-control" name="customer_id" value="${invoiceResponse.data[0].customer_id}">
             <input type="hidden" class="form-control" name="sale_id" value="${invoiceResponse.inwardsItems[0].sale_id}">
                <select class="form-control return-item-select" name="saleitems[]">
                    <option value="" disabled selected>Select Item</option>
                    ${invoiceResponse.inwardsItems.map(item =>
                `<option value="${item.id}" 
                            data-category="${item.category.name}" 
                            data-subcategory="${item.sub_category.name}" 
                            data-unit="${item.unit}" 
                            data-price="${item.rate}">
                            ${item.category.name} - ${item.sub_category.name} - ${item.sr_no}
                        </option>`).join('')}
                </select>
            </div>
            <div class="col">
                <input type="number" class="form-control return-qty" name="qty[]" placeholder="Qty" min="1">
            </div>
            <div class="col">
                <textarea class="form-control return-reason" name="reason[]"placeholder="Reason"></textarea>
            </div>
            <div class="col">
                <button type="button" class="btn btn-danger remove-return-row">Remove</button>
            </div>
        `;

            // Append the new row to the container
            document.getElementById('ReturnItems').appendChild(returnRow);

            // Attach event listener to the "Remove" button of the new row
            returnRow.querySelector('.remove-return-row').addEventListener('click', function () {
                returnRow.remove();
            });
        });
    }

    /*document.getElementById('submit-button').addEventListener('click', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to submit this report?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('report-form').submit();
            }
        });
    });*/
    expenseestoggleBankDetails();

    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('maincontent');

    // Check if elements exist
    if (!sidebar || !mainContent) {
        console.error('Sidebar or maincontent element not found!');
        return;
    }

    // Add event listeners for Bootstrap's collapse events
    sidebar.addEventListener('hidden.bs.collapse', function (event) {
        // Check if the event target is the main sidebar
        if (event.target === sidebar) {
            // console.log('Sidebar is now hidden');
            mainContent.classList.remove('col-lg-10', 'col-md-9', 'col-sm-12');
            mainContent.classList.add('col-lg-12', 'col-md-12', 'col-sm-12');
        }
    });

    sidebar.addEventListener('shown.bs.collapse', function (event) {
        // Check if the event target is the main sidebar
        if (event.target === sidebar) {
            // console.log('Sidebar is now visible');
            mainContent.classList.remove('col-lg-12', 'col-md-12', 'col-sm-12');
            mainContent.classList.add('col-lg-10', 'col-md-9', 'col-sm-12');
        }
    });
    const readonlyFields = document.querySelectorAll('.readonly-field');

    readonlyFields.forEach(field => {
        field.addEventListener('click', function(e) {
            e.preventDefault();
            showToast('You cannot change this field');
        });
        
        field.addEventListener('keydown', function(e) {
            e.preventDefault();
            showToast('You cannot change this field');
        });
    });

    function showToast(message) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'warning',
            title: message,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    }
});


$(document).ready(function () {

    if (typeof window.row == 'undefined') {
        window.row = 1; // Initialize globally
    }
    // $('.table').DataTable();
    $('.table').not('.datatable-remove').DataTable({
        pageLength: 25,
        responsive: true,
        // autoWidth: true, 
        paging: true,
        ordering: true
        // info: true,
        // scrollY: true,
        // scrollX: true,
    });

    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    });

    $(".sub-btn").on("click", function (e) {
        $(this).next('.sub-menu').slideToggle();
    });

    $('.toggle-icon').click(function () {
        $(this).closest('.form-check').next('.category-list').toggle(); // Toggle the next .category-list
    });

    $('.select2').select2({
        maximumInputLength: 20,
        placeholder: "Select an option",
        allowClear: true
    });
    $('#download-btn').click(function (e) {
        e.preventDefault();

        var content = $('#payment').html();
        var currentUrl = window.location.href;
        $.ajax({
            url: '/generate-pdf',
            type: 'POST',
            data: {
                content: content,
                currentUrl: currentUrl
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                const link = document.createElement('a');
                const url = window.URL.createObjectURL(response);
                link.href = url;
                link.downOload = 'generated-file.pdf';
                link.click();
                window.URL.revokebjectURL(url);
            },
            error: function (error) {
                console.error('Error downloading PDF:', error);
            }
        });

    });

    $('#submit-button').click(function (e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to submit this report?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('report-form').submit();
            }
        });
    });

    // $.each($('#ReadyStock'), function(index, element) {
    $(document).on('click', '#ReadyStock', function (e) {
        e.preventDefault();  // Prevent the default checkbox behavior if needed

        var dataId = $(this).data('id');  // Get the data-id of the clicked checkbox
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Get CSRF token

        // Perform the AJAX request
        $.ajax({
            url: "/report-ready",  // Laravel route for updating the status
            type: "POST",
            data: {
                "_token": csrfToken,  // CSRF token
                "id": dataId,         // Report ID
            },

            success: function (response) {
                location.reload(true);
            },
            error: function (xhr) {
                // Optional: Handle error
                console.error(xhr.responseJSON.message);
                alert("Failed to update stock status.");
            }
        });
    });
    
    $('#part, #type').change(function () {
        const part = $('#part').val();
        const type = $('#type').val();

        if (part && type) {
            const allSubCategories = JSON.parse($('#type').attr('data-type'));
            const dataValue = $('#type').find('option:selected').data('value');
            // console.log("Raw value:", dataValue, typeof dataValue); // Always a string initially
            if (part == 0) {
                // window.location.href = '?type=' + encodeURIComponent(type);
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                $.ajax({
                    url: '/get-report-layout',
                    type: 'post',
                    data: { 
                        part: part,
                        type: type,
                        _token: csrfToken, 
                    },
                    success: function (response) {
                        if (response.status === 200 && response.layout.length > 0) {
                            let html = '';
                            let ExtraLine = '';
                            let serialRows = []; // To keep track of rows that need tbl_serial_no
                            let ExtraLineRows = []; // To keep track of rows that need Extra_LineRows

                            // Default fields to check against
                            const defaultFields = [
                                {field_key: 'part', label: 'Part'},
                                {field_key: 'temp', label: 'Temp no.'},
                                {field_key: 'worker_name', label: 'EMPLOYEE NAME'},
                                {field_key: 'sr_no_fiber', label: 'SR (FIBER)'},
                                {field_key: 'mj', label: 'M.J'},
                                {field_key: 'warranty', label: 'Warranty'},
                                {field_key: 'type', label: 'Type'}
                            ];
                            response.layout.forEach(function(item) {
                                // console.log(item);
                                if (item.fields && Array.isArray(item.fields)) {
                                    item.fields.forEach(function(field) {
                                        if(field.sub_category){
                                            if(field.sub_category.sr_no == '1'){
                                                html += `
                                                <div class="row align-items-center mb-1" id="row_${row}">
                                                    <div class="col-12 col-md-2">
                                                        <input type="text" class="tbl_sub form-control mb-1" value="${field.sub_category.sub_category_name}" readonly> 
                                                        <input type="hidden" id="subcategory_${row}" name="sub_category[]" value="${field.sub_category.id}"> 
                                                        <input type="hidden" name="sr_no_or_not[]" value="1">
                                                    </div>

                                                    <!-- Serial No -->
                                                    <div class="col-12 col-md-3">
                                                        <input type="text" name="srled[]" list="srled_${row}" class="form-control mb-1" placeholder="Select or enter a new SR No" required>
                                                        <datalist id="srled_${row}">
                                                            <option value=""></option>
                                                        </datalist>
                                                        <input type="hidden" name="used_qty[]" value="1">
                                                    </div>

                                                    <!-- WATT -->
                                                    <div class="col-12 col-md-2">
                                                        <input type="text" id="wattled_${row}" name="wattled[]" class="form-control mb-1" placeholder="Enter WATT">
                                                    </div>

                                                    <!-- VOLT -->
                                                    <div class="col-12 col-md-2">
                                                        <input type="text" id="voltled_${row}" name="voltled[]" class="form-control mb-1" placeholder="Enter VOLT">
                                                    </div>

                                                    <!-- AMP + Dead + Delete -->
                                                    <div class="col-12 col-md-3 d-flex gap-2">
                                                        <input type="text" id="ampled_${row}" name="ampled[]" class="form-control" placeholder="Enter AMP">
                                                        <input type="checkbox" name="dead[]" value="1" class="ms-2" onchange="syncHiddenInput(this, ${row})">
                                                        <label class="ms-1">Dead</label>
                                                        <input type="hidden" name="dead[]" value="0" class="hidden-dead-${row}">
                                                        <button type="button" onclick="NewremoveRow(this)" class="btn btn-danger btn-sm ms-2" id="${row}"><i class="ri-delete-bin-fill"></i></button>
                                                    </div>
                                                    </div> `;
                                                serialRows.push(row); 
                                            }else if(field.sub_category.sr_no == '0'){
                                                html += `
                                                <div class="row align-items-center mb-1" id="row_${row}">
                                                 <div class="col-12 col-md-2">
                                                    <input type="text" class="tbl_sub form-control mb-1" value="${field.sub_category.sub_category_name}" readonly> 
                                                    <input type="hidden" name="sub_category[]" value="${field.sub_category.id}"> 
                                                    <input type="hidden" name="sr_no_or_not[]" value="0">
                                                </div>
                                                    <input type="hidden" name="sr_no_or_not[]" value="0">
                                                    <div class="col-12 col-md-3">
                                                        <input type="text" list="srled_${row}" class="form-control" placeholder="Enter Quantity" required>
                                                        <datalist id="srled_${row}">
                                                            <option value=""></option>
                                                        </datalist>
                                                        <input type="hidden" name="srled[]" value="0">
                                                        <input type="hidden" name="used_qty[]" class="form-control" placeholder="Enter Qty" value="1">
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-2">                     
                                                        <input type="hidden" name="dead[]" value="0" class="hidden-dead-${row}">
                                                    </div>
                                                    <div class="col-12 col-md-2">
                                                        <input type="hidden" id="ampled_${row}" name="ampled[]" value="">

                                                        <input type="hidden" id="voltled_${row}" name="voltled[]" value="">

                                                        <input type="hidden" id="wattled_${row}" name="wattled[]" value="">
                                                    </div>
                                                    <div class="col-12 col-md-3 d-flex justify-content-md-end gap-2 ">
                                                    <input type="text" id="ampled_${row}" class="form-control d-none" placeholder="Enter AMP">
                                                        <input type="checkbox" name="dead[]" value="1" class="ms-2" onchange="syncHiddenInput(this, ${row})">

                                                        <lable class="ms-2">Dead</lable>
                                                        <button type="button" onclick="NewremoveRow(this)" class="btn btn-danger btn-sm ms-2" id="${row}"><i class="ri-delete-bin-fill"></i></button>
                                                    </div>
                                                </div>
                                                `;
                                            }
                                            // console.log(field.sub_category);
                                        }
                                        else{
                                            const isDefault = defaultFields.some(df => df.label === field.label);
                                            const isNumeric = !isNaN(field.label);
                    
                                            if (!isDefault && !isNumeric) {
                                                ExtraLineRows.push(row);
                                                ExtraLine +=  `
                                                    <div class="row mt-3 align-items-center mb-1" id="row_${row}">
                                                        <div class="col-12 col-md-2">
                                                            <strong>${field.label}</strong>
                                                        </div>
                                                        <div class="col-12 col-md-10">
                                                            <input type="hidden" name="field_key[]" value="${field.field_key}">
                                                            <textarea id="note1" name="field_key_value[]" class="form-control" placeholder="Enter ${field.label}..."></textarea>
                                                        </div>
                                                    </div> `;
                                            }

                                            defaultFields.forEach((defaultfield) => {
                                                if(defaultfield.label == field.label){
                                                    $htmlfind = $('#' + field.field_key.replace(/\s+/g, '-').toLowerCase() + '-label');
                                                    $html = $('#' + field.field_key.replace(/\s+/g, '-').toLowerCase());
                                                    if (field.visible == 0) {
                                                        $htmlfind.css('visibility', 'hidden'); // Hides but keeps space
                                                        $html.css('visibility', 'hidden'); // Hides but keeps space
                                                    } 
                                                } 
                                            });
                                        }
                                        row++;
                                    });
                                }
                            });
                            // if (subcategories && Array.isArray(subcategories)) {
                            //     subcategories.forEach(sub_category => {
                            //         $(`#subcategory_${row}`).append(`<option value="${sub_category.id}" data-unit="${sub_category.unit}" data-sr_no="${sub_category.sr_no}">${sub_category.category.category_name} - ${sub_category.sub_category_name}</option>`);
                            //     });
                            // }
                            $('#TBody').html(html);
                            $('#Append_Extra_Line').html(ExtraLine);
                            serialRows.forEach(function(rowNum) {
                                tbl_serial_no(rowNum);
                            });
                            ExtraLineRows.forEach(function(Rows) {
                                // ExtraLineAppend();
                                console.log(Rows);
                            });
                        }else {
                            $('#TBody').html('<p class="text-danger">No layout found for this selection.</p>');
                        }
                    },
                    error: function () {
                        $('#TBody').html('<p class="text-danger">Failed to load layout.</p>');
                    }
                });
            }
        }
    });
});

function SerialFocus(inputElement, row) {
    // console.log("Input focused for row:", row);
    const datalistId = `srled_${row}`;
    const datalist = document.getElementById(datalistId);

    // Just a sample; replace with actual dynamic logic
    datalist.innerHTML = `
        <option value="SR-001"></option>
        <option value="SR-002"></option>
        <option value="SR-003"></option>
    `;
}

function tbl_serial_no(row){
    const subcategoryInput = document.getElementById(`subcategory_${row}`);
    
    if (!subcategoryInput) {
        console.error(`Subcategory input for row ${row} not found`);
        return;
    }
    
    const subcategoryId = subcategoryInput.value;
    // console.log('Subcategory ID:', subcategoryId);
    fetchStockData(subcategoryId, row);
}

function GetInvoiceData(user, selectId) {
    const selectedId = document.getElementById(selectId).value;

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    if (user === 'supplier') {
        var url = "/get-invoice-details";
        const party = document.getElementById('supplier_select').value;
        var data = {
            _token: csrfToken,
            invoice_no: selectedId,
            party: party,
            status: 1,
        };
    }
    else {
        var url = "/get-invoice-sell-details";
        const customer = document.getElementById('customer_select').value;
        var data = {
            _token: csrfToken,
            invoice_no: selectedId,
            customer: customer,
            status: 1,
        };
    }

    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (response) {
            if (user === 'supplier') {
                $('#supplier_paid_total').val(response.data[0].amount);
            } else if (user === 'customer') {
                $('#customer_amount').val(response.data[0].total_amount);
            }
        }
    });
}

function NewremoveRow(buttonId) {
    $(buttonId).closest('.align-items-center').remove();
}

function toggleBankDetails(user) {
    if (user === 'customer') {
        const paymentMethod = document.getElementById('payment_method').value;
        const bankDetails = document.getElementById('bank_details');

        if (paymentMethod === 'Bank') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
        }
    } else if (user === 'supplier') {
        const paymentMethod = document.getElementById('supplier_payment_method').value;
        const bankDetails = document.getElementById('supplier_bank_details');

        if (paymentMethod === 'Bank') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
        }
    }
}

function filterSecoundryCategory(event) {
    const selectedCategory = event.target.value;
    if (selectedCategory) {
        window.location.href = `?main_category=${encodeURIComponent(selectedCategory)}`;
    }
}
function filterOptions(event) {
    let selectName = event.target.id;
    let cnamePattern = /^data\[(\d+)\]\[cname\]$/;
    let scnamePattern = /^data\[\d+\]\[scname\]$/;

    let match = cnamePattern.exec(selectName);

    if (match) {
        let index = match[1];
        let categorySelect = document.getElementById(`data[${index}][cname]`);
        let subCategorySelect = document.getElementById(`data[${index}][scname]`);

        if (categorySelect && subCategorySelect) {
            let categoryValue = categorySelect.value;

            let items = subCategorySelect.options;
            for (let i = 0; i < items.length; i++) {
                // console.log(items[i].className);
                if (categoryValue === "" || items[i].className === categoryValue) {
                    items[i].style.display = "block";
                } else {
                    items[i].style.display = "none";
                }
            }
        }
    } else if (scnamePattern.test(selectName)) {
        let scnameMatch = scnamePattern.exec(selectName);

        if (scnameMatch) {

            var indexMatch = selectName.match(/data\[(\d+)\]\[scname\]/);

            if (indexMatch && indexMatch[1]) {
                let extractedIndex = indexMatch[1];
                let subCategorySelect = document.getElementById(`data[${extractedIndex}][scname]`);
                let unitSelect = document.getElementById(`data[${extractedIndex}][unit]`);

                if (subCategorySelect) {
                    let selectedSubCategory = subCategorySelect.value;
                    let selectedOption = subCategorySelect.options[subCategorySelect.selectedIndex];
                    let dataUnit = selectedOption.getAttribute('data-unit');
                    if (window.location.pathname == '/sale-create' || window.location.pathname == '/sale-repair-create') {
                        let datasr_no = selectedOption.getAttribute('data-sr_no');
                        let datavalue = selectedOption.getAttribute('data-value');
                        // console.log(datavalue,datasr_no);
                        if (datasr_no == 1) {
                            let sr_no_input = document.querySelector(`#sr_no_${extractedIndex}`);
                            // if its readonly then remove it.
                            if (sr_no_input.getAttribute('readonly') == 'readonly') {
                                sr_no_input.removeAttribute('readonly');

                            }

                            SubCategorysale_sr_no(datavalue, extractedIndex)
                        } else {
                            let sr_no_input = document.querySelector(`#sr_no_${extractedIndex}`);

                            if (sr_no_input) { // Check if the element exists
                                sr_no_input.readOnly = true;
                            }
                        }
                    }
                    if (dataUnit) {
                        for (let i = 0; i < unitSelect.options.length; i++) {
                            if (unitSelect.options[i].value === dataUnit) {
                                unitSelect.selectedIndex = i;
                                break;
                            }
                        }
                    }
                    $('.select2').select2();
                }
            }
        } else {
            alert('Pattern did not match');
        }

    } else {
        console.log("Other select element triggered the function");
    }
}

let invoiceResponse = null;

// function getDataForReturn(subcategory,category,event){
function getDataForReturn(event) {

    const party = document.getElementById('party_name').value;
    const invoice_no = document.getElementById('invoice_no').value;
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    if (window.location.pathname == '/sale-return') {
        url = "/get-invoice-sell-details";
        var data = {
            _token: csrfToken,
            invoice_no: invoice_no,
            customer: party,
            status: 1,
        };
    } else {
        url = "/get-invoice-details";
        var data = {
            _token: csrfToken,
            party: party,
            invoice_no: invoice_no,
            status: 1,
        };
    }
    if (!party || !invoice_no) {
        Swal.fire("Please Enter Party Or Invoice !");
    } else {
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            success: function (response) {
                if (response && response.status === 'success' && response.data && response.data.length > 0) {
                    if (response.sale == 'sale') {
                        invoiceResponse = response;
                        data = response.data[0];
                        // Append html on id InvoiceData
                        document.getElementById('InvoiceData').innerHTML = '';

                        var html = '';

                        html += '<div class="row">';
                        html += '<div class="col">Invoice No.</div>';
                        html += '<div class="col">Date</div>';
                        html += '<div class="col">Customer Name</div>';
                        html += '</div>';

                        // Add invoice details row
                        html += '<div class="row">';
                        html += '<div class="col"><h5 class="form-control">' + data.sale_id + '</h5></div>';
                        html += '<div class="col"><h5 class="form-control">' + data.sale_date + '</h5></div>';
                        html += '<div class="col"><h5 class="form-control">' + data.customer.customer_name + '</h5></div>';
                        html += '</div>';


                        html += '<div class="row">';
                        html += '<div class="col"><b>Category</b></div>';
                        html += '<div class="col"><b>Subcategory</b></div>';
                        html += '<div class="col"><b>Sr No.</b></div>';
                        html += '<div class="col"><b>Unit</b></div>';
                        html += '<div class="col"><b>Qty</b></div>';
                        html += '<div class="col"><b>Alraedy Return</b></div>';
                        html += '<div class="col"><b>Used Qty</b></div>';
                        html += '<div class="col"><b>Price</b></div>';
                        html += '<div class="col"><b>Total</b></div>';
                        html += '</div>';
                        response.inwardsItems.forEach(function (item) {
                            // console.log(item);
                            html += '<div class="row mt-2">';
                            html += '<div class="col">' + item.category.name + '</div>'; // category_name property
                            html += '<div class="col">' + item.sub_category.name + '</div>'; // sub_category_name property
                            html += '<div class="col">' + item.sr_no + '</div>'; // sub_category_name property
                            html += '<div class="col">' + item.unit + '</div>'; // unit property
                            html += '<div class="col">' + item.qty + '</div>'; // qty property
                            html += '<div class="col">' + item.return + '</div>'; // return property
                            html += '<div class="col">' + (item.report_qty !== undefined ? item.report_qty : 0) + '</div>';
                            // return property
                            html += '<div class="col">' + item.rate + '</div>'; // price property
                            html += '<div class="col">' + item.total + '</div>'; // total property
                            html += '</div>';

                        });
                        document.getElementById('InvoiceData').innerHTML += html;
                        html += '';
                    } else {

                        invoiceResponse = response;
                        data = response.data[0];
                        // i want append html on id InvoiceData
                        document.getElementById('InvoiceData').innerHTML = '';

                        var html = '';

                        html += '<div class="row">';
                        html += '<div class="col">Invoice No.</div>';
                        html += '<div class="col">Date</div>';
                        html += '<div class="col">Party Name</div>';
                        html += '</div>';

                        // Add invoice details row
                        html += '<div class="row">';
                        html += '<div class="col"><h5 class="form-control">' + data.invoice_no + '</h5></div>';
                        html += '<div class="col"><h5 class="form-control">' + data.date + '</h5></div>';
                        html += '<div class="col"><h5 class="form-control">' + data.party.party_name + '</h5></div>';
                        html += '</div>';


                        html += '<div class="row">';
                        html += '<div class="col"><b>Category</b></div>';
                        html += '<div class="col"><b>Subcategory</b></div>';
                        html += '<div class="col"><b>Unit</b></div>';
                        html += '<div class="col"><b>Qty</b></div>';
                        html += '<div class="col"><b>Alraedy Return</b></div>';
                        html += '<div class="col"><b>Used Qty</b></div>';
                        html += '<div class="col"><b>Price</b></div>';
                        html += '<div class="col"><b>Total</b></div>';
                        html += '</div>';
                        response.inwardsItems.forEach(function (item) {
                            html += '<div class="row mt-2">';
                            html += '<div class="col">' + item.category.category_name + '</div>'; // category_name property
                            html += '<div class="col">' + item.sub_category.sub_category_name + '</div>'; // sub_category_name property
                            html += '<div class="col">' + item.unit + '</div>'; // unit property
                            html += '<div class="col">' + item.qty + '</div>'; // qty property
                            html += '<div class="col">' + item.return + '</div>'; // return property
                            html += '<div class="col">' + item.report_qty + '</div>'; // return property
                            html += '<div class="col">' + item.price + '</div>'; // price property
                            html += '<div class="col">' + item.total + '</div>'; // total property
                            html += '</div>';

                        });
                        document.getElementById('InvoiceData').innerHTML += html;
                        html += '';
                    }
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "No Data Found",
                        text: "Please check the Invoice Number or Party and try again.",
                    });
                }
            }
        });
    }
}

function SubCategorysale_sr_no(datavalue, extractedIndex) {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // console.log(datavalue, extractedIndex);
    var data = {
        _token: csrfToken,
        type: datavalue,
        url: 'sale-create',
    };
    if (window.location.pathname == '/sale-repair-create') {
        data.url = 'sale-repair-create';
    }
    $.ajax({
        url: "/get-sc-sr-no",
        type: "POST",
        data: data,
        success: function (response) {
            // console.log(response);
            let srNoDiv = document.querySelector(`#sr_no_div_${extractedIndex}`);
            let colDiv = document.querySelector(`#col_div_${extractedIndex}`);
            let sr_no_input = document.querySelector(`#sr_no_${extractedIndex}`);

            if (sr_no_input) { // Check if the element exists
                sr_no_input.disabled = true;
            }
            if (srNoDiv) {
                srNoDiv.style.display = 'block';
                colDiv.style.display = 'none';
            }
            let sr_noSelect = document.querySelector(`#sr_no_div_${extractedIndex} select[id="data[${extractedIndex}][sr_no]"]`);

            if (sr_noSelect) {
                // Clear all existing options
                sr_noSelect.innerHTML = '';

                // Create the HTML for the options
                let html = '';
                response.forEach(function (item) {
                    html += `<option value="${item}">${item}</option>`;
                });

                // Append the new options to the select element
                sr_noSelect.innerHTML += html;
                $('.select2').select2();
            } else {
                console.error('Select element not found');
            }
            let qtyInput = document.getElementById(`data[${extractedIndex}][qty]`);

            if (qtyInput) {
                qtyInput.value = 1;
            }
        }
    });
}

function items_add() {
    const container = document.getElementById('item-container');
    const newRow = document.querySelector('.input-row').cloneNode(true);

    // Clear input values in the new row
    newRow.querySelectorAll('input').forEach((input) => {
        input.value = '';
    });

    // Append the new row to the container
    container.appendChild(newRow);
}

document.addEventListener('click', (event) => {
    if (event.target.closest('.remove-btn')) {
        const row = event.target.closest('.input-row');
        row.remove();
        calculateTotal(); // Recalculate totals after row removal
    }
});

document.addEventListener('input', (event) => {
    if (event.target.matches('.qty') || event.target.matches('.price') || event.target.matches('#cgst') || event.target.matches('#sgst') || event.target.matches('#igst_per')) {
        calculateTotal(event.target);
    }
});

function expenseestoggleBankDetails() {
    const paymentElement = document.getElementById('payment_type');
    const payment_type = paymentElement ? paymentElement.value || 0 : 0;
    const bankDetails = document.getElementById('bank_details');

    // Ensure bankDetails element exists
    if (bankDetails) {
        if (payment_type === 'Bank') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
        }
    }
}

function calculateTotal(element) {
    // Get all the relevant inputs
    const rows = document.querySelectorAll('.input-row');
    const cgstPercent = parseFloat(document.getElementById('cgst').value || 0);
    const sgstPercent = parseFloat(document.getElementById('sgst').value || 0);
    const igstPercent = parseFloat(document.getElementById('igst_per').value || 0);


    document.getElementById('tax_rate_desc').value = cgstPercent + sgstPercent + igstPercent.toFixed(2);
    let subtotal = 0;

    // Loop through each row to calculate subtotal
    rows.forEach((row) => {
        const qty = parseFloat(row.querySelector('.qty')?.value || 0);
        const price = parseFloat(row.querySelector('.price')?.value || 0);
        const totalField = row.querySelector('.total');

        const rowTotal = qty * price;
        subtotal += rowTotal;

        // Update the total field in the row
        if (totalField) {
            totalField.value = rowTotal.toFixed(2);
        }
    });

    // Calculate CGST, SGST, and IGST amounts
    const cgstAmount = (subtotal * cgstPercent) / 100;
    const sgstAmount = (subtotal * sgstPercent) / 100;
    const igstAmount = (subtotal * igstPercent) / 100;

    // Update the amounts in the respective fields
    document.getElementById('cgst_amt').value = cgstAmount.toFixed(2);
    document.getElementById('cgst_amt_desc').value = cgstAmount.toFixed(2);
    document.getElementById('sgst_amt').value = sgstAmount.toFixed(2);
    document.getElementById('sgst_amt_desc').value = sgstAmount.toFixed(2);
    document.getElementById('igst_amt').value = igstAmount.toFixed(2);
    document.getElementById('igst_amt_desc').value = igstAmount.toFixed(2);

    document.getElementById('taxable_amt_desc').value = subtotal.toFixed(2);
    total_tax_desc = cgstAmount + sgstAmount + igstAmount;
    document.getElementById('total_tax_desc').value = total_tax_desc.toFixed(2);



    // Calculate and update the Grand Total
    const grandTotal = subtotal + cgstAmount + sgstAmount + igstAmount;
    document.getElementById('grand_total_amt').value = grandTotal.toFixed(2);
}
function NewReportCreateRow(subcategories) {
    // console.log(subcategories,row);
    $('#TBody').append(`
      <div class="row mb-3 align-items-center" id="row_${row}">
            <!-- Select Dropdown -->
            <div class="col-12 col-md-2 d-flex">
                <select required onchange="tbl_stock(${row});" id="subcategory_${row}" name="sub_category[]" class="tbl_sub ml-2 form-control">
                    <option value="" selected disabled>Select</option>
                </select>
            </div>
            
            <!-- Dynamic Content -->
            <div class="col-12 col-md-10" id="col_${row}">

            </div>
        </div>
    `);
    if (subcategories && Array.isArray(subcategories)) {
        subcategories.forEach(sub_category => {
            $(`#subcategory_${row}`).append(`<option value="${sub_category.id}" data-unit="${sub_category.unit}" data-sr_no="${sub_category.sr_no}">${sub_category.category.category_name} - ${sub_category.sub_category_name}</option>`);
        });
    }
    row++;
}
function tbl_stock(row_id) {
    // alert(row_id);
    var subcategory_id = document.getElementById(`subcategory_${row_id}`).value;

    var subcategoryElement = document.getElementById(`subcategory_${row_id}`);
    // console.log(subcategoryElement,subcategory_id);
    var Tdhtml = document.getElementById(`col_${row_id}`);
    if (Tdhtml && Tdhtml.innerHTML.trim() !== '') {
        Tdhtml.innerHTML = '';
    }

    var selectedOption = subcategoryElement.options[subcategoryElement.selectedIndex];

    if (selectedOption && selectedOption.dataset.unit) {
        var Datasr_no = selectedOption.dataset.sr_no;
        if (Datasr_no === "0") {
            Tdhtml.innerHTML += `
        
        </div> <!-- End previous col div -->
        <div class="row mt-1" id="row_${row_id}">
            <input type="hidden" name="sr_no_or_not[]" value="0">
            <div class="col-12 col-md-3">
                <input type="text" list="srled_${row_id}" class="form-control" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                <datalist id="srled_${row_id}">
                    <option value=""></option>
                </datalist>
                 <input type="hidden" name="srled[]" value="0">
                 <input type="hidden" name="used_qty[]" class="form-control" placeholder="Enter Qty" value="1">
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
                <button type="button" onclick="NewremoveRow(this)" class="btn btn-danger btn-sm margin-btn" id="${row_id}"><i class="ri-delete-bin-fill"></i></button>
            </div>
        </div>`;
        }
        else if (Datasr_no === "1") {
            Tdhtml.innerHTML += `
                </div> <!-- End previous col div -->
                <div class="row" id="row_${row_id}">
                    <input type="hidden" name="sr_no_or_not[]" value="1">
                    <div class="col-12 col-md-3">
                        <input type="text" name="srled[]" list="srled_${row_id}" class="form-control" placeholder="Select or enter a new sr no, Small Alpha Plz" required>
                        <datalist id="srled_${row_id}">
                            <option value=""></option>
                        </datalist>
                        <input type="hidden" name="used_qty[]" class="form-control" value="1">
                    </div>

                    <div class="col-12 col-md-2">
                        <input type="text" id="wattled_${row_id}" name="wattled[]" class="form-control" placeholder="Enter WATT">
                    </div>

                    <div class="col-12 col-md-2">
                        <input type="text" id="voltled_${row_id}" name="voltled[]" class="form-control" placeholder="Enter VOLT">
                    </div>
                    <input type="hidden" name="dead[]" value="0" class="hidden-dead-${row_id}">

                    <div class="col-12 col-md-5 d-flex justify-content-between">
                        
                        <input type="text" id="ampled_${row_id}" name="ampled[]" class="form-control" placeholder="Enter AMP">
                    
                        <input type="checkbox" name="dead[]" value="1" class="m-2" onchange="syncHiddenInput(this, ${row_id})">
                        
                        <lable class="m-2">Dead</lable>
                        <button type="button" onclick="NewremoveRow(this)" class="btn btn-danger btn-sm margin-btn" id="${row_id}"><i class="ri-delete-bin-fill"></i></button>
                    </div>
                </div>
            `;
        }

    }

    if (!subcategory_id) {
        console.error(`Element with ID subcategory_${row_id} not found!`);
        return;
    }

    if (!row_id) {
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

            if (!srled) {
                console.error(`Element with ID 'srled_${row_id}' not found.`);
                return;
            }

            var inputField = document.querySelector(`input[list="srled_${row_id}"]`);
            if (inputField) {
                inputField.removeAttribute('value');
            } else {
                console.error(`Input field with list='srled_${row_id}' not found.`);
            }

            // Clear existing options
            srled.innerHTML = '<option value="">Select</option>';

            if (data.length == 0) {
                var option = document.createElement("option");
                option.value = "";
                option.text = "No data available";
                srled.appendChild(option);
            } else {
                data.forEach(function (item) {
                    var option = document.createElement("option");
                    option.value = item.serial_no;
                    option.text = item.serial_no;
                    srled.appendChild(option);
                });
            }
        }
    });
}

function fetchStockData(subcategory_id, row_id) {
    if (!subcategory_id || !row_id) {
        console.error(`Invalid subcategory_id or row_id`);
        return;
    }

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    $.ajax({
        type: "POST",
        url: "/check_stock",
        data: {
            _token: csrfToken,
            subcategory_id: subcategory_id,
        },
        success: function (response) {
            updateSerialOptions(response.data, row_id);
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
        }
    });
}
function updateSerialOptions(data, row_id) {
    var srled = document.getElementById(`srled_${row_id}`);
    if (!srled) {
        console.error(`Element with ID 'srled_${row_id}' not found.`);
        return;
    }

    var inputField = document.querySelector(`input[list="srled_${row_id}"]`);
    if (inputField) {
        inputField.removeAttribute('value');
    }

    srled.innerHTML = '<option value="">Select</option>';

    if (data.length === 0) {
        let option = document.createElement("option");
        option.value = "";
        option.text = "No data available";
        srled.appendChild(option);
    } else {
        data.forEach(item => {
            let option = document.createElement("option");
            option.value = item.serial_no;
            option.text = item.serial_no;
            srled.appendChild(option);
        });
    }
}
var count = 1;
function BtnAdd(categories, subCategories) {
    if (window.location.pathname == '/sale-create' || window.location.pathname == '/sale-repair-create') {
        $('#TBody').append(`        
        <div class="row custom-row g-2 align-items-center" id="row_${count}" style="margin-top:10px;">
                <div class="col">
                    <select id="data[${count}][cname]" name=cname[]" class="form-control" onchange="filterOptions(event)">
                        <option value="" disabled selected class="0" >Choose a Category</option>
                    </select>
                </div>
                <div class="col">
                    <select id="data[${count}][scname]" name="scname[]" class="form-control" onchange="filterOptions(event)">
                        <option value="" disabled selected class="0" data-unit="">Choose a Sub Category</option>
                    </select>
                </div>
                <div class="col">
                    <select id="data[${count}][unit]" name="unit[]"
                        class="form-control">
                        <option value="" disabled>Select</option>
                        <option value="Pic">Pcs</option>
                        <option value="Mtr">Mtr</option>
                    </select>
                </div>
                <div class="col" id="sr_no_div_${count}" style="display:none;">
                    <select id="data[${count}][sr_no]" name="sr_no[]" placeholder="Plz dont write here"
                        class="form-control select2">
                        <option value="" disabled>Select Sr No</option>
                    </select>
                </div>
                <div class="col" id="col_div_${count}">
                    <input type="text" name="sr_no[]" class="form-control" id="sr_no_${count}" placeholder="Plz dont write here">
                </div>
                <div class="col">
                    <input type="number" id="data[${count}][qty]" name="qty[]" placeholder="Quantity"
                        class="form-control" onchange="total()">
                </div>
                <div class="col">
                    <input type="number" id="data[${count}][rate]" name="rate[]" placeholder="Rate"
                        class="form-control" onchange="total()">
                </div>
                <div class="col">
                    <input type="number" id="data[${count}][p_tax]" value="0" name="p_tax[]" step="0.01" placeholder="Tax"class="form-control" onchange="total()">
                </div>
                <div class="col">
                    <input type="number" id="data[${count}][tax]" step="0.01" name="tax[]"
                        class="form-control" disabled>
                </div>
                <div class="col">
                    <input type="number" id="data[${count}][total]" name="total[]" placeholder="Total"
                    step="0.01" class="form-control">
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger text-white" onclick="BtnDel(this)"><i class="ri-delete-bin-fill"></i></button>
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
    else {
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
                        <option value="Pic">Pcs</option>
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
                    <button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)"><i class="ri-delete-bin-fill"></i></button>
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

    calculateshipping();
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
function rate() {
    var amount1 = parseFloat(document.getElementById(`amount_d`).value) || 0;
    var rate1 = parseFloat(document.getElementById(`rate_r`).value) || 0;

    var amount = amount1 * rate1;

    document.getElementById(`sub_total`).value = amount.toFixed(2);
    document.getElementById(`amount_r`).value = amount.toFixed(2);
    document.getElementById(`amount`).value = amount.toFixed(2);
    sub_total();
}

function NewremoveRow(buttonId) {
    $(buttonId).closest('.align-items-center').remove();
}
function syncHiddenInput(checkbox, rowId) {
    const hiddenInput = document.querySelector(`.hidden-dead-${rowId}`);
    if (checkbox.checked) {
        hiddenInput.disabled = true; // Disable the hidden input if the checkbox is checked
    } else {
        hiddenInput.disabled = false; // Enable the hidden input if the checkbox is unchecked
    }
}

function filterInvoices() {
    const selectedSupplierId = document.getElementById('supplier_select').value;

    const invoiceSelect = document.getElementById('invoice_select');
    // const invoiceOptions = invoiceSelect.querySelectorAll('option');

    $(invoiceSelect).find('option').each(function () {
        const supplierId = $(this).data('supplier');
        if (supplierId == selectedSupplierId || !supplierId) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });

    $(invoiceSelect).val([]); // Reset selection
    $(invoiceSelect).trigger("chosen:updated");
}

function deadstatus(selectElement) {
    const itemId = selectElement.getAttribute('data-id');
    const newStatus = selectElement.value;

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const badge = document.getElementById(`badge-${itemId}`);

    // Update badge immediately
    badge.className = 'badge ' + (
        newStatus == 0 ? 'bg-success' :
            newStatus == 1 ? 'bg-danger' : 'bg-secondary'
    );
    badge.textContent = selectElement.options[selectElement.selectedIndex].text;

    $.ajax({
        url: '/update-status', // Your update endpoint
        method: 'POST',
        data: {
            id: itemId,
            status: newStatus,
            _token: csrfToken,
        },
        success: function (response) {
            toastr.success(response.message || 'Status updated successfully');

            // Update the select styling
            $(selectElement)
                .find('option')
                .removeClass('text-success text-danger text-secondary')
                .filter(':selected')
                .addClass(
                    newStatus == 0 ? 'text-success' :
                        newStatus == 1 ? 'text-danger' : 'text-secondary'
                );

            // Additional visual feedback
            $(selectElement)
                .removeClass('is-invalid')
                .addClass('is-valid');

            setTimeout(() => {
                $(selectElement).removeClass('is-valid');
            }, 2000);
        },
        error: function (xhr) {
            toastr.error('Error updating status');
        }
    });
}