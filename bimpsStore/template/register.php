<?php

include ('./../config/db.php');

$f_name     = $_POST['fname'];
$l_name     = $_POST['lname'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$repassword = $_POST['repassword'];
$mobile     = $_POST['mobile'];
$address1   = $_POST['address1'];
$address2   = $_POST['address2'];
$name       = "/^[A-Z][a-zA-Z ]+$/";
$emailVal   = "/^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$mobileVal  = "/^[0-9]+$/";

$q = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
$r = mysqli_query($conn, $q);
$count_email = mysqli_num_rows($r);

if (empty($f_name) || empty($l_name) || empty($email) || empty($password) || 
        empty($repassword) || empty($mobile) || empty($address1) || 
        empty($address2)){?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b>Please fill all fields!</b>
    </div>
<?php exit();
} else if (!preg_match($name, $f_name)) {?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b><?php echo $f_name. " is not a valid first name!"?></b>
    </div>
    <?php 
} else if (!preg_match($name, $l_name)) {?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b><?php echo $l_name. " is not a valid last name!"?></b>
    </div>
<?php }
else if (!preg_match($emailVal, $email)) {?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b><?php echo $email. " is not a valid email address!"?></b>
    </div>
<?php }
else if (!preg_match($mobileVal, $mobile)) {?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b><?php echo $mobile. " is not a valid mobile number!"?></b>
    </div>
<?php }
else if ((strlen($password) < 9)|| strlen($repassword) < 9) {?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b>Password is weak</b>
    </div>
<?php }
else if ($password != $repassword) {?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b>Password does not match </b>
    </div>
<?php }
else if ($count_email > 0){?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" arial-label="close">
            &times;</a>
        <b><?php echo $email?> is registered already!<br>Try another email address.</b>
    </div>
    <?php exit();
} else {
    $password = md5($password);
    $q = "INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, "
            . "`email`, `password`, `mobile`, `address1`, `address2`) "
            . "VALUES (NULL, '$f_name', '$l_name', '$email', '$password', "
            . "'$mobile', '$address1', '$address2');";
    $r = mysqli_query($conn, $q);
    if ($r) {?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" arial-label="close">
                &times;</a>
            <b>Registration Successful</b>
        </div>
<?php } else {?>
     <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" arial-label="close">
                &times;</a>
            <b>Registration Failed</b>
        </div>
<?php }
}



?>
