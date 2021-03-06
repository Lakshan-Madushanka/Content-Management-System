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

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
               
                    if(isset($_GET['cat_id'])) {
                        $post_category_id = $_GET['cat_id'];
                        $the_cat_title = $_GET['cat_n'];
                    }
                
                   $query = "SELECT * FROM posts WHERE post_category_id = {$post_category_id}";
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
                        $post_views_count   = $row['post_views_count'];

                   ?>

                <h1 class="page-header">
                    Category
                    <small><?php echo $the_cat_title ?></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="image 1">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

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