<html>
    <head>

    </head>
    <body>
        <table border="1px solid black">
            <tr>
                <td>Pages</td>
            </tr>
              <?php foreach ($allsubpage as $subpage): ?>
            <tr>
                   
                        <?php if ($subpage['parent_id'] == 1) { ?>
                            <?php echo $subpage['sub_page']; ?>
                        <?php } ?>
                  
              
            </tr>
              <?php endforeach; ?>
        </table>
    </body>
</html>