<?php
# This contain navbar details and its included in index.php file
?>

<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">BimpsStore</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
            <li style="top: 10px;"><input type="text" placeholder="Search BimpsStore" class="form-control" id="search"></li>
            <li style="left: 20px; top: 10px;"> <button class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-backdrop" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
                <ul class="dropdown-menu">
                    <div style="width: 300px">
                        <div class="panel panel-info">
<!--                            style="font-size: 20px; background: #347ab6; 
                                 color: white;" -->                                 
                            <div class="panel-heading">
                                <p><strong>Login</strong></p>
                            </div>
                            <div class="panel-body">
                                <form action="login.php" method="post" role="form">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input class="form-control" id="email" 
                                               type="email" name="email" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Password</label>
                                        <input class="form-control" id="password" type="password" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-block" id="login">Submit</button>
                                    <button type="submit" class="btn btn-block" id="login">Forgot Password</button>
<!--                                    <a href="#" class="btn btn-primary" style="list-style: none;">
                                        Forgot Password
                                    </a>-->
<!--                                    <input type="submit" class="btn btn-success" 
                                           style="float: right; background: #347ab6; 
                                           border-color: #347ab6;" id="login" 
                                           value="Login">-->
                                </form>
                            </div>
                            <div class="panel-footer" id="e_msg">
                                <div class="row">
                                    <div class="col-md-12" id="login_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </li>
            <li><a href="../../bimpsStore/customer_registration.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
        </ul>
    </div>
</div>