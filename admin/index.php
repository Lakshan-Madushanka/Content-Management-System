<!-- Database Connection -->   
    <?php include "includes/header.php"; ?>
    
    
    <?php 

        if(isset($_SESSION['user_role'])) {
            
            if($_SESSION['user_role'] === 'subscriber') {
                
                header("Location: ..index.php");
            }    
            
        }

    ?>

    <div id="wrapper">
       
       
        <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin <?php echo $_SESSION['username'] ?>
                            <small><?php echo $_SESSION['user_name'] ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php" ?>

