<html>
    <head>

    </head>
    <body>
        <table border="1px solid black">
            <tr>
                <td>Pages</td>
            </tr>
             <?php foreach ($getallpage as $getpage): ?>
            <tr>
               
                    <td><?php echo $getpage['page_title']; ?></td>
                   
                    <?php foreach ($allsubpage as $subpage): ?>
                        <?php if ($subpage['parent_id'] == 1) { ?>
                            <?php echo $subpage['sub_page']; ?>
                        <?php } ?>
                    <?php endforeach; ?>
              
            </tr>
              <?php endforeach; ?>
        </table>
    </body>
</html>