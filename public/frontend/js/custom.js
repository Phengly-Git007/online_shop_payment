$(document).ready(function () {
    // add to wishlist
    $(".addToWishlist").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });

    // add-to-cart

    $(".addToCart").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        var quantity = $(this)
            .closest(".product_data")
            .find(".quantity-input")
            .val();

        // csrf-token is required
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        // csrf-token
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                quantity: quantity,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });
    // delete-cart-item
    $(".delete-cart-item").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        // csrf-token is required
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        // csrf-token
        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                window.location.reload();
                swal(response.status);
            },
        });
    });

    // increment quantity
    $(".increment-quantity").click(function (e) {
        e.preventDefault();
        // var increment_value = $(".quantity-input").val();
        var increment_value = $(this)
            .closest(".product_data")
            .find(".quantity-input")
            .val();
        var value = parseInt(increment_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $(".quantity-input").val(value);
            $(this).closest(".product_data").find(".quantity-input").val(value);
        }
    });
    // decrement quantity

    $(".decrement-quantity").click(function (e) {
        e.preventDefault();
        // var decrement_value = $(".quantity-input").val();
        var decrement_value = $(this)
            .closest(".product_data")
            .find(".quantity-input")
            .val();
        var value = parseInt(decrement_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $(".quantity-input").val(value);
            $(this).closest(".product_data").find(".quantity-input").val(value);
        }
    });
});
