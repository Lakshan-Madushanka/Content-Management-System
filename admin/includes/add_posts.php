 <form action="" method="post" enctype="multipart/form-data">    
        
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="post_title">
      </div>

       <!--<div class="form-group">
           <label for="post_category">Post Category Id</label>
       <input type="text" class="form-control" name="post_category_id">
      
      </div>-->

      <div class="form-group">
        
        <label for="post_category">Post Category</label>
           <select name="post_category" id="post_category" class="form-control">
              <?php
    
               $query = "SELECT * FROM category";
               $select_categories_admin = mysqli_query($connection, $query);
                 
                 query_confirm($select_categories_admin);
                     
               while($row = mysqli_fetch_assoc($select_categories_admin)) {

                   $cat_title = ucfirst($row['cat_title']);
                   $cat_id = $row['cat_id'];
                  
                   echo "<option value='$cat_id'>$cat_title</option>";
                   
                }
                   
              ?>       
           </select>
       </div>
       
       <div class="form-group">
           <label for="post_category">Post Author</label>
       <input type="text" class="form-control" name="post_author">
       </div>
      <!-- <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div> -->   

       <!--<div class="form-group">
           <label for="post_status">Post Author</label>
       <input type="text" class="form-control" name="post_status">
       </div>-->
       <div class="form-group">       
            <label for="post_status">Post Status</label>
              <select name="post_status" id="post_status" class="form-control">
                <option value='draft'>Draft</option>";
                <option value='published'>Publish</option>";             
           </select>
           
    </div>
       
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="post_content_editor" cols="30" rows="10">
         </textarea>
         
         <script src="./js/ckeditor/ckeditor.js">
          // Adding cke editor to the text area
          </script>
             <script>
                CKEDITOR.replace( 'post_content_editor' );
             </script>
 
      </div>
      
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>


</form>


<?php
    if(isset($_POST['create_post'])) {
        
            $post_title        = $_POST['post_title'];
            $post_user         = $_POST['post_author'];
            $post_category_id  = $_POST['post_category'];
            $post_status       = $_POST['post_status'];
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
        
            $post_tags         = $_POST['post_tags'];
            $post_content      = $_POST['post_content'];
            //$post_date         = date('d-m-y');

       
        move_uploaded_file($post_image_temp, "../images/$post_image" );
       
       
      $query = "INSERT INTO posts(post_category_id, post_status, post_title, post_author, post_date,post_image,post_content,post_tags) ";
             
      $query .= "VALUES({$post_category_id}, '{$post_status}' , '{$post_title}', '{$post_user}', now(), '{$post_image}', '{$post_content}', '{$post_tags}') ";    
        
        $create_post_query = mysqli_query($connection, $query);
        
        query_confirm($create_post_query);
    }

?>