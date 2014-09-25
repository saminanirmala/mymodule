<html>
    <head>
    <h1>Welcome to Dashboard <?php echo $this->session->userdata('username'); ?></h1> 
</head>
<body>
    <a href="<?php echo base_url(); ?>user/logout">Logout</a>
    <table border="1px solid black">
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Phone number</td>
            <td>company</td>
            <td>Email</td>
            <td>Activate</td>
            <td colspan="2">Action</td>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>

                <td><?php echo $user->first_name; ?></td>
                <td><?php echo $user->last_name; ?></td>
                <td><?php echo $user->phone; ?></td>
                <td><?php echo $user->company; ?></td>
                <td> <?php echo $user->email; ?></td>
                <td> <?php echo $user->active; ?></td>
                <td>
                    <?php if ($user->active == 1) { ?>
                        <a href="<?php echo base_url(); ?>user/deactivate/<?php echo $user->id; ?>">Deactivate</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>user/activate/<?php echo $user->id; ?>">Activate</a>
                    <?php } ?>
                </td>



            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

