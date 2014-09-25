<html>
    <head>
        <title>Login</title>
    <h1>Login Form</h1>
    </head>
    <body>
        <form name="" method="POST">
            <?php echo validation_errors(); ?>
            Email Address:<input type="text" name="identity"><br/>
            Password:<input type="password" name="password"><br/>
            <input type="submit" name="submit">
        </form>
        <a href="<?php echo base_url();?>user/forgot_password">Forget Password</a>
        <h2>New User? </h2><a href="<?php echo base_url();?>user/sign_up">Register</a><h3>Here</h3>
        
    </body>
</html>
