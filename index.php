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
                
                   $post_count_query = "SELECT * FROM posts";
                   $find_count = mysqli_query($connection, $query);
                   $count = mysqli_num_rows($find_count);
                
                    
                   $per_page = 1;        
                   $pages = ceil($count/$per_page);    
                
                    echo $pages;
                
                    $current_page = 1;
                
                    if(isset($_GET['page'])) {
                        
                        $current_page = $_GET['page'];
                        
                        $lower_page_limit = ($current_page * $per_page) - $per_page;
                        
                    } else {
                        
                        $lower_page_limit = 0;
                    }
                
                   $query = "SELECT * FROM posts ";
                   $query .= "ORDER BY post_id DESC limit {$lower_page_limit}, {$per_page}"; 
                
                   $select_all_posts_query = mysqli_query($connection, $query);
                                        
                    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                       
                        $post_id  = $row['post_id'];
                        $post_category_id  = $row['post_category_id'];
                        $post_title   = $row['post_title'];
                        $post_author   = $row['post_author'];
                        $post_date   = $row['post_date'];
                        $post_image  = $row['post_image'];
                        $post_content   = substr($row['post_content'],0,150);
                        $post_tags   = $row['post_tags'];
                        $post_comment_count   = $row['post_comment_count'];
                        $post_status   = $row['post_status'];
                        $post_views_count   = $row['post_view_count'];
                        
                        /*if($post_status != 'published') {
                            echo "<h1>No posts Found ! </h1>";
                        }*/

                   ?>
                   
                   
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>"><img class="img-responsive" src="images/<?php echo $post_image ?>" alt="image 1"></a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>"> Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

           <?php } ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            
<?php
include "includes/sidebar.php";
?>
            
        <!-- /.row -->

        <hr>

    <!-- pagination -->
      
      <ul class="pager">
          
          <?php
          
            for($i =1 ; $i<= $pages ; $i++) {
                
                if($current_page == $i) {
                    
                    echo "<li><a style='background-color:yellow' href='index.php?page={$i}'>{$i}</a></li>";

                } else {
                
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    
                }
                
            }
          
          
          ?>
          
          
      </ul>
       
       
        
         
         <!-- Footer -->
        
<?php
include "includes/footer.php";
?>