<?php

if ( isset( $_POST['checkBoxArray'] ) ) {

    //print_r( $_POST['checkBoxArray'] )

    foreach ( $_POST['checkBoxArray'] as $postValueId ) {

        $bulk_options = $_POST['bulk_options'];

        echo $bulk_options;

        switch( $bulk_options ) {

            case 'published':

            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";

            $update_to_published_status = mysqli_query( $connection, $query );

            query_confirm( $update_to_published_status );

            break;

            case 'draft':

            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}  ";

            $update_to_draft_status = mysqli_query( $connection, $query );
            query_confirm( $update_to_draft_status );

            break;

            case 'delete':

            $query = "DELETE FROM posts WHERE post_id = {$postValueId}  ";

            $update_to_delete_status = mysqli_query( $connection, $query );
            query_confirm( $update_to_delete_status );

            break;

            case 'clone':

            $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}' ";
            $select_post_query = mysqli_query( $connection, $query );

            while ( $row = mysqli_fetch_array( $select_post_query ) ) {
                $post_title         = $row['post_title'];
                $post_category_id   = $row['post_category_id'];
                $post_date          = $row['post_date'];

                $post_author        = $row['post_author'];
                $post_status        = $row['post_status'];
                $post_image         = $row['post_image'] ;

                $post_tags          = $row['post_tags'];

                $post_content       = $row['post_content'];

            }

            $query = 'INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_status) ';

            $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";

            $copy_query = mysqli_query( $connection, $query );

            if ( !$copy_query ) {

                die( 'QUERY FAILED' . mysqli_error( $connection ) );
            }

            break;

        }

    }

}

?>

<form action = '' method = 'post'>

<div class = 'row' style = 'margin-bottom: 20px'>

<div id = 'bulkOptionContainer' class = 'col-xs-4' >

<select class = 'form-control' name = 'bulk_options' name = 'bulk_options' id = 'select_bulk_option'>
<option value = ''>Select Options</option>
<option value = 'published'>Publish</option>
<option value = 'draft'>Draft</option>
<option value = 'delete'>Delete</option>
<option value = 'clone'>Clone</option>
</select>

</div>

<div class = 'col-xs-4'>

<input type = 'submit' name = 'submit' class = 'btn btn-success' id = 'apply_bulk_option' value = 'Apply'>
<a class = 'btn btn-primary' href = 'posts.php?source=1'>Add New</a>

</div>

</div>

<table class = 'table table-bordered table-hover'>

<thead>
<tr>
<th><input id = 'selectAllBoxes' type = 'checkbox'></th>

<th>Id</th>
<th>Author</th>
<th>Title</th>
<th>Category</th>
<th>Status</th>
<th>Image</th>
<th>Tags</th>
<th>Comments</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>

</tr>
</thead>
<tbody>
<?php

$query = 'SELECT * FROM posts';
$select_posts_admin = mysqli_query( $connection, $query );
query_confirm( $select_posts_admin );

while( $row = mysqli_fetch_assoc( $select_posts_admin ) ) {
    // echo 'iam here-';
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];

    echo '<tr>';

    ?>

    <td><input class = 'checkBoxes' type = 'checkbox' name = 'checkBoxArray[]'
    value = '<?php echo $post_id ?>'>
    </td>

    <?php

    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";

    // display category title accordingly  post_category_id
    $query = "SELECT cat_title FROM category WHERE cat_id = $post_category_id";
    $select_categories_admin = mysqli_query( $connection, $query );

    query_confirm( $select_categories_admin );

    if ( !mysqli_num_rows( $select_categories_admin ) ) {

        echo '<td>NULL</td>';

    } else {

        while( $row = mysqli_fetch_assoc( $select_categories_admin ) ) {

            $cat_title = ucfirst( $row['cat_title'] );

            echo "<td>{$cat_title}</td>";

        }

    }

    echo "<td>{$post_status}</td>";
    echo "<td><img style='width:65px;height:50px' src='./images/{$post_image}' alt='Post image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td><a href='posts.php?source=edit_posts&p_id={$post_id}'>edit</a></td>";

    echo "<td><a onClick = \"javascript: return confirm( 'Are you sure you want to delete this record');\" 
         href='posts.php?delete={$post_id}'>delete</a></td>";

    /* echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";
    */

    echo '</tr>';

}
?>
</tbody>
</table>

</form>

<!-- <?php

if ( isset( $_GET['delete'] ) ) {
    $post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$post_id}";

    $post_delete_query = mysqli_query( $connection, $query );

    query_confirm( $post_delete_query );

    header( 'Location: posts.php' );
}

?>-->