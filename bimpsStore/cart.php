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
        <link rel="stylesheet" href="css/bimpsStyle.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">BimpsStore</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                </ul>
            </div>
        </div>
        
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="cart_msg">
                    <!--Cart Message-->
                </div>                
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Cart Checkout</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-1"><h5><b>S/N</b></h5></div>
                                <div class="col-md-1"><h5><b>Product Image</b></h5></div>
                                <div class="col-md-2"><h5><b>Product Name</b></h5></div>
                                <div class="col-md-2"><h5><b>Price in $</b></h5></div>
                                <div class="col-md-2"><h5><b>Quantity</b></h5></div>
                                <div class="col-md-2"><h5><b>Total</b></h5></div>
                                <div class="col-md-2"><h5><b>Action</b></h5></div>
                            </div>
                            <div id="cart_checkout"></div>                            
                        </div>                    
                        <div class="panel-footer">
<!--                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <b>Total $.5000</b>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>