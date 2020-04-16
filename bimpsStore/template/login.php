<?php
include ('./../config/db.php');

session_start();

if (isset($_POST['userLogin'])){
    $email    = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $password = md5($_POST['userPassword']);
    $q        = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
    $r        = mysqli_query($conn, $q);
    
    if (mysqli_num_rows($r) == 1) {
        $row = mysqli_fetch_array($r);
        $_SESSION['uid']  = $row['user_id'];
        $_SESSION['name'] = $row['first_name'];
        echo "true";
//        header('Location: profile.php');
    } else {
//        echo 'false';
        echo "
            
            <div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' arial-label='close'>
                    &times;</a>
                <b><h5>The email address or password that you've entered is incorrect. Sign up for an account or click on forgot password.</h5></b>
            </div>
            
            ";
    }
}

?>