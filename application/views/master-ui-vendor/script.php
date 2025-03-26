

<!-- <div class="modal fade" id="modal_edit_product" tabindex="-1" aria-hidden="true"></div> -->
<div class="modal fade" id="modal_edit_product" tabindex="-1" aria-hidden="true">

<script type="text/javascript">
"use strict";
var KTUsersList = function() {
    var e, t, n, r, o = document.getElementById("dt_staff_list"),
        c = () => {
            
        };

    return {
        init: function() {
            o && (o.querySelectorAll("tbody tr").forEach((e => {
                const t = e.querySelectorAll("td"),
                    n = t[3].innerText.toLowerCase();
                let r = 0,
                    o = "minutes";
                n.includes("yesterday") ? (r = 1, o = "days") : n.includes("mins") ? (r = parseInt(n.replace(/\D/g, "")), o = "minutes") : n.includes("hours") ? (r = parseInt(n.replace(/\D/g, "")), o = "hours") : n.includes("days") ? (r = parseInt(n.replace(/\D/g, "")), o = "days") : n.includes("weeks") && (r = parseInt(n.replace(/\D/g, "")), o = "weeks");
                const c = moment().subtract(r, o).format();
                t[3].setAttribute("data-order", c);
                // const l = moment(t[5].innerHTML, "DD MMM YYYY, LT").format();
                // t[5].setAttribute("data-order", l)
            })), (e = $(o).DataTable({
                info: !1,
                order: [],
                pageLength: 10,
                lengthChange: !1,
                columnDefs: [{
                    orderable: !1,
                    targets: 0
                }, {
                    orderable: !1,
                    targets: 3
                }]
            })).on("draw", (function() {
                c()
            })), document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", (function(t) {
                e.search(t.target.value).draw()
            })), c(), (() => {
                const t = document.querySelector('[data-kt-user-table-filter="form"]')
            })())
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTUsersList.init()
}));





$(document).on('click', '.disable-product', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    Swal.fire({
      // title: "Are you sure?",
      text: "Are you sure ?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
        // Swal.fire({
        //   title: "Deleted!",
        //   text: "Your file has been deleted.",
        //   icon: "success"
        // });
        $.ajax({
            url: base_url + 'vendor/disabled_product',
            type: "POST",
            data: {id:id},
            async: true,
            dataType:"json",
            success: function( response ){
                if (response.status == true) {

                    Swal.fire({
                      title: "Success!",
                      text: response.msg,
                      icon: "success"
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Wait for 3 seconds (3000 milliseconds)

                } else {
                    Swal.fire({
                      title: "Error!",
                      text: response.msg,
                      icon: "error"
                    });
                }
            },
            error: function(data){
                // console.log(data);
            },
        });
      }
    });
    // $.ajax({
    //     url: base_url + 'office/add_new_kit_modal',
    //     type: "POST",
    //     // data: {id:id},
    //     async: true,
    //     success: function( response ){
    //         $('#kt_modal_create_kit').html(response);
    //         $('#kt_modal_create_kit').modal('show');
    //     },
    //     error: function(data){
    //         // console.log(data);
    //     },
    // });
});

$(document).on('click', '.edit-product', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    $.ajax({
        url: base_url + 'vendor/editProduct',
        type: "POST",
        data: {id:id},
        async: true,
        success: function( response ){
            $('#modal_edit_product').html(response);
            $('#modal_edit_product').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.delete-product', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    Swal.fire({
      // title: "Are you sure?",
      text: "Are you sure want to delete?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
            url: base_url + 'vendor/delete_product',
            type: "POST",
            data: {id:id},
            async: true,
            dataType:"json",
            success: function( response ){
                if (response.status == true) {

                    Swal.fire({
                      title: "Success!",
                      text: response.msg,
                      icon: "success"
                    });

                    setTimeout(function() {
                        location.reload();
                    }, 1000); // Wait for 3 seconds (3000 milliseconds)

                } else {
                    Swal.fire({
                      title: "Error!",
                      text: response.msg,
                      icon: "error"
                    });
                }
            },
            error: function(data){
                // console.log(data);
            },
        });
      }
    });
    // $.ajax({
    //     url: base_url + 'office/add_new_kit_modal',
    //     type: "POST",
    //     // data: {id:id},
    //     async: true,
    //     success: function( response ){
    //         $('#kt_modal_create_kit').html(response);
    //         $('#kt_modal_create_kit').modal('show');
    //     },
    //     error: function(data){
    //         // console.log(data);
    //     },
    // });
});


var validateCreateNewUser;
function editProductValidation(formID)
{   
    const fileForm = document.getElementById(formID);
    validateCreateNewUser = FormValidation.formValidation(
    fileForm,
    {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Product Name is required',
                    }
                }
            },
            price: {
                validators: {
                    notEmpty: {
                        message: 'Price is required',
                    }
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: ""
            })
        }
    }
    );
}

$(document).on('click', '.btn-edit-product', function (e) {
    e.preventDefault();
    validateCreateNewUser.validate().then(function(status) {

        if (status == 'Valid') {

            var newUserFormData = $('#edit_product_form_data').serialize();

            $.ajax({
                url: base_url + 'vendor/do_edit_product',
                type: "POST",
                data: newUserFormData,
                dataType: "json",
                async: true,
                success: function( response ) {
                    // console.log(response);
                    if (response.status == true) {
                        Swal.fire({
                            text: response.msg,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                $("#modal_add_new_user").modal('hide');
                                location.reload();
                            }
                        }))
                    } else {
                        Swal.fire({
                            text: response.msg,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                }
            });

        } else {
            swal.fire({
                text: "Before proceeding, please ensure that all mandatory fields have been completed.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            })
        }
    });

});


function populate_price(id)
{
    $.ajax({
        url: base_url + 'vendor/get_product_by_id',
        type: "POST",
        data: {id:id},
        async: true,
        dataType:"json",
        success: function( response ){
            
            if (response.status == true) {
                $("#product-pricing-idd").val(response.price);
                $("#default-quantity-idd").val('1'); 
                $("#total-pricing-idd").val(response.price);
            } else {
                alert ("Error"); return;
            }

        },
        error: function(data){
            // console.log(data);
        },
    });
}

function calc_total_price(quantity)
{
    var getPrice = $("#product-pricing-idd").val();
    var numericValue = getPrice.replace(/[^0-9.-]+/g, '');

    var amount = parseFloat(numericValue);

    var totalPrice = amount * quantity;

    var finalRs =  totalPrice.toFixed(2);  // Round to two decimal places

    $("#total-pricing-idd").val("RM"+finalRs);

}


$(document).on('click', '.btn-make-payment', function (e) {

    e.preventDefault();

    var productid = $("#idd-product-name-payment").val();
    var staffid = $("#idd-staff-id-payment").val();
    var quantityid = $("#default-quantity-idd").val();



     // Flag to track validation status
    var isValid = true;
    
    // Clear any previous error messages
    $(".error-message").css('display', 'none');

    // Validate productid
    if (!productid || productid.trim() === "") {
        isValid = false;
        $("#err-product").css('display', 'block').text("Product is required.");
    }

    // Validate staffid
    if (!staffid || staffid.trim() === "") {
        isValid = false;
        $("#err-staff-id").css('display', 'block').text("Staff ID is required.");
        
    }

    // Validate quantityid
    if (!quantityid || isNaN(quantityid) || parseInt(quantityid) <= 0) {
        isValid = false;
        $("#err-quantity").css('display', 'block').text("Quantity is required.");
    }

    // If all validations pass
    if (isValid) {
        $.ajax({
            url: base_url + 'vendor/makePayment',
            type: "POST",
            data: {productid:productid,staffid:staffid,quantityid:quantityid},
            async: true,
            dataType:"json",
            success: function( response ){
                
                if (response.status == true) {

                    Swal.fire({
                        text: response.msg,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then((function(t) {
                        if (t.isConfirmed) {
                            location.reload();
                        }
                    }))

                } else {
                    Swal.fire({
                      // title: "Error!",
                      text: response.msg,
                      icon: "info"
                    });
                }

            },
            error: function(data){
                // console.log(data);
            },
        });
    } else {
        console.log("Validation failed.");
    }    

});

</script>