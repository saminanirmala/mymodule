<html>
    <head>
    <h1>Welcome to Dashboard <?php echo $this->session->userdata('username'); ?></h1> 
    </head>
    <body>
      <a href="<?php echo base_url();?>user/logout">Logout</a>
      <a href="<?php echo base_url();?>user/profile">Profile</a>
       
    </body>
</html>
