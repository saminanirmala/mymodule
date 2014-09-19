<html>
    <head>
        <title>Register</title>
    <h1>Register Form</h1>
    </head>
    <body>
        <form name="" method="POST">
             <?php echo validation_errors(); ?>
             First Name:<input type="text" name="first_name"><br/>
            Last Name:<input type="text" name="last_name"><br/>
             Address:<input type="text" name="address"><br/>
             Email:<input type="text" name="email"><br/>
             Phone:<input type="text" name="phone"><br/>
            Password:<input type="password" name="password"><br/>
             Re-Password:<input type="password" name="password_confirm"><br/>
             <label>User-Type</label> <select name="user_type">
                     <?php foreach($listgrp as $usertype): ?>
                        <option value=<?php echo $usertype['id'];?>><?php echo $usertype['name'];?></option>
                     <?php endforeach;  ?>
               </select><br/>
            <input type="submit" name="submit" value="Register">
        </form>
    </body>
</html>