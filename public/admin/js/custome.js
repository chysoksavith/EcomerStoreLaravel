$(document).ready(function () {
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/check-current-password",
            data: { current_password: current_password },
            success: function (response) {
                if (response == "false") {
                    $("#verifyCurrentPwd").html(
                        "current password is incorrect"
                    );
                } else if (response == "true") {
                    $("#verifyCurrentPwd").html("current password is correct");
                }
            },
            error: function () {
                alert("error");
            },
        });
    });
    // update Cms Page Status
    $(document).on("click", ".updateCmsPageStatus", function () {
        var status = $(this).find("i").attr("status");
        var page_id = $(this).attr("page_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-cms-pages-status",
            data: { status: status, page_id: page_id },
            success: function (response) {
                if (response["status"] == 0) {
                    $("#page-" + page_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey;' status='Inactive'></i>"
                    );
                } else if (response["status"] == 1) {
                    $("#page-" + page_id).html(
                        "<i class='fas fa-toggle-on' style='color:blue;' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error occurred during AJAX request");
            },
        });
    });
    // delete confirm delete cms page
    $(document).on("click", ".confirmDelete", function () {
        var record = $(this).attr("record");
        var recordid = $(this).attr("recordid");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success",
                });
                window.location.href =
                    "/admin/delete-" + record + "/" + recordid;
            }
        });
    });
    // update subadmin Status
    $(document).on("click", ".updateSubAdmin", function () {
        var status = $(this).find("i").attr("status");
        var subadmin_id = $(this).attr("subadmin_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-subadmin-status",
            data: { status: status, subadmin_id: subadmin_id },
            success: function (response) {
                if (response["status"] == 0) {
                    $("#subadmin-" + subadmin_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey;' status='Inactive'></i>"
                    );
                } else if (response["status"] == 1) {
                    $("#subadmin-" + subadmin_id).html(
                        "<i class='fas fa-toggle-on' style='color:blue;' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error occurred during AJAX request");
            },
        });
    });
    // update Category Status
    $(document).on("click", ".updateCategoryStatus", function () {
        var status = $(this).find("i").attr("status");
        var category_id = $(this).attr("category_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-category-status",
            data: { status: status, category_id: category_id },
            success: function (response) {
                if (response["status"] == 0) {
                    $("#category-" + category_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey;' status='Inactive'></i>"
                    );
                } else if (response["status"] == 1) {
                    $("#category-" + category_id).html(
                        "<i class='fas fa-toggle-on' style='color:blue;' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error occurred during AJAX request");
            },
        });
    });
    // update Product Status
    $(document).on("click", ".updateProductStatus", function () {
        var status = $(this).find("i").attr("status");
        var product_id = $(this).attr("product_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-product-status",
            data: { status: status, product_id: product_id },
            success: function (response) {
                if (response["status"] == 0) {
                    $("#product-" + product_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey;' status='Inactive'></i>"
                    );
                } else if (response["status"] == 1) {
                    $("#product-" + product_id).html(
                        "<i class='fas fa-toggle-on' style='color:blue;' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error occurred during AJAX request");
            },
        });
    });
     // update Attr Status
     $(document).on("click", ".updateAttributeStatus", function () {
        var status = $(this).find("i").attr("status");
        var attribute_id = $(this).attr("attribute_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-attribute-status",
            data: { status: status, attribute_id: attribute_id },
            success: function (response) {
                if (response["status"] == 0) {
                    $("#attribute-" + attribute_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey;' status='Inactive'></i>"
                    );
                } else if (response["status"] == 1) {
                    $("#attribute-" + attribute_id).html(
                        "<i class='fas fa-toggle-on' style='color:blue;' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error occurred during AJAX request");
            },
        });
    });
     // update Attr Status
     $(document).on("click", ".updateBrandStatus", function () {
        var status = $(this).find("i").attr("status");
        var brand_id = $(this).attr("brand_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-brand-status",
            data: { status: status, brand_id: brand_id },
            success: function (response) {
                if (response["status"] == 0) {
                    $("#brand-" + brand_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey;' status='Inactive'></i>"
                    );
                } else if (response["status"] == 1) {
                    $("#brand-" + brand_id).html(
                        "<i class='fas fa-toggle-on' style='color:blue;' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error occurred during AJAX request");
            },
        });
    });
     // update Banner Status
     $(document).on("click", ".updatebannerStatus", function () {
        var status = $(this).find("i").attr("status");
        var banner_id = $(this).attr("banner_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-banner-status",
            data: { status: status, banner_id: banner_id },
            success: function (response) {
                if (response["status"] == 0) {
                    $("#banner-" + banner_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey;' status='Inactive'></i>"
                    );
                } else if (response["status"] == 1) {
                    $("#banner-" + banner_id).html(
                        "<i class='fas fa-toggle-on' style='color:blue;' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Error occurred during AJAX request");
            },
        });
    });
    // ---------------------------- Add Attr Script --------------------------------
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $(".add_button"); //Add button selector
        var wrapper = $(".field_wrapper"); //Input field wrapper
        var fieldHTML =
            '<div><input type="text" name="size[]" style=" width: 120px;" placeholder="Size" /> <input type="text" name="sku[]" style=" width: 120px;" placeholder="sku"/> <input type="text" name="price[]" style=" width: 120px;"placeholder="price" /> <input type="text" name="stock[]" style=" width: 120px;"placeholder="stock" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        // Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            } else {
                alert(
                    "A maximum of " +
                        maxField +
                        " fields are allowed to be added. "
                );
            }
        });

        // Once remove button is clicked
        $(wrapper).on("click", ".remove_button", function (e) {
            e.preventDefault();
            $(this).parent("div").remove(); //Remove field html
            x--; //Decrease field counter
        });
    });
});
