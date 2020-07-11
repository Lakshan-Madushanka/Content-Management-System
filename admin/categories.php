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
                        
                        <div class="col-xs-6">
                          
                           <!-- Insert category function -->
                           <?php insert_categories() ?>
                            
                           <!-- Add Category Form-->
                            <form action="" method="post" >
                                <div class="form-group">
                                   <label  for="cat_title">Add Category</label>
                                    <input id="cat_title" type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Add Category" name="submit">
                                </div>
                                
                            </form>
                            
                            <hr/>
                            
                            <!-- include update category -->
                            <?php include "includes/update_categories.php" ?>
                            
                        </div>
                       
                       <div class="col-xs-6">    
                       <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>Id</th>
                                   <th>Category Title</th>
                                   <th>Delete</th>
                                   <th>Update</th>
   
                               </tr>
                           </thead>
                           <tbody>
                             
                             <!--View All Categories -->
                              <?php find_all_categories() ?>
                                   
                               <!--Delete Categories -->
                              <?php delete_categories() ?>    
                                    
                           </tbody>
                       </table>
                       </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  
   <?php include "includes/footer.php"; ?>

