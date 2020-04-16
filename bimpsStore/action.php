<?php 
session_start();
include ('./config/db.php');
if (isset($_POST['category'])) {
    $q = "SELECT * FROM categories";
    $r = mysqli_query($conn, $q);?>
    <div class="nav nav-pills nav-stacked">
        <li class="active"><a href="#"><h4>Computers</h4></a></li>
    <?php if (mysqli_num_rows($r)>0){
        while ($row = mysqli_fetch_assoc($r)){
            $cid = $row['cat_id'];
            $cNme = $row['cat_title'];?>
        <li><a href="#" class="category list-group-item" cid="<?php echo $cid;?>"><?php echo $cNme;?></a></li>
        <?php }
    }?>
    </div>
<?php }
if (isset($_POST['brand'])) {
    $q = "SELECT * FROM brands";
    $r = mysqli_query($conn, $q);?>
    <div class="nav nav-pills nav-stacked">
        <li class="active"><a href="#"><h4>Trade</h4></a></li>
    <?php if (mysqli_num_rows($r)>0){
        while ($row = mysqli_fetch_assoc($r)){
            $bid = $row['brand_id'];
            $bNme = $row['brand_title'];?>
            <li><a href="#" class="brand list-group-item" bid="<?php echo $bid?>"><?php echo $bNme;?></a></li>
        <?php }
    }?>
    </div>
<?php }

if (isset($_POST['page'])) {
    $q      = "SELECT * FROM products";
    $r      = mysqli_query($conn, $q);
    $count  = mysqli_num_rows($r);
    $pageno = ceil($count/9);
    for($i=1;$i<=$pageno;$i++) {
        echo "
            <li><a href='#' page='$i' id='page'>$i</a></li>
        ";
    }
}

if (isset($_POST['getProduct'])) {
    $limit = 9;
    if (isset($_POST['setPage'])){
        $pageno = $_POST['pageNumber'];
        $start  = ($pageno * $limit) - $limit;
    }else {
        $start = 0;
    }
//    $q = "SELECT * FROM products ORDER BY RAND() LIMIT $start,$limit";
    $q = "SELECT * FROM products LIMIT $start,$limit";
    $r = mysqli_query($conn, $q);
    if (mysqli_num_rows($r) > 0) {
        include ('./template/productDisplay.php');
    }
}

if (isset($_POST['getSelectedCategory']) || isset($_POST['getSelectedBrand']) || isset($_POST['search'])){
    
    if (isset($_POST['getSelectedCategory'])){
        $id = $_POST['cat_id'];
//        $q   = "SELECT * FROM products WHERE product_cat = '$id' ORDER BY RAND() LIMIT 0,9";
        $q   = "SELECT * FROM products WHERE product_cat = '$id' LIMIT 0,9";
    } else if(isset($_POST['getSelectedBrand'])){
        $id = $_POST['brand_id'];
//        $q   = "SELECT * FROM products WHERE product_brand = '$id' ORDER BY RAND() LIMIT 0,9";
        $q   = "SELECT * FROM products WHERE product_brand = '$id' LIMIT 0,9";
    } else {
        $keyword = $_POST['keyword'];
        $q   = "SELECT * FROM products WHERE product_desc LIKE '%$keyword%'";
    }
    
    $r   = mysqli_query($conn, $q);
    include ('./template/productDisplay.php');
    
}

if (isset($_POST['addToProduct']) && isset($_SESSION['uid'])) {
    $p_id    = $_POST['proId'];
    $user_id = $_SESSION['uid'];
    $q       = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
    $r       = mysqli_query($conn, $q);
    
    if (mysqli_num_rows($r) > 0) {
        $row = mysqli_fetch_array($r);
        $p_t = $row['product_title'];
        echo "
            
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' arial-label='close'>
                    &times;</a>
                <b><h5>$p_t</h5> <h6>is in your cart already! Select another product or increase the number</h6></b>
            </div>
            
            ";
        
    } else {
        $q   = "SELECT * FROM products WHERE product_id = '$p_id'";
        $r   = mysqli_query($conn, $q);
        $row = mysqli_fetch_array($r);
        $tit = $row['product_title'];
        $pid = $row['product_id'];
        $pig = $row['product_image'];
        $pri = $row['product_price'];
        $q   = "INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, "
                . "`product_title`, `product_image`, `qty`, `price`, "
                . "`total_amount`) VALUES (NULL, '$p_id', '0', '$user_id', "
                . "'$tit', '$pig', '1', '$pri', '$pri');";
        if (mysqli_query($conn, $q)) {
            echo "
            
                <div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' arial-label='close'>
                        &times;</a>
                    <b>Product Added!</b>
                </div>
            
            ";
        }
    }
} else if (isset($_POST['addToProduct']) && !isset($_SESSION['uid'])){    
    echo "
            
        <div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>
                &times;</a>
            <b>You need to Signin to use this feature!</b>
        </div>
            
        ";    
}

if (isset($_POST['get_cart_product']) || isset($_POST['cart_checkout'])) {
    $u_id = $_SESSION['uid'];
    $q    = "SELECT * FROM cart WHERE user_id = '$u_id'";
    $r    = mysqli_query($conn, $q);
    
    if (mysqli_num_rows($r) > 0) {
        $no         = 1;
        $total_amt  = 1;
        while ($row = mysqli_fetch_array($r)) {
            $id         = $row['id'];
            $pro_id     = $row['p_id'];
            $pro_name   = $row['product_title'];
            $pro_image  = $row['product_image'];
            $qty        = $row['qty'];
            $pro_price  = $row['price'];
            $total      = $row['total_amount'];
            $priceArray = array($total);
            $total_sum  = array_sum($priceArray);
            $total_amt  = $total_amt + $total_sum;
            
            if (isset($_POST['get_cart_product'])) {?>
                <div class="row">
                    <hr style="height: 1px; background-color: #dff0d8;">
                    <div class="col-md-1"><?php echo $no;?></div>
                    <div class="col-md-3">
                        <video oncontextmenu="return false;" controls 
                               style="width: 60px; height: 50px;" 
                               src="../../bimpsStore/pdtImg/<?php echo $pro_image;?>">
                        </video>
                    </div>
                    <div class="col-md-4" style="height: 80px; width: 150px;"><?php echo $pro_name;?></div>
                    <div class="col-md-3"><?php echo '$.'.$pro_price.'.00';?></div>
                </div>
            <?php 
                $no = $no+1;
            }else {?>
                <div class="row">
                    <hr style="height: 1px; background-color: #dff0d8;">
                    <div class="col-md-1"><?php echo $no;?></div>
                    <div class="col-md-1">
                        <video oncontextmenu="return false;" controls 
                               style="width: 70px; height: 60px;" 
                               src="../../bimpsStore/pdtImg/<?php echo $pro_image;?>">
                        </video>
                    </div>
                    <div class="col-md-2"><?php echo $pro_name;?></div>
                    <div class="col-md-2">
                        <input type="text" class="form-control qty" 
                               pid="<?php echo $pro_id?>" 
                               id="price-<?php echo $pro_id?>" 
                               value="<?php echo $pro_price;?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control qty" 
                               pid="<?php echo $pro_id?>" 
                               id="qty-<?php echo $pro_id?>" 
                               value="<?php echo $qty;?>">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control qty" 
                               pid="<?php echo $pro_id?>" 
                               id="total-<?php echo $pro_id?>" 
                               value="<?php echo '$.'.$total.'.00';?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a href="#" remove_id="<?php echo $pro_id?>" 
                               class="btn btn-danger remove">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                            <a href="#" update_id="<?php echo $pro_id?>" 
                               class="btn btn-primary update">
                                <span class="glyphicon glyphicon-ok-sign"></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php $no = $no+1;}
        }
         if (isset($_POST['cart_checkout'])) {?>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <h4><b><?php echo 'Total: $.'.$total_amt.'.00';?></b></h4>
                    </div>
                </div>
            <?php } 
    }
}

if (isset($_POST['cart_count'])) {
    $u_id = $_SESSION['uid'];
    $q    = "SELECT * FROM cart WHERE user_id = '$u_id'";
    $r    = mysqli_query($conn, $q);
    echo mysqli_num_rows($r);
}

if (isset($_POST['remove_from_cart'])) {
    $pid = $_POST['remove_id'];
    $uid = $_SESSION['uid'];
    
    $q   = "DELETE FROM cart WHERE user_id = '$uid' AND p_id = '$pid'";
        $r   = mysqli_query($conn, $q);
        if ($r) {
            echo "

                <div class='alert alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' arial-label='close'>
                        &times;</a>
                    <b><h6>Product removed!</h6></b>
                </div>

                ";
        }
}
if (isset($_POST['updateProduct'])) {
    $pid = $_POST['updateId'];
    $uid = $_SESSION['uid'];
    $qty    = $_POST['qty'];
    $price  = $_POST['price'];
    $total  = $_POST['total'];

    $q   = "UPDATE cart SET qty='$qty',price='$price',total_amount='$total' WHERE user_id='$uid' AND p_id='$pid'";
    $r   = mysqli_query($conn, $q);
    if ($r) {
        echo "

            <div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' arial-label='close'>
                    &times;</a>
                <b><h6>Product updated!</h6></b>
            </div>

            ";
    }
}

?>