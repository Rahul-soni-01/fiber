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
            $('.append_fields').append('<div class="col-sm-1">' + (i + 1) + '</div> <div class="col-sm-11 mt-2"> <input type="number" class="form-control" required name="serial_no[]"  id="sr_' + i + '" /></div>');
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
                admin = response.type;
                if (admin !== 'admin') {
                    $('.sidebar').css('display', 'none');
                    $('.sub-item').css('display', 'none');
                    Object.entries(data).forEach(function ([key, value]) {
                        var menuItems = $('.sidebar');
                        menuItems.each(function () {
                            var itemId = $(this).attr('id');
                            if (key === itemId) {
                                $(this).css('display', 'block');
                                value.forEach(function (permission) {
                                    var submenu = $('.sub-item');
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
                            ${item.category.name} - ${item.sub_category.name}
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
});

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
                    if (window.location.pathname == '/sale-create') {
                        let datasr_no = selectedOption.getAttribute('data-sr_no');
                        let datavalue = selectedOption.getAttribute('data-value');
                        if (datasr_no == 1) {
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
                }
                // console.log(subCategorySelect);

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
                        html += '<div class="col"><b>Unit</b></div>';
                        html += '<div class="col"><b>Qty</b></div>';
                        html += '<div class="col"><b>Alraedy Return</b></div>';
                        html += '<div class="col"><b>Price</b></div>';
                        html += '<div class="col"><b>Total</b></div>';
                        html += '</div>';
                        response.inwardsItems.forEach(function (item) {
                            // console.log(item);
                            html += '<div class="row mt-2">';
                            html += '<div class="col">' + item.category.name + '</div>'; // category_name property
                            html += '<div class="col">' + item.sub_category.name + '</div>'; // sub_category_name property
                            html += '<div class="col">' + item.unit + '</div>'; // unit property
                            html += '<div class="col">' + item.qty + '</div>'; // qty property
                            html += '<div class="col">' + item.return + '</div>'; // return property
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
    var data = {
        _token: csrfToken,
        type: datavalue,
    };
    $.ajax({
        url: "/get-sc-sr-no",
        type: "POST",
        data: data,
        success: function (response) {

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
                // Create the HTML for the options
                let html = '';
                response.forEach(function (item) {
                    html += `<option value="${item}">${item}</option>`;
                });

                // Append the new options to the select element
                sr_noSelect.innerHTML += html;
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

function expenseestoggleBankDetails(){
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


    document.getElementById('tax_rate_desc').value = cgstPercent+sgstPercent + igstPercent.toFixed(2);
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

