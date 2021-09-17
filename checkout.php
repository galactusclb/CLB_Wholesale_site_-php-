<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/checkout.css">
    <?php
      $current_url="checkout.php";

      include 'navigation_bar.php';

      $uname = null;
      if ($_SESSION['username']) {
        $uname=$_SESSION['username'];
      }
    ?>
  </head>
  <body>
    <div class="main">
      <div class="section">
        <div class="div-billing-details">
          <form class="form-billing-details" action="item_process_controller.php" method="post">
            <input type="hidden" name="uname" value="<?php echo $uname ?>">

            <div class="form-leftside">
              <h3>Billing details</h3>
              <div class="form-row-left">
                <label>First name <span class="red-asterisk">*</span> </label>
                <input type="text" name="fname" value="" >
              </div>
              <div class="form-row-right">
                <label>Last name <span class="red-asterisk">*</span> </label>
                <input type="text" name="lname" value="" >
              </div>
              <div class="form-row-single">
                <label>Company name</label>
                <input type="text" name="" value="">
              </div>
              <div class="form-row-single">
                <label>Country <span class="red-asterisk">*</span></label>
                <input type="text" name="country" value="" >
              </div>
              <div class="form-row-single">
                <label>Street address <span class="red-asterisk">*</span></label>
                <input type="text" name="address" value="" placeholder="House number and street name" >
                <input type="text" name="" value="" placeholder="Apartment,suite,unit etc. (optional)">
              </div>
              <div class="form-row-single">
                <label>Town / City <span class="red-asterisk">*</span></label>
                <input type="text" name="town" value="" >
              </div>
              <div class="form-row-single">
                <label>Province <span class="red-asterisk">*</span></label>
                <input type="text" name="province" value="" >
              </div>
              <div class="form-row-left">
                <label>Phone <span class="red-asterisk">*</span> </label>
                <input type="text" name="phone" value="" >
              </div>
              <div class="form-row-right">
                <label>Email <span class="red-asterisk">*</span> </label>
                <input type="text" name="email" value="" >
              </div>
            </div>
            <div class="form-rightside">
              <h3>Your order(s)</h3>
              <table>
                <thead>
                  <tr>
                    <th class="th-left">Product</th>
                    <th class="th-right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $total=0;
                    foreach ($_SESSION['shopping_cart'] as $key => $items) {


                      $total+=$items['totcost'];

                      $current_tid= $items['Tid'] ;
                      $result=$mysqli->query("select * from wholesaleitem where Tid='$current_tid' ") or die($mysqli->error);
                      $data = $result->fetch_assoc();
                      ?>
                      <tr>
                        <td class="td-productName">
                          <input type="hidden" name="Tid[]" value="<?php echo $data['Tid'] ?>" readonly>
                          <?php echo $data['itemName'] ?>
                          <span class="mdi mdi-close"></span>
                          <input type="text" class="itemAmount" name="amount[]" value="<?php echo $items['amount'] ?>" readonly>
                        </td>
                        <td class="align-top">$ <input type="text"  name="cost[]" value="<?php echo $items['totcost']; ?>" readonly> </td>
                      </tr>
                    <?php } ?>
                  <tr>
                    <th>Subtotal</th>
                    <th>$ <input type="text" name="total" value="<?php echo $total ?>" readonly> </th>
                  </tr>
                  <tr>
                    <th class="th-shipping-head">Shipping</th>
                    <th class="th-shipping">
                      <div class="">
                        <input type="radio" name="shipping" value="" checked><label>Express shipping( +$10, Slimplex-Express, 3-5 working days)</label>
                      </div>
                      <div class="">
                        <input type="radio" name="shipping" value=""><label>Free shipping(5-12 working days)</label>
                      </div>
                    </th>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <th>$100</th>
                  </tr>
                </tbody>
              </table>
              <div class="div-creditcard">
                <div class="div-cards">
                  <label>Credit card</label>
                  <img src="https://shop.gancube.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg">
                  <img src="https://shop.gancube.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg" >
                  <img src="https://shop.gancube.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg" >
                  <img src="https://shop.gancube.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/discover.svg" >
                  <img src="https://shop.gancube.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/jcb.svg" >
                  <img src="https://shop.gancube.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/diners.svg" >
                </div>
                <div class="div-creditcard-details">
                  <div class="div-carddetails-singlerow">
                    <label>Card number <span class="red-asterisk">*</span></label>
                    <div class="div-cardnumber">
                      <input type="text" name="" value="" placeholder="1234">
                      <span><i class="far fa-credit-card"></i></span>
                    </div>
                  </div>
                  <div class="div-carddetails-2row">
                    <div class="div-carddetails-left">
                      <label>Expire date <span class="red-asterisk">*</span></label>
                      <input type="text" name="" value="" placeholder="Date">
                    </div>
                    <div class="div-carddetails-right">
                      <label>Card code (CVC) <span class="red-asterisk" >*</span></label>
                      <input type="text" name="" value="" placeholder="CVC">
                    </div>
                  </div>
                </div>
                <button type="submit" name="cartOrderAddBtn" onclick="return loginCheck()" >Place order</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
