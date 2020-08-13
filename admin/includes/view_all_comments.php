<table class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>

                                  </tr>
                              </thead>
                              <tbody>
                                 <?php
                                  
                                   $query = "SELECT * FROM comments";
                                   $select_comments_admin = mysqli_query($connection, $query);

                                   while($row = mysqli_fetch_assoc($select_comments_admin)) {
                                       
                                        $comment_id          = $row['comment_id'];
                                        $comment_post_id     = $row['comment_post_id'];
                                        $comment_author      = $row['comment_author'];
                                        $comment_content     = $row['comment_content'];
                                        $comment_email       = $row['comment_email'];
                                        $comment_status      = $row['comment_status'];
                                        $comment_date        = $row['comment_date'];                  
                                      
                                    echo "<tr>";
                                    echo "<td>$comment_id </td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_content</td>";
                                    echo "<td>{$comment_email}</td>";
                                    echo "<td>{$comment_status}</td>";      
                                       
                                       // display post title accordingly  comment_post_id
                                       $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                       $select_posts_id_query = mysqli_query($connection, $query);
                                       
                                      if ( !mysqli_num_rows( $select_posts_id_query ) ) {

                                            echo '<td>NULL</td>';
                                          
                                        } else {

                                       while($row = mysqli_fetch_assoc($select_posts_id_query)) {
                                           $post_title = ucfirst($row['post_title']);
                                           $post_id = $row['post_id'];
                                           
                                           echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                            
                                            }
                                       }
                                                                            
                                     echo "<td>{$comment_date}</td>";
                                     echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";      
                                     echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";                   
                                     echo "<td><a href='comments.php?delete=$comment_id'>delete</a></td>";
                                     
                                       
                                    /* echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
                                     echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";*/

                                     echo "</tr>";
                                   }
                                  
                                  ?>
                              </tbody>
                          </table>
                          
                         <?php
                            
                            if(isset($_GET['delete'])) {
                                
                                $the_comment_id = $_GET['delete'];
                                
                                $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
                                
                                $comment_delete_query = mysqli_query($connection, $query);
                                
                                query_confirm($comment_delete_query);
                                
                                header("Location: comments.php");
                            }
    

                        ?>
                        
                       <?php
                            
                            if(isset($_GET['approve'])) {
                                
                                $query = "UPDATE comments SET comment_status = 'approved'" ;
                                $query.= "WHERE comment_id = {$_GET['approve']}";
                                
                                $approve_comment_query = mysqli_query($connection, $query);
                                
                                 query_confirm($approve_comment_query);
                                
                                 header("Location: comments.php");
                                
                                
                            }



                    ?>
                    
                   <?php
                            
                            if(isset($_GET['unapprove'])) {
                                
                                $query = "UPDATE comments SET comment_status = 'unapproved'" ;
                                $query.= "WHERE comment_id = {$_GET['unapprove']}";
                                
                                $unapprove_comment_query = mysqli_query($connection, $query);
                                
                                 query_confirm($unapprove_comment_query);
                                
                                 header("Location: comments.php");
                                
                                
                            }



                    ?>