<html>
    <head>

    </head>
    <body>
        <h1>All Page View </h1>
        <a href="<?php echo base_url(); ?>page/add">Add new</a>
        <table border="1px solid black">
            <tr>
                <td>Page Title </td>
                <td> Page Description</td>
                <td> Meta Data</td>
                <td> Meta Description</td>
                <td>Image</td>
                <td>Added Date</td>
                <td>order</td>
                <td colspan="2">Action</td>

            </tr>
            <?php foreach ($getallpage as $pages): ?>
                <tr>

                    <td><?php echo $pages['page_title']; ?></td>
                    <td><?php echo $pages['page_description']; ?></td>
                    <td><?php echo $pages['meta_data']; ?></td>
                    <td><?php echo $pages['meta_description']; ?></td>
                    <td><?php echo $pages['image']; ?></td>
                    <td><?php echo $pages['added_date']; ?></td>
                    <td><?php echo $pages['order']; ?></td>
                    <td><a href="<?php echo base_url(); ?>page/edit/<?php echo $pages['page_id']; ?>">Edit</a> </td>
                    <td><a href="<?php echo base_url(); ?>page/delete/<?php echo $pages['page_id']; ?>">Delete</a> </td>

                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>