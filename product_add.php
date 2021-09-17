<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wholesale-Home</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/item_add.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
  <body>
    <?php  require_once 'item_process_controller.php';
     include  'navigation_bar.php';

      if(!isset($_SESSION['username'])){
        header("Location: login.php");
      }

    ?>
    <div class="main">
      <div class="section">
        <div class="div-item-add-form">
          <h4>Item Add</h4>
          <form class="" action="item_process_controller.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="sellerId" value="<?php echo $_SESSION['username'] ?>">
            <label>Item name</label>
            <input type="text" name="itemName" value="" required>
            <label>Item Image</label>
            <input type="file" name="userfile[]" value="" multiple="">
            <label>Item type</label>
            <select class="" name="itemType" required>
                <option disabled selected style="display:none"> -- select an option -- </option>
                <option value="Clothes">Clothes</option>
                <option value="Bag">Bag</option>
                <option value="Mobile phone">Mobile phone</option>
                <option value="Laptop">Laptop</option>
                <option value="Foods">Foods</option>
            </select>
            <br>
            <div class="div-addPrice">
              <div class="div-addPrice-title">
                <label>Add wholesale price </label>
              </div>
              <div class="div-addPrice-details">
                 <div class="div-addPrice-card">
                    <label>price 1</label>
                    <div class="">
                      <i class="fas fa-minus" id="amount_minus1" onclick="amount_minus('itemPrice_1','amount_minus1')"></i>
                      <input type="number" id="itemPrice_1" name="itemPrice_1" value="12" required>
                      <i class="fas fa-plus" id="amount_plus1" onclick="amount_plus('itemPrice_1','amount_plus1')"></i>
                    </div>
                    <label>Item Range 1</label>
                    <div class="">
                      <i class="fas fa-minus" id="amount_minus1_r" onclick="amount_minus('itemRange_1','amount_minus1_r')"></i>
                        <input type="number" id="itemRange_1" name="itemRange_1" value="12" required>
                      <i class="fas fa-plus" id="amount_plus1_r" onclick="amount_plus('itemRange_1','amount_plus1_r')"></i>
                    </div>
                 </div>
                 <div class="div-addPrice-card">
                    <label>price 2</label>
                    <div class="">
                      <i class="fas fa-minus" id="amount_minus2" onclick="amount_minus('itemPrice_2','amount_minus2')"></i>
                        <input type="number" id="itemPrice_2" name="itemPrice_2" value="12" required>
                      <i class="fas fa-plus" id="amount_plus2" onclick="amount_plus('itemPrice_2','amount_plus2')"></i>
                    </div>
                    <label>Item Range 2</label>
                    <div class="">
                      <i class="fas fa-minus" id="amount_minus2_r" onclick="amount_minus('itemRange_2','amount_minus2_r')"></i>
                        <input type="number" id="itemRange_2" name="itemRange_2" value="12" required>
                      <i class="fas fa-plus" id="amount_plus2_r" onclick="amount_plus('itemRange_2','amount_plus2_r')"></i>
                    </div>
                 </div>
                 <div class="div-addPrice-card">
                  <label>price 3</label>
                  <div class="">
                    <i class="fas fa-minus" id="amount_minus3" onclick="amount_minus('itemPrice_3','amount_minus3')"></i>
                      <input type="number" id="itemPrice_3" name="itemPrice_3" value="12" required>
                    <i class="fas fa-plus" id="amount_plus3" onclick="amount_plus('itemPrice_3','amount_plus3')"></i>
                  </div>
                  <label>Item Range 3</label>
                  <div class="">
                    <i class="fas fa-minus" id="amount_minus3_r" onclick="amount_minus('itemRange_3','amount_minus3_r')"></i>
                      <input type="number" id="itemRange_3" name="itemRange_3" value="12" required>
                    <i class="fas fa-plus" id="amount_plus3_r" onclick="amount_plus('itemRange_3','amount_plus3_r')"></i>
                  </div>
                 </div>
                 <div class="div-addPrice-card">
                  <label>price 4</label>
                  <div class="">
                    <i class="fas fa-minus" id="amount_minus4" onclick="amount_minus('itemPrice_4','amount_minus4')"></i>
                      <input type="number" id="itemPrice_4" name="itemPrice_4" value="12" required>
                    <i class="fas fa-plus" id="amount_plus4" onclick="amount_plus('itemPrice_4','amount_plus4')"></i>
                  </div>
                  <label>Item Range 4</label>
                  <div class="">
                    <i class="fas fa-minus" id="amount_minus4_r" onclick="amount_minus('itemRange_4','amount_minus4_r')"></i>
                      <input type="number" id="itemRange_4" name="itemRange_4" value="12" required>
                    <i class="fas fa-plus" id="amount_plus4_r" onclick="amount_plus('itemRange_4','amount_plus4_r')"></i>
                  </div>
                 </div>
              </div>
            </div>
            <br>
            <label>Quantity</label>
            <input type="text" name="itemQuantity" value="12" required>
            <div class="">
              <label>Cash on Delivery</label>
              <input type="checkbox" name="cashdelivery" value="">
            </div>
            <button type="submit" name="ItemAddBtn">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">

  function amount_minus(x,y){
    var quantity = Number( document.getElementById(x).value );

    if(quantity!=0){
      quantity=quantity-1;
      document.getElementById(x).value = quantity;
    }else{
      document.getElementById(y).disabled = true;
    }
  }

  function amount_plus(x,y){
    var quantity = Number( document.getElementById(x).value );

    //if(quantity!=0){
      quantity=quantity+1;
      document.getElementById(x).value = quantity;
    //}else{
  //    document.getElementById(y).disabled = true;
    //}
  }
  </script>
</html>
