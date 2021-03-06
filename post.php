<!-- Database -->
<?php
include "includes/db.php";
?> 

<!-- Header -->
<?php
include "includes/header.php";
?>

    <!-- Navigation -->
    
<?php
include "includes/navigation.php";
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
            
             <?php
                    // Get Post Details
                    if(isset($_GET['p_id'])) {
                        $post_id = $_GET['p_id'];
                    }
                
                    $view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = $post_id";
                    $send_query = mysqli_query($connection, $view_query);
                    
                         if (!$send_query) {

                             die( 'Query Failed'. mysqli_error( $connection ). mysqli_errno( $connection ) );
                        }
                
                
                   $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
                   $select_all_posts_query = mysqli_query($connection, $query);
                                        
                    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                       
                        $post_id  = $row['post_id'];
                        $post_category_id  = $row['post_category_id'];
                        $post_title   = $row['post_title'];
                        $post_author   = $row['post_author'];
                        $post_date   = $row['post_date'];
                        $post_image  = $row['post_image'];
                        $post_content   = $row['post_content'];
                        $post_tags   = $row['post_tags'];
                        $post_comment_count   = $row['post_comment_count'];
                        $post_status   = $row['post_status'];
                        $post_view_count   = $row['post_view_count'];

                   ?>
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content ?></p>

                <hr>

               
        <?php } ?>


                <!-- Blog Comments -->

        <?php

                
                if(isset($_POST['create_comment'])) {
                    print_r($_POST['create_comment']);
                        $the_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                   
                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";
                        $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'unapproved',now())";

                        $create_comment_query = mysqli_query($connection, $query);

                    if (!$create_comment_query) {
                        die('QUERY FAILED' . mysqli_error($connection));


            }
            
                      $query = "UPDATE posts set post_comment_count = post_comment_count + 1 ";    
                      $query .= "WHERE post_id = $the_post_id";
                        
                      $update_comment_count = mysqli_query($connection, $query);   
                        
                    if (!$update_comment_count) {
                        die('QUERY FAILED' . mysqli_error($connection));


            }    

        }         
                        
    }      
                                   
                
        ?>
                <!-- Comments Form -->
                
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form action="" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="create_comment" value="Publish Post">
                </div>
            </form>
        </div>
                
        <hr/>   
         
        <?php
                
            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
                
            $select_comment_query = mysqli_query($connection, $query);
            if(!$select_comment_query) {

                die('Query Failed' . mysqli_error($connection));
             }
            while ($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date   = $row['comment_date']; 
            $comment_content= $row['comment_content'];
            $comment_author = $row['comment_author'];                
                
        ?>  
                 
                       
          <!-- Comment -->
                <div class="">
                     
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;   ?>
                            <small><?php echo $comment_date;   ?></small>
                        </h4>
                        <?php echo $comment_content;   ?>
 
                    </div>
                </div>    
                
        <?php } ?>              

 </div>

            <!-- Blog Sidebar Widgets Column -->
            
<?php
include "includes/sidebar.php";
?>
            
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
<?php
include "includes/footer.php";
?>