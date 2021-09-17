<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wholesale-shopping</title>
    <link rel="stylesheet" href="css/shopping.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/6bcee8e3da.js"></script>

    <?php
      $item=null;
      $search=null;
      $discount = null;
      $selling = null;
      $rating=0;
      $current_url="shopping.php";

      include  'navigation_bar.php';

      if (isset($_GET['item'])) {
        $item=$_GET['item'];
      }
      if (isset($_GET['search'])) {
        $search=$_GET['search'];
      }
      if (isset($_GET['rating'])) {
        $rating=$_GET['rating'];
      }
      if (isset($_GET['discount'])) {
        $discount = $_GET['discount'];
      }
      if (isset($_GET['selling'])) {
        $selling = $_GET['selling'];
      }

      $result=null;
      //$mysqli =new mysqli('localhost','root','','WholesaleDB') or die(mysqli_error($mysqli));
      if (!isset($_GET['item']) && !isset($_GET['search']) && !isset($_GET['rating']) && !isset($_GET['discount']) && !isset($_GET['selling'])) {
        $result=$mysqli->query("select * from wholesaleitem") or die($mysqli->error);
      }else if(isset($_GET['item'])){
        $result=$mysqli->query("select * from wholesaleitem where itemType='$item' ") or die($mysqli->error);
      }else if(isset($_GET['rating'])){
        $result=$mysqli->query("select * from wholesaleitem where avgRating='$rating' ") or die($mysqli->error);
      }else if(isset($_GET['selling'])){
        $result=$mysqli->query("select * from wholesaleitem where itemSold > 0 order by itemSold DESC limit 50 ") or die($mysqli->error);
      }else if(isset($_GET['discount'])){
        if ($discount == 'best') {
          $result=$mysqli->query("select * from wholesaleitem where itemDiscount > 0 order by itemDiscount DESC  ") or die($mysqli->error);
        }else{
          $result=$mysqli->query("select * from wholesaleitem where itemDiscount > 0  ") or die($mysqli->error);
        }
      }else if(isset($_GET['search'])){
        $result=$mysqli->query("select * from wholesaleitem
                                WHERE (CONCAT(itemType, itemName) LIKE '%{$search}%')
                                OR (CONCAT(itemType, itemName) LIKE '{$search}%')  ") or die($mysqli->error);
      }

    ?>
  </head>
  <body>
    <div class="main">
      <div class="section">
        <div class="div-productNavigation">
          <h3>CATEGORIES</h3>
          <div class="div-category-burger" id="category_burger">
              <div class="burger-line"></div>
              <div class="burger-line"></div>
              <div class="burger-line"></div>
          </div>
          <div class="div-category" id="div_category">
            <div class="item-searchbar">
              <i class="fas fa-search" id="btn_search_second" ></i>
              <input class="" id="second_searchbar" type="text" placeholder="Search..">
            </div>
            <h5>Type</h5>
            <ul>
              <li><a href="shopping.php?item=Laptop">Laptop</a></li>
              <li><a href="shopping.php?item=Bag">Bag</a></li>
              <li><a href="shopping.php?item=Mobile phone">Mobile phone</a></li>
              <li><a href="shopping.php?item=Foods">Foods</a></li>
              <li><a href="shopping.php?search=Laptop">Gift</a></li>
              <li><a href="shopping.php?item=Laptop">Flower</a></li>
              <li><a href="shopping.php?item=Laptop">Sports</a></li>
              <li><a href="shopping.php?item=Laptop">Watches</a></li>
              <li><a href="shopping.php?item=Laptop">Toys</a></li>
              <li><a href="shopping.php?item=Clothes">Clothes</a></li>
            </ul>
            <h5>Rating</h5>
            <ul class="ul-rating">
              <?php
              for ($i=1; $i <= 5 ; $i++) {
                $x=6-$i; ?>
                <a href='shopping.php?rating=<?php echo $x ?> '><li>
                <?php
                for ($j=$i; $j <= 5; $j++) {
                  echo "<i class='fas fa-star' style='color:#ffc322' ></i>";
                }
                for ($k=1; $k < $i; $k++) {
                  echo "<i class='fas fa-star' style='color:#ccc'></i>";
                }
                echo " $x stars</li></a>";
              }
              ?>
              <a href="shopping.php"><li class="productNavigation_btn">Reset</li></a>
            </ul>
          </div>
        </div>
        <div class="div-saleItemList ">
          <div class="div-category border-1px-line-bottom">
            <?php if($item != null) { ?>
              <h3 id="product-title"><?php echo $item ?></h3>
            <?php }else if($search != null) { ?>
              <h3><?php echo "Search result for ' $search '" ?></h3>
            <?php } else { ?>
              <h3>All Product</h3>
            <?php } ?>
          </div>
          <div class="div-productlist">
          <?php
          if ($result->num_rows) {
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
                <?php //if ($row['itemDiscount'] != 0 ) { ?>
                <!--  <div class="div-offer">
                    <span>%</span>
                    <img src="img/tag-solid.png" >
                  </div> -->
                <?php //} ?>
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
            <?php }
          } else{
              echo "No result to display";
          }?>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
      $(document).ready(function(){
          $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $(".div-productlist .item-card").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
          });

          // $("#myInput").on("input", function(){
          //   $("#product-title").text($(this).val());
          // });
     });

     $("#btn_search_second").click(function() {
       var word = document.getElementById('second_searchbar').value
       $(location).attr('href', "shopping.php?search="+word);
     });

     var category_burger =document.getElementById("category_burger");
     var div_category = document.getElementById("div_category");

     category_burger.addEventListener("click",function(){
       div_category.classList.toggle("show_category");
     });

  </script>
</html>
