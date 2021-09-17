<?php
 session_start();

 require 'item_process_controller.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wholesale Orderitem</title>
    <link rel="stylesheet" href="css/order_item.css">
    <script src="https://kit.fontawesome.com/6bcee8e3da.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <?php
      //$username=null;
      $current_url=null;
      $Tid=0;
      $max=0;
      $itemType=null;
      $tot_rating=0;
      $tot_rid=0;
      $product_rating=0;

      $itemPrice_1=0;
      $itemPrice_2=0;
      $itemPrice_3=0;
      $itemPrice_4=0;

      $cartSuccess=null;

      $Tid=$_GET['Tid'];

      $current_url="Order_item.php?Tid=$Tid";

      include  'navigation_bar.php';

       if (isset($_SESSION['username'])) {
         $username=$_SESSION['username'];
       }




      $result=$mysqli->query("select * from wholesaleitem where Tid='$Tid'") or die($mysqli->error);


    $result2=$mysqli->query("select sum(rating) as total_rating,count(Rid) as total_Rid from reviewItem where Tid='$Tid'") or die($mysqli->error);
        while ($row2=$result2->fetch_assoc()) {
        $tot_rating= $row2['total_rating'];
        $tot_rid=$row2['total_Rid'];
      }
      if($tot_rid!=0){
        $product_rating=$tot_rating/$tot_rid;
        $product_rating=round($product_rating);
      }else {
        $product_rating=0;
      }

      //$myString = "9,admin@example.com,8";

     ?>
  </head>
  <body>

    <div class="main">
      <?php while ($row=$result->fetch_assoc()) {
        $itemType=$row['itemType']; ?>

      <div class="section">
        <div class="div-seller">
          Sold by : <a href="seller.php?sellerId=<?php echo $row['sellerId'] ?> " ><?php echo $row['sellerId'] ?></a>
        </div>
      </div>
      <div class="section">
        <div class="div-item-flow">
          <a href="shopping.php">Shopping</a>
            > <a href="shopping.php?item=<?php echo $itemType ?>"><?php echo $itemType ?></a>
              > <a href="#"><?php echo $row['itemName'] ?></a>
        </div>
      </div>
      <div class="section">
         <div class="div-product-img">
           <div class="div-product-main-img">
           <?php
                 $result3=$mysqli->query("select * from product_imgs where Tid='$Tid' ") or die($mysqli->error);

                 $data = $result3->fetch_assoc();
                 echo "<img src='{$data['img_dir']}' id='current_img'  /> " ;
                ?>
            </div>
            <div class="div-product-all-img">
              <?php
                $result4=$mysqli->query("select * from product_imgs where Tid='$Tid' ") or die($mysqli->error);
                 while( $data2 = $result4->fetch_assoc()){
                   $url= $data2['img_dir']; ?>

                  <div class="div-all-img">
                    <img src="<?php echo  $data2['img_dir']  ?>" onclick="setProductImg('<?php echo  $url  ?>')"/>
                  </div>

                <?php  }
               ?>
            </div>
         </div>
         <div class="div-product-details">
           <h1><?php echo $row['itemName'] ?></h1>
           <div class="div-product-details-summary">
             <span>
               <?php
               for ($i=0; $i < $product_rating; $i++) {
                 echo "<i class='fas fa-star' style='color:#ffc322' ></i>";
                }
                for ($i=0; $i < (5-$product_rating) ; $i++) {
                  echo "<i class='fas fa-star' style='color:#ccc'></i>";
                }
                  ?>
               <?php echo $product_rating ?>/5 (<?php echo $tot_rid ?> Reviews)
             </span>
           </div>
           <?php if ($row['itemDiscount'] != 0 ) { ?>
               <div class="div-offer">
                 <div class="">

                   <img src="img/tag-solid.png" >
                   <span>OFFER</span>
                 </div>
                 <div class="div-offer-details">
                   <p>
                      <label id="offer"><?php echo $row['itemDiscount'] ?></label><label> %</label> OFF,<label>6 days</label> left
                   </p>
                 </div>
               </div>
          <?php } else {
            echo "<input type='hidden' id='offer' name='' value='0'>";
          }?>

             <form class="" action="item_process_controller.php" method="post" >
               <div class="div-order-details">
                   <input type="hidden" id="Tid" name="Tid" value="<?php echo $Tid ?>">
                   <input type="hidden" id="uname" name="uid" value="<?php echo $username ?>">
                   <div class="div-form-item">
                     <div class="div-form-item_title">
                       <label>Price</label>
                     </div>
                     <?php $myString = $row['itemPrice'];
                     $myArray = explode(',', $myString);
                     //foreach($myArray as $my_Array){
                        // echo $my_Array.'<br>';
                    // }
                    $itemPrice_1=$myArray[0];
                    $itemPrice_2=$myArray[1];
                    $itemPrice_3=$myArray[2];
                    $itemPrice_4=$myArray[3];

                      ?>
                     <div class="div-form-item_input">
                      <strong>US $<?php echo $itemPrice_4 ?> - <?php echo $itemPrice_1 ?></strong>
                     </div>
                   </div>
                   <div class="div-form-item">
                     <div class="div-form-item_title">
                       <label>Quantity </label>
                     </div>
                     <div class="div-form-item_input">
                        <i class="fas fa-minus" id="amount_minus" onclick="amount_minus()"></i>
                          <input type="number" id="amount" name="amount" max="<?php  echo $row['itemQuantity'] ?>" min="0" value="1" required>
                          <input type="hidden" name="" value="<?php echo $row['itemQuantity'] ?>" id="max_amount">
                        <i class="fas fa-plus" id="amount_plus" onclick="amount_plus()"></i>
                        Pieces.  <?php echo $row['itemQuantity'] ?> in stock
                      </div>
                   </div>
                   <div class="div-form-item">
                     <div class="div-form-item_title">
                        <label>Wholesale Price (Piece):</label>
                     </div>
                     <div class="div-form-item_input">
                       <?php
                       $itemRange_string = $row['itemRange'];
                       $itemRange_Array = explode(',', $itemRange_string);

                        $itemRange_1=$itemRange_Array[0];
                        $itemRange_2=$itemRange_Array[1];
                        $itemRange_3=$itemRange_Array[2];
                        $itemRange_4=$itemRange_Array[3]; ?>
                       <div class="div-wholesale-range">
                         <label><p id="itemRange_1"><?php echo $itemRange_1 ?></p>+</label>
                         <label>$<p id="itemPrice_1"><?php echo $itemPrice_1 ?></p></label>
                       </div>
                       <div class="div-wholesale-range">
                         <label><p id="itemRange_2"><?php echo $itemRange_2 ?></p>+</label>
                         <label>$<p id="itemPrice_2"><?php echo $itemPrice_2 ?></p></label>
                       </div>
                       <div class="div-wholesale-range">
                         <label><p id="itemRange_3"><?php echo $itemRange_3 ?></p>+</label>
                         <label>$<p id="itemPrice_3"><?php echo $itemPrice_3 ?></p></label>
                       </div>
                       <div class="div-wholesale-range">
                         <label><p id="itemRange_4"><?php echo $itemRange_4 ?></p>+</label>
                         <label>$<p id="itemPrice_4"><?php echo $itemPrice_4 ?></p></label>
                       </div>
                     </div>
                   </div>
                   <div class="div-form-item">
                     <div class="div-form-item_title">
                       <label>Total Cost</label>
                     </div>
                     <div class="div-form-item_input">
                       $ <input type="text" id="totcost" name="totcost" value="0" readonly>
                     </div>
                   </div>
                   <div class="div-form-item">
                     <div class="div-form-item_title">
                     </div>
                     <div class="div-form-item_input">
                    <!--   <button type="submit" name="OrderAddBtn" onclick="return loginCheck()">Order Items</button> -->
                       <button type="submit" name="addcartBtn" >Add cart</button>
                    <!--   <button type="button" name="OrderAddBtn" onclick="addCart()">Add to cart</button> -->
                     </div>
                   </div>
              </div>
              <div class="div-other-details">
                <div class="div-delivery">
                  <div class="div-delivery-header">
                    Delivery Options
                  </div>
                  <div class="div-homedelivery">
                    <i class="fas fa-truck-loading"></i>
                    <div class="div-homedelivery-details">
                      Home Delivery
                      <label>(5-12 days)</label>
                      <p>US$<span id="shipping-cost">10<span></p>
                    </div>
                  </div>
                  <div class="div-homedelivery">
                    <i class="fas fa-hand-holding-usd"></i>
                    <div class="div-homedelivery-details">
                      <?php if ($row['cashdelivery']==true) {
                          echo "Cash on Delivery Available";
                        }else {
                          echo "Cash on Delivery not Available";
                        } ?>
                    </div>
                  </div>
                </div>
                <div class="div-delivery">
                  <div class="div-delivery-header">
                      Return & Warranty
                  </div>
                  <div class="div-homedelivery">
                    <i class="fas fa-history"></i>
                    <div class="div-homedelivery-details">
                      7 Days Returns
                      <label>Change of mind is not applicable</label>
                    </div>
                  </div>
                  <div class="div-homedelivery">
                    <i class="fas fa-shield-alt"></i>
                    <div class="div-homedelivery-details">
                      Warranty not Available
                    </div>
                  </div>
                </div>
              </div>
           </form>
         </div>
      </div>
      <?php } ?>
      <div class="section">
        <!--<button type="button" id="prvBtn" name="button" onclick="slideMove_prev()">prev</button> -->
        <span id="prvBtn" onclick="slideMove_prev()" class="mdi mdi-send mdi-rotate-180"></span>
        <div class="div-main-similar-items border-1px-line" id="div-main-similar-items">
              <h3>Similar Items</h3>


              <div class="div-similar-items"  id="div-similar-items">
                <?php
                $result3=$mysqli->query("select * from wholesaleitem where itemType='$itemType' limit 12 ") or die($mysqli->error);
                while ($row3=$result3->fetch_assoc()) {
                  if ($row3['Tid']!=$Tid) {
                    $cuurentTid=$row3['Tid'];

                  $itemPrice_string = $row3['itemPrice'];
                  $itemPrice_Array = explode(',', $itemPrice_string);

                   $itemPrice_1=$itemPrice_Array[0];
                   $itemPrice_2=$itemPrice_Array[1];
                   $itemPrice_3=$itemPrice_Array[2];
                   $itemPrice_4=$itemPrice_Array[3];  ?>

                <div class="div-similar-items-card">
                 <a href="Order_item.php?Tid=<?php echo $row3['Tid'] ?>">
                   <?php
                         $result5=$mysqli->query("select * from product_imgs where Tid='$cuurentTid' ") or die($mysqli->error);

                         $data = $result5->fetch_assoc();
                         echo "<img src='{$data['img_dir']}' />" ;
                    ?>
                    <div class="item-card-title">
                       <?php echo $row3['itemName'] ?>
                    </div>
                    <div class="div-product-prices">
                      <strong>$<?php echo $itemPrice_4 ?> - <?php echo $itemPrice_1 ?> </strong> / Piece
                    </div>
                    <div class="div-product-sold">
                      Sold <strong><?php echo $row3['itemSold'] ?></strong>
                    </div>
                 </a>
                </div>
              <?php }
            } ?>
          </div>
        </div>
    <!-- <button type="button" id="nxtBtn" name="button" onclick="slideMove_nxt()">next</button> -->
    <span id="nxtBtn" onclick="slideMove_nxt()" class="mdi mdi-send"></span>
    </div>
      <div class="section">
        <div class="div-addreview">
          <form class="" action="item_process_controller.php" method="post">
            <h3>Feedback</h3>
            <input type="hidden" name="Tid" value="<?php echo $Tid ?>">
            <input type="hidden" name="username" value="chanaka">
            <label>Rate</label>
            <input type="number" name="newRate" max="5" min=1>
            <label>review</label>
            <input type="text" name="review" value="" required>
            <button type="submit" name="addReviewBtn">Submit</button>
          </form>
        </div>
       </div>
       <div class="section">
         <div class="div-review-display">
            <h3>Custemer Reviews (<?php echo $tot_rid ?>)</h3>
            <?php
            if($tot_rid >= 1 ){
              $result4=$mysqli->query("select * from reviewitem where Tid='$Tid' order by Rid DESC") or die($mysqli->error);
              while ($row4=$result4->fetch_assoc()) {
               ?>
               <ul>
                 <?php  ?>
                   <li>
                     <span>
                       <?php
                       for ($i=0; $i < round($row4['rating']); $i++) {
                         echo "<i class='fas fa-star' style='color:#ffc322' ></i>";
                        }
                        for ($i=0; $i < (5-round($row4['rating'])) ; $i++) {
                          echo "<i class='fas fa-star' style='color:#ccc'></i>";
                        }
                          ?>
                     </span>
                     <?php echo $row4['rating'] ?>/5 by <?php echo $row4['sellerId'] ?>
                   </li>
                   <li><?php echo $row4['review'] ?></li>
               </ul>
             <?php }
            }else { ?>
           <p>This product has no reviews.
             Let others know what do you think and be the first to write a review.</p>
         <?php } ?>
         </div>
       </div>
     </div>
  </body>

  <script type="text/javascript">
    var main_maxwidth=0;
    var child_maxwidth=0;
    var left=0;
    var right=0;
    var x=0;
    var gg=0;
    var remaining=0;

    function slideMove_nxt(){

        main_maxwidth = document.getElementById('div-main-similar-items').clientWidth;
        child_maxwidth = document.getElementById('div-similar-items').clientWidth;
        //document.getElementById('gg').innerHTML = main_maxwidth;




        if (main_maxwidth<=child_maxwidth) {
          remaining=child_maxwidth-main_maxwidth;
          if ( -remaining <= x ) {
            if (left+remaining>45) {
              x=x-180;

              document.getElementById('div-similar-items').style.left = x+"px";
              left = document.getElementById('div-similar-items').offsetLeft;
              document.getElementById('ll').innerHTML=left;
              document.getElementById('ll2').innerHTML=remaining;
            }
          }
        }
        // left=document.getElementById('div-similar-items').style.left;
        // right=document.getElementById('div-similar-items').style.right;


        //document.getElementById('gg').innerHTML = left;
        //document.getElementById('hh').innerHTML = right;

    }

    function slideMove_prev(){



        if ( left < 0 ) {
            left=left+180;
            x=x+180;
            document.getElementById('div-similar-items').style.left = left+"px";
            gg = document.getElementById('div-similar-items').offsetLeft;
            document.getElementById('ll').innerHTML=gg;
          }

         }

        //right=document.getElementById('div-similar-items').style.right;


        //document.getElementById('gg').innerHTML = left;
        //document.getElementById('hh').innerHTML = right;



    // function slideMove_prev(){
    //
    //     main_maxwidth = document.getElementById('div-main-similar-items').clientWidth;
    //     child_maxwidth = document.getElementById('div-similar-items').clientWidth;
    //     //document.getElementById('gg').innerHTML = main_maxwidth;
    //     if (main_maxwidth<=child_maxwidth) {
    //       var remaining=child_maxwidth-main_maxwidth;
    //       if ( x < remaining ) {
    //         x=x+180;
    //         document.getElementById('div-similar-items').style.left = x+"px";
    //       }
    //
    //     }
    //     left=document.getElementById('div-similar-items').style.left;
    //     right=document.getElementById('div-similar-items').style.right;
    //
    //
    //     //document.getElementById('gg').innerHTML = left;
    //     //document.getElementById('hh').innerHTML = right;
    //
    // }


////////////////////////////////////////////////////
    var amount = document.getElementById('amount');
    var totcost = document.getElementById('ff');

  	amount.addEventListener("input", calc);


  	function calc() {

  		var amountint = parseint(amount.value) || 0;
  		totcost.value = amountint;

    }
///////////////////////////////////////////////


//function for Calculate product price total
    function asd(){

      var itemRange_1 = Number(document.getElementById('itemRange_1').textContent);
    	var itemRange_2 = Number(document.getElementById('itemRange_2').textContent);
    	var itemRange_3 = Number(document.getElementById('itemRange_3').textContent);
    	var itemRange_4 = Number(document.getElementById('itemRange_4').textContent);

    	var itemPrice_1 = Number(document.getElementById('itemPrice_1').textContent);
    	var itemPrice_2 = Number(document.getElementById('itemPrice_2').textContent);
    	var itemPrice_3 = Number(document.getElementById('itemPrice_3').textContent);
    	var itemPrice_4 = Number(document.getElementById('itemPrice_4').textContent);

      var offer=0;
      var tot=0;
      var offer= Number(document.getElementById('offer').textContent);
      var amount = Number(document.getElementById('amount').value);
      var shipping_cost = Number(document.getElementById('shipping-cost').textContent);


        if (amount < itemRange_2) {
          tot  =amount*itemPrice_1;
          //document.getElementById('totcost').value =  tot ;
        }else if (itemRange_2 <= amount && amount < itemRange_3) {
           tot=amount*itemPrice_2;
          //document.getElementById('totcost').value =  tot ;
        }else if (itemRange_3 <= amount && amount < itemRange_4) {
           tot=amount*itemPrice_3;
          //document.getElementById('totcost').value = tot ;
        }else if (itemRange_4 <= amount) {
           tot=amount*itemPrice_4;
          //document.getElementById('totcost').value =  tot ;
        }

        if(offer>0){
           tot=tot-(tot*offer/100);
         }
         tot=tot+shipping_cost;
        document.getElementById('totcost').value =  tot ;
    }

//for Calculate total when input amount field
    $("#amount").on("input", function(){
      asd();
    });

    $(document).ready(function() {
      asd();
    });
//for Calculate total when increasing amount using plus button
    function amount_plus(){
      var max_amount = Number( document.getElementById("max_amount").value );
      var amount = Number( document.getElementById("amount").value );

      if(max_amount!=amount){
        amount=amount+1;
        document.getElementById("amount").value = amount;
      }else{
        document.getElementById("amount_plus").disabled = true;
        document.getElementById("amount_plus").style.cursor= "no-drop";
      }

      asd();
    }
//for Calculate total when descreasing amount using amount button
    function amount_minus(){
      var amount = Number( document.getElementById("amount").value );

      if(amount!=0){
        amount=amount-1;
        document.getElementById("amount").value = amount;
      }else{
        document.getElementById("amount_minus").disabled = true;
        document.getElementById("amount_minus").style.cursor= "no-drop";
      }

      asd();
    }

    function setProductImg(x) {
      document.getElementById("current_img").src = x;
    }


///////////////////////////////////////
//add item to cart

  var dis_iTid = JSON.parse(sessionStorage.getItem("added_iTid"));
  var dis_iamount = JSON.parse(sessionStorage.getItem("added_iamount"));
  var dis_itotcost = JSON.parse(sessionStorage.getItem("added_itotcost"));


  Tid=[];
  amount=[];
  totcost=[];

  //if(!Array.isArray(dis_iTid)){
  //  alert("not exists");
  //}else
  if (!dis_iTid.length) {
    //alert("null");
  }else{
    for (var i = 0; i < dis_iTid.length; i++) {
      Tid.push(dis_iTid[i]);
      amount.push(dis_iamount[i]);
      totcost.push(dis_itotcost[i]);
    }
  }


function addCart(){
  Tid.push(document.getElementById("Tid").value);
  amount.push(document.getElementById("amount").value);
  totcost.push(document.getElementById("totcost").value);

  window.sessionStorage.setItem("added_iTid", JSON.stringify(Tid));
  window.sessionStorage.setItem("added_iamount", JSON.stringify(amount));
  window.sessionStorage.setItem("added_itotcost", JSON.stringify(totcost));

  location.reload();
}

  </script>
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
