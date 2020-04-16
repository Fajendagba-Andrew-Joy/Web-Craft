<?php

while($row = mysqli_fetch_assoc($r)) {
    $p_title = $row['product_title'];
    //$p_title = substr(strip_tags($p_title1), 0, 23);
    $p_image= $row['product_image'];
    $pro_id = $row['product_id'];
    $p_price= $row['product_price'];?>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading" style="height: 80px;"><?php echo $p_title?></div>
            <div class="panel-body">
                <!--<img style="width: 160px; height: 150px;" src="../../bimpsStore/pdtImg/rabbit Sell.JPG">-->
                <video oncontextmenu="return false;" controls style="width: 180px; height: 120px;" src="../../bimpsStore/pdtImg/<?php echo $p_image;?>"></video>
                <!--<img src="../test2/pdtImg/rabbit Sell.JPG">-->
            </div>
            <div class="panel-footer"><?php echo "$.". $p_price.".00"?>
                <button pid="<?php echo $pro_id?>" id="product" style="float: right; background: #347ab6; border-color: #347ab6;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-shopping-cart"></i></button>
            </div>
        </div>
    </div>
<?php }