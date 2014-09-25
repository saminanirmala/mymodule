<html>
    <head>

    </head>
    <body>
        <h1>Add Sub Page</h1>
        <form name="" method="POST">
            Sub Page:<input type="text" name="subpage"><br/>
            <label>Parent Page</label>
            <select name="pagename">
                <option id="0">-SELECT-</option>
                <?php foreach ($getallpage as $page): ?>
                    <option value="<?php echo $page->page_id; ?>"><?php echo $page->page_title; ?></option>



                <?php endforeach; ?>
            </select><br/>
            <input type="submit" name="submit" value="Add">
        </form>
    </body>
</html>