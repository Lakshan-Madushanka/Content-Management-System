  <?php

         if(isset($_POST['update_category'])) {
            $cat_id = $_GET['edit'];
            $cat_title = $_POST['cat_title']  ;

            $query = "UPDATE category set cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
            $update_category_from_id = mysqli_query($connection, $query);

             if(!$update_category_from_id) {

                 die("Query Failed" . mysqli_error($connection));
             }
         }
        ?>
    <?php

    if(isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];

        $query = " SELECT * FROM category WHERE cat_id = {$cat_id}";
        $select_category_from_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_category_from_id)) {
            $cat_title = $row['cat_title'];

    ?>
        
         <!-- Update Category Form-->
        <form action="" method="post" >
            <div class="form-group">
               <label  for="cat_title">Update Category</label>
                <input id="cat_title" type="text" class="form-control" name="cat_title" 
                value="<?php echo (isset($cat_title)) ? $cat_title : null; ?>" >
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Update Category" name="update_category">
            </div>
        </form>

       <?php } }?>
                               
                              