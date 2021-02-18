$(function () {
    function passwordValidation() {
        if ($("#password").val().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/)) {
            $("#validationMsg").text("Password Looks Strong");
            $("#validationMsg").css("color", "green");
            return true;
        } else {
            $("#validationMsg").text("Password should contain uppercase, lowercase, numeric, special character and length limit is 8-15");
            $("#validationMsg").css("color", "red");
            return false;
        }
    }
    $("form[name='registration']").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            number: {
                required: true,
                digits: true,
                minlength: 8,
                maxlength: 10
            },
            password: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            address: "required",
            pincode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            }
        },
        messages: {
            firstname: "Please enter your First Name",
            lastname: "Please enter your Last Name",
            number: "Please enter your Phone Number, between 8 to 10 digits",
            password: "Password should contain uppercase, lowercase, numeric, special character and length limit is 8-15",
            email: "Please enter a valid Email Address",
            address: "Please Enter your address",
            pincode: "Please enter your pincode"
        },
        submitHandler: function (form) {
            if (passwordValidation())
                form.submit()
        }
    })
})