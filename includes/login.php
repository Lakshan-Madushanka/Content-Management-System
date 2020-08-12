<?php include 'db.php' ?>
<?php include '../config.php' ?>;

<?php  session_start() ?>

<?php

if ( isset( $_POST['login'] ) ) {

    $user_name = mysqli_real_escape_string( $connection, $_POST['username'] );
    $user_password = mysqli_real_escape_string( $connection, $_POST['password'] );

    if ( empty( trim( $user_name ) ) || empty( $user_password ) ) {
        return;
    }

    $query = "SELECT * FROM users WHERE user_name = '$user_name' ";
    //$query .= "AND user_passsword = '$user_password'";

    $login_query = mysqli_query( $connection, $query );

    if ( !$login_query ) {
        die( 'Query failed'. mysqli_error( $connection ) );
    }

    while( $row = mysqli_fetch_assoc( $login_query ) ) {

        $db_user_id = $row['user_id'];
        $db_username = $row['user_name'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

    }

    $pwd_peppered = hash_hmac( 'sha256', $user_password, $pepper );
    $user_password = password_hash( $pwd_peppered, PASSWORD_BCRYPT );

    if ( $db_username ===  $user_name ) {

        if ( password_verify( $pwd_peppered, $user_password ) ) {

            $_SESSION['user_name'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;

            header( 'Location: ../admin' );

        }

    } else {

        header( 'Location: ../index.php' );
    }

}

?>