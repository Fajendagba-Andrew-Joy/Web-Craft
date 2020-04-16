<?php
# This contain navbar details and its included in index.php file

?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">BimpsStore</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href=""><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
            <li style="top: 10px;"><input type="text" placeholder="Search BimpsStore" class="form-control" id="search"></li>
            <li style="left: 20px; top: 10px;"> <button class="btn btn-primary" id="search_btn">Search</button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="dropdown-toggle" data-toggle="dropdown" href="" id="cart_container"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                <div class="dropdown-menu" style="width: 380px;" id="console">
                    <div class="panel panel-success" id="pre">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-1">S/N</div>
                                <div class="col-md-3">Image</div>
                                <div class="col-md-4">Title</div>
                                <div class="col-md-3">Price in $.</div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="cart_product"></div>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>
            </li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span>
                        <?php echo 'Hi, '.$_SESSION['name']?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="cart.php" style="text-decoration: none; color: blue;">
                            <span class="glyphicon glyphicon-shopping-cart">Cart</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#" style="text-decoration: none; color: blue;">
                            Change Password</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php" style="text-decoration: none; color: blue;">
                            Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>