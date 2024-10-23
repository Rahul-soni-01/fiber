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
                if (admin  !== 'admin') {
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
                                        }else{
                                            $(this).css('display', 'none');
                                        }
                                    });
                                });
                            } else if (itemId === 'Home') {
                                $(this).css('display', 'block');
                            }
                        });
                    });
                }else{
                    // console.log("798");
                }
            }
        });
    }
    window.onload = checkQueryParams(), check_permission();
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
                    // console.log('selectedSubCategory', selectedSubCategory);

                    let selectedOption = subCategorySelect.options[subCategorySelect.selectedIndex];
                    // console.log('selectedOption', selectedOption);

                    let dataUnit = selectedOption.getAttribute('data-unit');
                    // console.log(dataUnit);
                    if (dataUnit) {
                        for (let i = 0; i < unitSelect.options.length; i++) {
                            if (unitSelect.options[i].value === dataUnit) {
                                unitSelect.selectedIndex = i;
                                break;
                            }
                        }
                    }
                }
            }
        } else {
            alert('Pattern did not match');
        }

    } else {
        console.log("Other select element triggered the function");
    }
}


