<!-- Database Connection -->   
    <?php include "includes/header.php"; ?>
    
    
    <?php 

        if(isset($_SESSION['user_role'])) {
            
            if($_SESSION['user_role'] === 'subscriber') {
                echo 'user_role';
                header("Location: ..index.php");
            }    
            
        }

    ?>
       
    

           
 <!-- Navigation -->
 
<?php include "includes/navigation.php"; ?>

    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin <?php echo $_SESSION['user_name'] ?>
                            <small><?php echo $_SESSION['user_name'] ?></small>
                        </h1>
                    </div>
                </div>
                
                
                
          <!-- /.row(Dashboard) -->
          
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                               <?php
    
                                    $query = "SELECT * FROM posts";
                                    $select_all_posts = mysqli_query($connection, $query);
                                    $posts_count = mysqli_num_rows($select_all_posts);
                                    echo  "<div class='huge'>".$posts_count."</div>" 
                                 ?>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="posts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                         <?php
    
                                $query = "SELECT * FROM comments";
                                $select_all_comments = mysqli_query($connection, $query);
                                $comments_count = mysqli_num_rows($select_all_comments);
                                
                               echo  "<div class='huge'>{$comments_count}</div>" 

                         ?>
                          <div>Comments</div>
                        </div>
                    </div>
                </div>
                <a href="comments.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                        
                         <?php
    
                                $query = "SELECT * FROM category";
                                $select_all_categories = mysqli_query($connection, $query);
                                $categories_count = mysqli_num_rows($select_all_categories);
                                
                               echo  "<div class='huge'>{$categories_count}</div>" 

                         ?>
                       <div>Categories</div>
                        </div>
                    </div>
                </div>
                <a href="categories.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
         <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                        
                        <?php
    
                                $query = "SELECT * FROM users";
                                $select_all_categories = mysqli_query($connection, $query);
                                $users_count = mysqli_num_rows($select_all_categories);
                                
                               echo  "<div class='huge'>{$users_count}</div>" 

                         ?>
                       <div>Users</div>
                        </div>
                    </div>
                </div>
                <a href="categories.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
          
    <!-- /.row(DashBoard) -->
           <?php
            
            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $select_all_published_draft_posts = mysqli_query($connection, $query);
            $post_published_count = mysqli_num_rows($select_all_published_draft_posts);                
            query_confirm($select_all_published_draft_posts);   
            
            $query = "SELECT * FROM posts WHERE post_status = 'draft'";
            $select_all_draft_posts = mysqli_query($connection, $query);
            $post_draft_count = mysqli_num_rows($select_all_draft_posts);                
            query_confirm($select_all_draft_posts);                      
                                   
            $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
            $select_all_unapproved_comments = mysqli_query($connection, $query);
            $unapproved_comments_count = mysqli_num_rows($select_all_unapproved_comments);                
            query_confirm($select_all_unapproved_comments);
                            
            $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
            $select_all_subscribe_users = mysqli_query($connection, $query);
            $subscribe_users_count = mysqli_num_rows($select_all_subscribe_users);                
            query_confirm($select_all_subscribe_users);
                                   
                                   
            ?>                       
           <!-- Admin Column chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          /*['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]*/
            
            ['Data', 'Count'],
        <?php
        
            
                                   
            $graph_text = ['All Posts', 'Published Posts', 'Draft Posts','Categories', 'Users','Subscribe Users', 'Comments', 'Unapproved Comments'];
            $graph_values = [$posts_count, $post_published_count, $post_draft_count, $categories_count ,$users_count, $subscribe_users_count, $comments_count, $unapproved_comments_count];
                                                         
            for($elm = 0; $elm < 7; $elm++) {                
                echo "['{$graph_text[$elm]}' , {$graph_values[$elm]}], ";
                //echo "['$graph_text[$elm]'" . "," . "{$graph_values[$elm]}],";

        } 
                            
                            
        ?>
        ]);
        
        
            
        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
            
            <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
             
              <!-- End of Admin Column chart -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php" ?>

