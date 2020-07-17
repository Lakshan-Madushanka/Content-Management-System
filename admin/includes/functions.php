<?php

function query_confirm($result) {
    global $connection;
   if(!$result) {
            die("Query Failed" . mysqli_error($connection));
        } 
}


function insert_categories() {
    
    global $connection;
        
    if(isset($_POST['submit'])) {
                              
      $cat_title = $_POST['cat_title'];

      if($cat_title == " " || empty($cat_title)) {

          echo "This Field cannot be empty";
      }else {

      $query = "INSERT INTO category(cat_title) ";
      $query.= "values('${cat_title}')";  

      $create_category_query = mysqli_query($connection, $query);  

          if(!$create_category_query) {
              die("Query Failed" . mysqli_error($connection));
          }
      }
   }  
}

function find_all_categories() {

      global $connection;

       $query = "SELECT * FROM category";
       $select_categories_admin = mysqli_query($connection, $query);
        
       while($row = mysqli_fetch_assoc($select_categories_admin)) {

       $cat_title = ucfirst($row['cat_title']);
       $cat_id = $row['cat_id'];

         echo "<tr>";
         echo "<td>{$cat_id}</td>";
         echo "<td>{$cat_title}</td>";
         echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
         echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";

         echo "</tr>";

       } 

}


function delete_categories() {
       
     global $connection;

        if(isset($_GET['delete'])) {

            $delete_cat_id = $_GET['delete'];

            $query = "DELETE FROM category ";
            $query.= "where cat_id = {$delete_cat_id}";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");
        }
    
}








?>