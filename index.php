<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://kit.fontawesome.com/6bcee8e3da.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.5.95/css/materialdesignicons.min.css">

    <?php
        $current_url="index.php";

        include 'navigation_bar.php';
    ?>

  </head>
  <body>
    <div class="main">
      <div class="div-slidshow">
        <!-- <img src="img/sample-3.jpg" >
        <div class="div-slidshow-title">
          <h2>40% OFF</h2>
          <h4>on qled tv</h4>
          <a href="shopping.php">shop now</a>
        </div> -->
        <?php include 'with-jquery.php'; ?>
      </div>
      <div class="section">
        <div class="div-sale">
          <div class="div-sale-header">
            <h3>Best Discount</h3>
            <a href="shopping.php?discount=best">
              <div class="div-sale-seeMore">
                See More
              </div>
            </a>
          </div>
          <div class="div-sale-Products">
            <?php $result=$mysqli->query("select * from wholesaleitem where itemDiscount > 0 order by itemDiscount DESC limit 5") or die($mysqli->error);

              while ($row=$result->fetch_assoc()) {
                $cuurentTid=$row['Tid'];  ?>
                <a href="Order_item.php?Tid=<?php echo $cuurentTid ?>">
                  <div class="div-sale-Products-card">
                    <img src="<?php $result2=$mysqli->query("select * from product_imgs where Tid='$cuurentTid' ") or die($mysqli->error);
                                    $data = $result2->fetch_assoc();
                                    echo $data['img_dir'];
                                     ?>" >
                    <div class="div-sale-Products-card-details">
                      <h2><?php echo $row['itemName'] ?></h2>
                      <div class="div-product-prices">
                        <label><?php
                                  $discount=$row['itemDiscount'];
                                  echo $discount ?>% OFF
                        </label>
                        <strong>$<?php
                                    $itemPrice_string = $row['itemPrice'];
                                    $itemPrice_Array = explode(',', $itemPrice_string);

                                    $itemPrice_1=$itemPrice_Array[0];
                                    $tot=$itemPrice_1-($itemPrice_1*$discount)/100;
                                       echo $tot;  ?>
                        </strong>
                        <p>$<?php echo $itemPrice_1 ?></p>
                      </div>
                    </div>
                  </div>
                </a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="div-banners" >
          <div class="div-banners-card">
            <img src="img/banner-1.jpg" alt="">
            <div class="div-banners-card-details">
              <h4>the latest
                <br> & gratest</h4>
            </div>
          </div>
          <div class="div-banners-card">
            <img src="img/banner-2.jpg" alt="">
            <div class="div-banners-card-details">
              <h4>for
                <br>mommy & me</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="div-sale">
          <div class="div-sale-header">
            <h3>Popular Products</h3>
            <a href="shopping.php?selling=best">
              <div class="div-sale-seeMore">
                See More
              </div>
            </a>
          </div>
          <div class="div-sale-Products">
            <?php $result=$mysqli->query("select * from wholesaleitem where itemSold > 0 order by itemSold DESC limit 5") or die($mysqli->error);

              while ($row=$result->fetch_assoc()) {
                $cuurentTid=$row['Tid'];  ?>
                <a href="Order_item.php?Tid=<?php echo $cuurentTid ?>">
                  <div class="div-sale-Products-card">
                    <img src="<?php $result2=$mysqli->query("select * from product_imgs where Tid='$cuurentTid' ") or die($mysqli->error);
                                    $data = $result2->fetch_assoc();
                                    echo $data['img_dir'];
                                     ?>" >
                    <div class="div-sale-Products-card-details">
                      <h2><?php echo $row['itemName'] ?></h2>
                      <div class="div-product-prices">
                        <?php if ($row['itemDiscount']!=0) {   $discount=$row['itemDiscount']; ?>
                          <label>
                            <?php  echo $discount ?>  % OFF
                          </label>
                        <?php } ?>
                        <strong>$<?php
                                    $itemPrice_string = $row['itemPrice'];
                                    $itemPrice_Array = explode(',', $itemPrice_string);

                                    $itemPrice_1=$itemPrice_Array[0];
                                    $tot=$itemPrice_1-($itemPrice_1*$discount)/100;
                                       echo $tot;  ?>
                        </strong>
                        <p><?php if ($row['itemDiscount']!=0) {
                                          $discount=$row['itemDiscount'];
                                          echo "$$itemPrice_1" ; } ?></p>
                      </div>
                    </div>
                  </div>
                </a>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="section">
        <div class="div-category">
          <h3>Categories</h3>
          <div class="div-category-list">
            <?php for ($i=0; $i < 20; $i++) {  ?>
              <div class="div-category-card">
                <img src="img/products_img/25eed4107400b63f1b5550d0ece6ea0b.jpg" >
                <h5>Laptop</h5>
              </div>
          <?php  } ?>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
  var dis_iTid = JSON.parse(sessionStorage.getItem("added_iTid"));
  var dis_iamount = JSON.parse(sessionStorage.getItem("added_iamount"));
  var dis_itotcost = JSON.parse(sessionStorage.getItem("added_itotcost"));

  if (!dis_iTid.length || !Array.isArray(dis_iTid)) {
    document.getElementById("cartItemCount").innerHTML=0;
  }else{
    var count=dis_iTid.length;
    document.getElementById("cartItemCount").innerHTML=count;
  }
</script>
</html>
