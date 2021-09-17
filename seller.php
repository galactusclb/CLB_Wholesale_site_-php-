<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wholesale -seller Home</title>
    <link rel="stylesheet" href="css/shopping.css">

    <?php
      include 'navigation_bar.php' ;

      if (isset($_GET['sellerId'])) {
        $sellerId=$_GET['sellerId'];
        $result=null;

        $result=$mysqli->query("select * from wholesaleitem where sellerId='$sellerId' ") or die($mysqli->error);
      }else {

      }
    ?>
  </head>
  <body>
    <?php  ?>
    <div class="main">
      <div class="section border-1px-line-top">
        <?php if (!isset($_GET['sellerId']) || $_GET['sellerId']=="") { ?>
          <h1>Something wrong!Can't find Seller!</h1>
      <?php } else{ ?>
        <div class="div-productNavigation">
          <h3>ALL CATEGORIES</h3>
          <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
          <ul>
            <li><a href="shopping.php?item=Laptop">Laptop</a></li>
            <li><a href="shopping.php?item=Bag">Bag</a></li>
            <li><a href="shopping.php?item=Mobile phone">Mobile phone</a></li>
            <li><a href="shopping.php?item=Foods">Foods</a></li>
            <li><a href="shopping.php?item=Laptop">Gift</a></li>
            <li><a href="shopping.php?item=Laptop">Flower</a></li>
            <li><a href="shopping.php?item=Laptop">Sports</a></li>
            <li><a href="shopping.php?item=Laptop">Watches</a></li>
            <li><a href="shopping.php?item=Laptop">Toys</a></li>
            <a href="shopping.php"><li class="productNavigation_btn">Reset</li></a>
          </ul>
        </div>
        <div class="div-saleItemList ">
          <div class="div-category border-1px-line-bottom">
              <h3>All Products from <?php echo $sellerId ?></h3>
          </div>
          <div class="div-productlist">
          <?php
          while ($row = $result->fetch_assoc()) {
            $current_tid=$row['Tid'];

            $itemPrice_string = $row['itemPrice'];
            $itemPrice_Array = explode(',', $itemPrice_string);

             $itemPrice_1=$itemPrice_Array[0];
             $itemPrice_2=$itemPrice_Array[1];
             $itemPrice_3=$itemPrice_Array[2];
             $itemPrice_4=$itemPrice_Array[3];

            ?>
            <div class="item-card">
              <div class="item-card-img">
              <!--  <img src="<?php //echo $row['itemImg'] ?>" > -->
              <?php
              $result3=$mysqli->query("select * from product_imgs where Tid='$current_tid' ") or die($mysqli->error);

              //while(
                $data = $result3->fetch_assoc();
              //){
                echo "<img src='{$data['img_dir']}'/>" ;
              //}
               ?>
              </div>
              <div class="item-card-details">
                <div class="div-product-title">
                  <h1><?php echo $row['itemName'] ?></h1>
                </div>
                <div class="div-product-prices">
                  <?php if ($row['itemDiscount'] != 0 ) { ?>
                    <label>
                      <?php echo $row['itemDiscount'] ?>% OFF
                    </label>
                  <?php } ?>
                    <p><strong>$<?php echo $itemPrice_4 ?> - <?php echo $itemPrice_1 ?> </strong> / Piece</p>
                </div>
                <p hidden><?php echo $row['itemType'] ?></p>
                <div class="div-product-quantity">
                  <label>Quantity </label>
                  <p><?php echo $row['itemQuantity'] ?></p>
                  <label>Sold </label>
                  <p><?php echo $row['itemSold'] ?></p>
                </div>
                <div class="div-product-rating">
                  <?php
                    $rate=0;
                    $tot_rid=0;
                    $rate_tot=0;

                    $result2=$mysqli->query("select sum(rating) as total_rating,count(Rid) as total_Rid from reviewitem where Tid='$current_tid'") or die($mysqli->error);
                    while ($row2 = $result2->fetch_assoc()) {
                      $rate_tot=$row2['total_rating'];
                      $tot_rid=$row2['total_Rid'];
                    }
                    if($tot_rid!=0){
                      $rate=$rate_tot/$tot_rid;
                      $rate=round($rate);
                    }else {
                      $rate=0;
                    }
                  ?>
                  <span>
                    <?php
                    for ($i=0; $i < $rate; $i++) {
                      echo "<i class='fas fa-star' style='color:#ffc322' ></i>";
                     }
                     for ($i=0; $i < (5-$rate) ; $i++) {
                       echo "<i class='fas fa-star' style='color:#ccc'></i>";
                     }
                       ?>

                  </span>
                </div>
                <div class="a-shopping-cart">
                  <a href="Order_item.php?Tid=<?php echo $row['Tid'] ?>">
                    Order Now
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </body>
</html>
