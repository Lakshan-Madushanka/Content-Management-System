<?php include "includes/header.php"; ?>

    <div id="wrapper">
          
        <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>
                                                  
                          <?php
                        
                            if(isset($_GET['source']))
                            {
                                $source = $_GET['source'];
                            }else {
                                $source = '';
                            }
                                
                                switch($source) {
                                        
                                        case 1;
                                        include "./includes/add_comments.php";
                                        break;
                                        
                                        case 'edit_posts';
                                        include "./includes/edit_comments.php";
                                        break;
                                        
                                        default:
                                        include "./includes/view_all_comments.php";
                                        break;
                                        
                                }
                            
                          ?>                          
                                                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  
   <?php include "includes/footer.php" ?>

