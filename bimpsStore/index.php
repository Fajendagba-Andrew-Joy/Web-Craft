<?php

session_start();
if (isset($_SESSION['uid'])) {
    header('location:profile.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BimpsStore</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bimpsStyle.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <?php include ('./template/navigation.php');?>
        <div class="container" class="panel-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div id="getCategory"></div>
                    <div id="getBrand"></div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12" id="product_msg"></div>
                    </div>
                    <?php include ('./template/productSection.php');?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        <div class="panel-footer">&copy; BimpsStore 2019</div>
    </body>
</html>
