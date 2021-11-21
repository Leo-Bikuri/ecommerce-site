    <div class="popup">
        <div class="background">
            <div class="form_wrapper">
                <div class="form_container">
                    <div class="title_container">
                    <h2>Registration</h2>
                    </div>
                    <div class="row clearfix">
                    <div class="close">
                            <i class='bx bx-x bx-md close-icon' onclick="close_popup()"></i>
                    </div>
                        <div class="">
                            <form method="post" name="registration-form" id="registration-form"  action="">
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" placeholder="Email" required />
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                    <input type="password" id="password" name="password" placeholder="Password" required />
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                    <input type="password" name="password_confirm" placeholder="Re-type Password" required />
                                </div>
                                <div class="row clearfix">
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                            <input type="text" name="first_name" placeholder="First Name" />
                                        </div>
                                    </div>
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                            <input type="text" name="last_name" placeholder="Last Name" required />
                                        </div>
                                    </div>
                                </div>
                                    <div class="input_field radio_option">
                                        <input type="radio" name="gender" id="rd1" value="male">
                                        <label for="rd1">Male</label>
                                        <input type="radio" name="gender" id="rd2" value="female">
                                        <label for="rd2">Female</label>
                                    </div>
                                <input class="button" type="submit" value="Register" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>

    // document.getElementbyId('button').addEventListener("click", function(){
    //     document.getElementsByClassName('.popup').style.display = "flex";
    // })
    function popup(){
        document.querySelector('.popup').style.display = "flex";
    }
    function close_popup(){
        document.querySelector('.popup').style.display = "none";
    }
    $(function() {

      $("form[name = 'registration-form']").validate({

        rules: {

            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8 
            },
            password_confirm: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
            first_name: "required",
            last_name: "required"
        },
            messages: {
                email: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                password_confirm: {
                    required: "Please confirm your password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "The two passwords must match"
                },
                first_name: "Please enter your first name",
                last_name: "Please enter yout last name",
            },

            submitHandler: function(form){
                $.ajax({
                    url: '<?php echo $url; ?>',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function(response){
                        if(response === "success"){
                        alert('Registration successful');
                        document.getElementById('registration-form').reset();
                        }else{
                            alert('Internal server failure');
                        }
                    }
                });
            }
       });
    });
</script>