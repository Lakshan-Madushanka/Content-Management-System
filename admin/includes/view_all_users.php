<table class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                  </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  
                                   $query = "SELECT * FROM users";
                                   $select_comments_admin = mysqli_query($connection, $query);

                                   while($row = mysqli_fetch_assoc($select_comments_admin)) {
                                       
                                        $user_id             = $row['user_id'];
                                        $username            = $row['user_name'];
                                        $user_password       = $row['user_password'];
                                        $user_firstname      = $row['user_firstname'];
                                        $user_lastname       = $row['user_lastname'];
                                        $user_email          = $row['user_email'];
                                        $user_image          = $row['user_image'];
                                        $user_role           = $row['user_role'];                 
                                    
                                    echo "<tr>";
        
                                    echo "<td>$user_id </td>";
                                    echo "<td>$username</td>";
                                    echo "<td>$user_firstname</td>";   
                                    echo "<td>$user_lastname</td>";
                                    echo "<td>$user_email</td>";
                                    echo "<td>$user_role</td>"; 
                                                                              
                                     echo "<td><a href='users.php?delete={$user_id}'>delete</a></td>";
                                     echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                                     echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
                                    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";

                                     echo "</tr>";
                                   }
                                  
                                  ?>
                              </tbody>
                          </table>
                          
                         <?php
                            
                            if(isset($_GET['delete'])) {
                                
                                $the_user_id = $_GET['delete'];
                                
                                $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
                                
                                $user_delete_query = mysqli_query($connection, $query);
                                
                                query_confirm($user_delete_query);
                                
                                header("Location: users.php");
                            }
    

                        ?>                       
                            
                         <?php
                            
                            if(isset($_GET['change_to_admin'])) {
                                
                                $the_user_id = $_GET['change_to_admin'];
                                
                                $query = "UPDATE  users SET user_role = 'Admin' ";
                                $query .= "WHERE user_id = {$the_user_id}";
                                
                                $change_to_admin = mysqli_query($connection, $query);
                                
                                query_confirm($change_to_admin);
                                
                                header("Location: users.php");
                            }
    

                        ?>            

                         <?php
                            
                            if(isset($_GET['change_to_subscriber'])) {
                                
                                $the_user_id = $_GET['change_to_subscriber'];
                                
                                $query = "UPDATE  users SET user_role = 'Subscriber' ";
                                $query .= "WHERE user_id = {$the_user_id}";
                                
                                $change_to_subscriber = mysqli_query($connection, $query);
                                
                                query_confirm($change_to_subscriber);
                                
                                header("Location: users.php");
                            }
    

                        ?> 