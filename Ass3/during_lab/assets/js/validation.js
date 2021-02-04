$(function () {
    $("form[name='registration']").validate({
        rules:{
            firstname: "required",
            lastname: "required",
            number:{
                required:true,
                digits:true,
                minlength: 8,
                maxlength: 10
            },
            email: {
                required: true,
                email: true
            }
        },
        messages:{
            firstname: "Please enter your First Name",
            lastname: "Please enter your Last Name",
            number: "Please enter your Phone Number, between 8 to 10 digits",
            email: "Please enter a valid Email Address"
        },
        submitHandler: function (form) {
            form.submit()
        }
    })
})