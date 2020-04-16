<?php

session_start();
if (!isset($_SESSION['uid'])) {
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BimpsStore</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bimpsStyle.php">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
    </head>
    <body>        
        <div class="container">
            <?php include ('./template/navProfile.php');?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class='list-group'>
                        
                        <div class='list-group-item-heading' id="getCategory"></div>
                        <div class='list-group-item-heading' id="getBrand"></div>
                        
                    </div>
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
