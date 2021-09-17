<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/cart.css">
    <?php include 'navigation_bar.php' ;

    if ($_SESSION['username']) {
      $uname=$_SESSION['username'];
    }

    if(isset($_SESSION['cartSuccess'])){
      $cartSuccess=$_SESSION['cartSuccess'];

    }

    unset($_SESSION['cartSuccess']);

    ?>
  </head>
  <body>
    <div class="main">
      <div class="section">
        <div class="div-shoppincart">
          <h2 id="ff">shopping cart</h2>
          <?php if (empty($_SESSION['shopping_cart'])) { ?>
                <h3 >There are no more items in your cart</h3>
          <?php }else{
             ?>
                    <table>
                      <thead>
                        <tr>
                          <th class="td-display-none"></th>
                          <th></th>
                          <th>product</th>
                          <th>Amount</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                    <?php
                      $totalCost = 0;
                      foreach ($_SESSION['shopping_cart'] as $key => $items) { ?>
                        <tr>
                          <td class="td-close td-display-none">
                            <form class="" action="item_process_controller.php" method="post">
                              <input type="hidden" name="Tid" value="<?php echo $items['Tid'] ?>">
                              <button type="submit" class="close-btn" name="DeleteCartItem" ><span class="mdi mdi-close-circle-outline"></span></button>
                            </form>
                          </td>
                          <td class="tr-thumbnail">
                            <?php
                                $current_tid= $items['Tid'] ;
                                $result3=$mysqli->query("select * from product_imgs where Tid='$current_tid' ") or die($mysqli->error);

                                $data = $result3->fetch_assoc();
                                //echo "<a href='Order_item.php?Tid=$current_tid'><img src='{$data['img_dir']}' /></a>" ;
                             ?>
                             <a href='Order_item.php?Tid= <?php echo $current_tid ?>'><img src='<?php echo $data["img_dir"] ?>' /></a>
                          </td>
                          <td class="th-productName">
                            <?php
                              $result=$mysqli->query("select * from wholesaleitem where Tid='$current_tid' ") or die($mysqli->error);

                              $data = $result->fetch_assoc();

                              echo $data['itemName'];
                             ?>
                          </td>
                          <td><?php echo $items['amount']; ?></td>
                          <td>$<?php echo $items['totcost']; ?></td>
                        </tr>
                    <?php $totalCost += $items['totcost'];
                          } ?>
                        <tr>
                          <td id="checkoutBtn" class="td-colspan-button" colspan="4"> <a href="checkout.php">Proceed to checkout</a> </td>
                          <td class="td-totalCost">$<?php echo $totalCost; ?></td>
                        </tr>
                   </table>
          <?php } ?>

         <div class="continue-shopping">
          <a href="shopping.php">Continue Shopping</a>
         </div>
       </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">

  window.addEventListener('load', (event) => {
    if (screen.width < 850) {
      document.getElementById("checkoutBtn").colSpan =  3 ;
      //console.log('resized');
    }
    if (screen.width >= 850) {
      document.getElementById("checkoutBtn").colSpan =  4 ;
      //console.log('maximized');
    }
  });
    window.addEventListener('resize', (event) => {
      if (screen.width < 850) {
        document.getElementById("checkoutBtn").colSpan =  3 ;
        //console.log('resized');
      }
      if (screen.width >= 850) {
        document.getElementById("checkoutBtn").colSpan =  4 ;
        //console.log('maximized');
      }
    });

  </script>
</html>
