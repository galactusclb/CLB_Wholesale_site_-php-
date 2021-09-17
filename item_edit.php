<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wholesale ItemEdit</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/item_edit.css">
    <script src="https://kit.fontawesome.com/6bcee8e3da.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  </head>
  <body>
    <?php include  'navigation_bar.php';
      //require_once 'item_process_controller.php';


      $Tid=$_GET['Tid'];

      if (isset($_SESSION['username'])) {
        $username=$_SESSION['username'];
      }

      $result=$mysqli->query("select *,count(Tid) as rowcount from wholesaleitem where Tid='$Tid' and sellerId='$username' ") or die($mysqli->error);

      while ($row=$result->fetch_assoc()) {
        if($row['rowcount']==0){
          header("Location: item_list.php");
         }else{
      ?>

      <div class="main">
        <div class="section">
              <div class="div-product-img">
                <?php
                      $result5=$mysqli->query("select * from product_imgs where Tid='$Tid' ") or die($mysqli->error);

                      while(  $data = $result5->fetch_assoc()) { ?>
                        <a href="item_process_controller.php?action=deleteImg&Pid=<?php echo $data['Pid']?>&Tid=<?php echo $Tid ?>">Delete</a>
                        <img src=" <?php echo $data['img_dir']   ?> " />
                    <?php  }  ?>
              </div>
              <div class="div-item-add-form">
                <h4>Item Edit</h4>
                <form class="" action="item_process_controller.php" method="post">
                  <input type="hidden" name="Tid" value="<?php echo $Tid; ?>">
                  <label>Item name</label>
                  <input type="text" name="itemName" value="<?php echo $row['itemName'] ?>" required>
                  <label>Item type</label>
                  <select class="" name="itemType" required>
                      <option disabled selected style="display:none"> -- select an option -- </option>
                      <option value="Clothes" <?php if ($row['itemType']=="Clothes") echo "selected";  ?> >Clothes</option>
                      <option value="Bag" <?php if ($row['itemType']=="Bag") echo "selected";  ?> >Bag</option>
                      <option value="Mobile phone" <?php if ($row['itemType']=="Mobile phone") echo "selected";  ?> >Mobile phone</option>
                      <option value="Laptop" <?php if ($row['itemType']=="Laptop") echo "selected";  ?> >Laptop</option>
                      <option value="Foods" <?php if ($row['itemType']=="Foods") echo "selected";  ?> >Foods</option>
                  </select>
                  <br>
                  <?php
                  $itemPrice_string = $row['itemPrice'];
                  $itemPrice_Array = explode(',', $itemPrice_string);

                   $itemPrice_1=$itemPrice_Array[0];
                   $itemPrice_2=$itemPrice_Array[1];
                   $itemPrice_3=$itemPrice_Array[2];
                   $itemPrice_4=$itemPrice_Array[3];

                  $itemRange_string = $row['itemRange'];
                  $itemRange_Array = explode(',', $itemRange_string);

                   $itemRange_1=$itemRange_Array[0];
                   $itemRange_2=$itemRange_Array[1];
                   $itemRange_3=$itemRange_Array[2];
                   $itemRange_4=$itemRange_Array[3]; ?>
                   <div class="div-addPrice">
                     <div class="div-addPrice-title">
                       <label>Add wholesale price </label>
                     </div>
                     <div class="div-addPrice-details">
                       <div class="div-addPrice-card">
                         <label>price 1</label>
                         <input type="text"  name="itemPrice_1" value="<?php echo $itemPrice_1 ?>" required>
                         <label>Item Range 1</label>
                         <input type="text" name="itemRange_1" value="<?php echo $itemRange_1 ?>" required>
                       </div>
                       <div class="div-addPrice-card">
                         <label>price 2</label>
                         <input type="text" name="itemPrice_2" value="<?php echo $itemPrice_2 ?>" required>
                         <label>Item Range 2</label>
                         <input type="text" name="itemRange_2" value="<?php echo $itemRange_2 ?>" required>
                       </div>
                       <div class="div-addPrice-card">
                         <label>price 3</label>
                         <input type="text" name="itemPrice_3" value="<?php echo $itemPrice_3 ?>" required>
                         <label>Item Range 3</label>
                         <input type="text" name="itemRange_3" value="<?php echo $itemRange_3 ?>" required>
                       </div>
                       <div class="div-addPrice-card">
                         <label>price 4</label>
                         <input type="text" name="itemPrice_4" value="<?php echo $itemPrice_4 ?>" required>
                         <label>Item Range 4</label>
                         <input type="text" name="itemRange_4" value="<?php echo $itemRange_4 ?>" required>
                       </div>
                     </div>
                   </div>
                  <br>
                  <div class="div-addQuantity-details">
                    <label>Quantity</label>
                    <div class="">
                      <i class="fas fa-minus" id="amount_minus" onclick="amount_minus('quantity')"></i>
                        <input type="number" id="quantity" name="itemQuantity" value="<?php echo $row['itemQuantity'] ?>"  required>
                      <i class="fas fa-plus" id="amount_plus" onclick="amount_plus('quantity')"></i>
                    </div>
                  </div>
                  <div class="div-addQuantity-details">
                    <label>Discount</label>
                    <div class="">
                      <i class="fas fa-minus" id="amount_minus" onclick="amount_minus('discount')"></i>
                        <input type="number" id="discount" name="itemDiscount" value="<?php echo $row['itemDiscount'] ?>"  max="100" min="0" required>
                      <i class="fas fa-plus" id="amount_plus" onclick="amount_plus('discount')"></i>
                    </div>
                  </div>
                  <button type="submit" name="ItemEditBtn">Submit</button>
                </form>
              </div>
        </div>

        <div class="section">
          <div class="div-add-image">
            <form class="" action="item_process_controller.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="Tid" value="<?php echo $Tid ?>">
              <label>Add Image</label>
              <input type="file" name="userfile[]" value="" multiple="">
              <button type="submit" name="addMoreImg_btn" onsubmit="return(addimge())">Submit</button>
            </form>
          </div>
        </div>
      </div>
    <?php }
  } ?>
  </body>

  <script type="text/javascript">
  function amount_plus(x){
    var quantity = Number( document.getElementById(x).value );

      quantity=quantity+1;
      document.getElementById(x).value = quantity;
  }

  function amount_minus(x){
    var quantity = Number( document.getElementById(x).value );

    if(quantity!=0){
      quantity=quantity-1;
      document.getElementById(x).value = quantity;
    }else{
      document.getElementById("amount_minus").disabled = true;
    }
  }

  //$(function(){ not working
//     function addimge(){
//         var $fileUpload = $("input[type='file']");
//         if (parseInt($fileUpload.get(0).files.length)>2){
//          alert("You can only upload a maximum of 2 files");
//          return false;
//        }else {
//          return true;
//        }
//     });
// });​
  </script>
</html>
