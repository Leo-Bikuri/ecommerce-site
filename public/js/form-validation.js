$(function() {

    $("form[name = 'registration-form']").validate({

        rules: {

            firstname: "required",
            lastname: "required",
            email: {
                required: true,

                email:true
            },
            password: {
                required: true,
                minlength: 8 
            },
            password_confirm: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            } 
            },
            messages: {
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                password_confirm: {
                    required: "Please confirm your password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "The two passwords must match"
                },
                email: "Please enter a valid email address"
            },

            submitHandler: function(form){
                form.submit();
            }
    });

    $("form[name = 'login-form']").validate({
        rules: {
            email: {
                required: true,

                email: true
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            email: "Please enter a valid email",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            }
        },

        submitHandler: function(form){
            form.submit();
        }
    });
});