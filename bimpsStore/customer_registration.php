<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <?php include ('./config/db.php');?>
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
                <div class="col-md-8" id="signup_msg"></div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Customer SignUp Form</div>
                        <div class="panel-body">
                            <form method="POST" action="javascript void(0)">
                                <div class="row">
                                    <?php 
                                    $q = "SELECT * FROM custreg";
                                    $r = mysqli_query($conn, $q);?>
                                    <?php if (mysqli_num_rows($r)>0){
                                        while ($row = mysqli_fetch_assoc($r)){
                                            $custdetails = $row['custdetails'];
                                            $custshow = $row['custshow'];
                                            $custfieldtype = $row['custfieldtype'];?>
                                            <div class="col-md-6">
                                                <label for="<?php echo $custdetails;?>"><?php echo $custshow;?></label>
                                                <input type="<?php echo $custfieldtype;?>" id="<?php echo $custdetails;?>" name="<?php echo $custdetails;?>" class="form-control">
                                            </div>
                                        <?php }
                                    }?>                                
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="float: right; width: 100%;" value="Sign Up" type="button" id="signup_button" name="signup_button" class="btn btn-primary btn-lg">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer text-warning">All fields are required</div>
                    </div>                    
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>