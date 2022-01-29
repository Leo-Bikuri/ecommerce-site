<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="regbg">
        <form autocomplete="off" action="<?php echo base_url('Registration/register')?>" method="post" name="registration-form" class="reg-form" id="reg-form">
            <div class="register-box">
                <h1>Sign up</h1>
                <div class="regtextbox">
                    <input autocomplete="off" type="text" placeholder="First name" name="firstname" value="<?php set_value('firstname')?>" size="29" >
                    <input autocomplete="off" type="text" placeholder="Last name" name="lastname" value="<?php set_value('lastname')?>" size="29" >
                    <input autocomplete="off" type="email" placeholder="Email" name="email" value="<?php set_value('email')?>" size="29" >
                    <div class="regtextbox">
                        <select id="gender" name="gender" value="<?php set_value('gender')?>">
                        <option value="male" selected disabled>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                    </select>
                    </div>
                    <input autocomplete="off" type="password" placeholder="Password" name="password" id="password" value="" size="29" >
                    <input autocomplete="off" type="password" placeholder="Re-enter password" name="password_confirm" value="" size="29" >
                </div> 
                <input class="regbtn" type="submit" name="sign_up" value = "Sign up">
                <p class="logprompt">Already have an account?<a href="<?php echo base_url('Login/index')?>" style="color: rgb(0, 102, 102);">Login</a></p>
            </div>
            <?php if(isset($validation)){ ?>
            <div class="alert alert-danger" id="size" role="alert">
                            <?php echo $validation->listErrors();
                                    unset($validation);
                            ?>
                        </div>
                        <?php } ?>
                        
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
    <script>
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
                        $.ajax({
                            url: '<?php echo base_url('Registration/register')?>',
                            type: 'POST',
                            data: $(form).serialize(),
                            success: function(response){
                                if(response == "success"){
                                alert('Registration successful');
                                window.location.href = '/Login';
                                }else{
                                    alert('Registration failed');
                                }
                            }
                        });
                    }
                });
        });
    </script>
</body>
</html>