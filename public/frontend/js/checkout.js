$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".razorpay-method").click(function (e) {
        e.preventDefault();
        var first_name = $(".first_name").val();
        var last_name = $(".last_name").val();
        var email = $(".email").val();
        var phone = $(".phone").val();
        var address1 = $(".address1").val();
        var address2 = $(".address2").val();
        var city = $(".city").val();
        var state = $(".state").val();
        var country = $(".country").val();
        var pincode = $(".pincode").val();

        if (!first_name) {
            first_name_err = "This field must be required";
            $("#first_name_err").html("");
            $("#first_name_err").html(first_name_err);
        } else {
            first_name_err = "";
            $("#first_name_err").html("");
        }

        if (!last_name) {
            last_name_err = "This field must be required";
            $("#last_name_err").html("");
            $("#last_name_err").html(last_name_err);
        } else {
            last_name_err = "";
            $("#last_name_err").html("");
        }

        if (!email) {
            email_err = "This field must be required";
            $("#email_err").html("");
            $("#email_err").html(email_err);
        } else {
            email_err = "";
            $("#email_err").html("");
        }
        if (!phone) {
            phone_err = "This field must be required";
            $("#phone_err").html("");
            $("#phone_err").html(phone_err);
        } else {
            phone_err = "";
            $("#phone_err").html("");
        }
        if (!address1) {
            address1_err = "This field must be required";
            $("#address1_err").html("");
            $("#address1_err").html(address1_err);
        } else {
            address1_err = "";
            $("#address1_err").html("");
        }
        if (!address2) {
            address2_err = "This field must be required";
            $("#address2_err").html("");
            $("#address2_err").html(address2_err);
        } else {
            address2_err = "";
            $("#address2_err").html("");
        }
        if (!city) {
            city_err = "This field must be required";
            $("#city_err").html("");
            $("#city_err").html(city_err);
        } else {
            city_err = "";
            $("#city_err").html("");
        }
        if (!state) {
            state_err = "This field must be required";
            $("#state_err").html("");
            $("#state_err").html(state_err);
        } else {
            state_err = "";
            $("#state_err").html("");
        }
        if (!country) {
            country_err = "This field must be required";
            $("#country_err").html("");
            $("#country_err").html(country_err);
        } else {
            country_err = "";
            $("#country_err").html("");
        }
        if (!pincode) {
            pincode_err = "This field must be required";
            $("#pincode_err").html("");
            $("#pincode_err").html(pincode_err);
        } else {
            pincode_err = "";
            $("#pincode_err").html("");
        }

        if (
            first_name_err != "" ||
            last_name_err != "" ||
            email_err != "" ||
            phone_err != "" ||
            address1_err != "" ||
            address2_err != "" ||
            city_err != "" ||
            state_err != "" ||
            country_err != "" ||
            pincode_err != ""
        ) {
            return false;
        } else {
            data = {
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                address1: address1,
                address2: address2,
                city: city,
                state: state,
                country: country,
                pincode: pincode,
            };
            $.ajax({
                method: "POST",
                url: "/process-to-pay",
                data: data,
                success: function (response) {
                    alert(response.total_price);
                },
            });
        }
    });
});
