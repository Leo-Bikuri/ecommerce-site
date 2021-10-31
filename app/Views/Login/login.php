<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="" href="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    <title>Login</title>
</head>
<body>
    <div class="logbg">
        <div class="login-box">
            <h1>Login</h1>
            <form autocomplete="off" action = "<?php echo base_url('Login/index')?>" method="POST" name="login-form" class="log-form">
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email" name="email" value="" id="username" required>
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" value="" id="password" required0>
                </div>
                <a href="Index.php"><input class="login_btn" type="submit" name="Login" value = "LOGIN"></a>
            </form>
            <p class="reg">New here?<a href="<?php echo base_url('Registration/index')?>" style="color: rgb(0, 102, 102);">Create an account</a></p>
            
        </div>
        <?php if(isset($validation)){ ?>
                <div class="alert alert-danger" id="size2" role="alert">
                            <?php echo $validation->listErrors() ?>
                        </div>
                        <?php } ?>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
    <script>
        $(function() {
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
                    $.ajax({
                            url: '<?php echo base_url('Login/index')?>',
                            type: 'POST',
                            data: $(form).serialize(),
                            success: function(response){
                                if(response === "success"){
                                window.location.href = "<?php echo base_url('/')?>";
                                }else{
                                    alert("Email or Password is incorrect");
                                }
                            }
                        });
                }
            });
});
    </script>
</body>
</html>