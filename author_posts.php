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
                
                    if(isset($_GET['p_id'])) {
                        $post_id = $_GET['p_id'];
                        $post_author = $_GET['author'];
                    }
                
                   $query = "SELECT * FROM posts WHERE post_author = '{$post_author}'";
                   $select_all_posts_query = mysqli_query($connection, $query);
                
                        if (!$select_all_posts_query) {

                        die( 'Query Failed'. mysqli_error( $connection ).
                            mysqli_errno( $connection ) );
                    }

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
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead text-info">
                      All Posts by <?php echo $post_author ?>
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