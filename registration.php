<?php  include 'includes/db.php' ?>
<?php  include 'includes/header.php' ?>
<?php include 'config.php' ?>;

<?php

if ( isset( $_POST['submit'] ) ) {

    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if ( empty( trim( $user_name ) ) || empty( trim( $user_name ) ) || empty( trim( $user_password ) ) ||
    strlen( $user_password ) > 72 ) {

        $message = 'Fields cannot be empty';

    } else {

        $user_name = mysqli_real_escape_string( $connection, $user_name );
        $user_email = mysqli_real_escape_string( $connection, $user_email );
        $user_password = mysqli_real_escape_string( $connection, $user_password );

        $pwd_peppered = hash_hmac( 'sha256', $user_password, $pepper );
        $pwd_hashed = password_hash( $pwd_peppered, PASSWORD_BCRYPT );

        $query = 'INSERT INTO users(user_name, user_password, user_email) ';
        $query .= "VALUES('{$user_name}', '{$pwd_hashed}', '{$user_email}')";

        $register_user_query = mysqli_query( $connection, $query );

        if ( !$register_user_query ) {

            die( 'Query Failed'. mysqli_error( $connection ). mysqli_errno( $connection ) );
        }

        $message = 'Registration successed !';
    }
}

?>

<!-- Navigation -->

<?php  include 'includes/navigation.php';
?>

<!-- Page Content -->
<div class = 'container'>

    <section id = 'login'>
        <div class = 'container'>
            <div class = 'row'>
                <div class = 'col-xs-6 col-xs-offset-3'>
                        <div class = 'form-wrap'>
                            <h1>Register</h1>
                            
                            <form role = 'form' action = 'registration.php' method = 'post' id = 'login-form' autocomplete = 'off'>
                                <h4 class = 'text-center text-danger'><?php echo isset( $message ) ? $message : '' ?></h4>

                                <div class = 'form-group'>
                                    <label for = 'username' class = 'sr-only'>username</label>
                                    <input type = 'text' name = 'username' id = 'username' class = 'form-control' placeholder = 'Enter Desired Username'>
                                </div>

                                <div class = 'form-group'>
                                    <label for = 'email' class = 'sr-only'>Email</label>
                                    <input type = 'email' name = 'email' id = 'email' class = 'form-control' placeholder = 'somebody@example.com'>
                                </div>

                                <div class = 'form-group'>
                                    <label for = 'password' class = 'sr-only'>Password</label>
                                    <input type = 'password' name = 'password' id = 'key' class = 'form-control' placeholder = 'Password'>
                                </div>

                                <input type = 'submit' name = 'submit' id = 'btn-login' class = 'btn btn-custom btn-lg btn-block' value = 'Register'>
                            </form>

                        </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

<hr>

<?php include 'includes/footer.php';
?>
