<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/cart.css">
  </head>
  <?php
//  $uname=null;
  $cartSuccess=null;
  $current_url="cart.php";
   include 'navigation_bar.php';

    if ($_SESSION['username']) {
      $uname=$_SESSION['username'];
    }

    if(isset($_SESSION['cartSuccess'])){
      $cartSuccess=$_SESSION['cartSuccess'];

    }

    unset($_SESSION['cartSuccess']);

  //  include 'popupLogin.php';
  ?>
  <body onload="displayCart()">



    <div class="main">
      <div class="section">
        <div class="div-shoppincart">
          <h2 id="ff">shopping cart</h2>
          <h3 id="no-items">There are no more items in your cart</h3>
          <div id="have-items" class="">
            <form class="" action="item_process_controller.php" method="post">
              <div class="" id="cart">
              </div>
            </form>
          </div>
          <div class="continue-shopping">
            <a href="shopping.php">Continue Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">

  var dis_Tid = JSON.parse(sessionStorage.getItem("added_iTid"));
  var dis_amount = JSON.parse(sessionStorage.getItem("added_iamount"));
  var dis_itotcost = JSON.parse(sessionStorage.getItem("added_itotcost"));




  function displayCart(){

    if (dis_Tid.length==0 ) {
      document.getElementById('no-items').style.display="block";
      document.getElementById('have-items').style.display="none";
    }else{
        cartdata='<table><tr><th>product name</th><th>quantity</th><th>price</th></tr>';

        var total=0;
        var jvalue=12;
        for (var i = 0; i < dis_Tid.length; i++) {
          total +=Number(dis_itotcost[i]);
          cartdata +="<tr><td><img src='' id='img_"+dis_Tid[i]+"' onload='setImg("+dis_Tid[i]+")'></td><td><input type='text' name='Tid[]' value='"+
                            dis_Tid[i]+
                          "'><input type='hidden' name='uid[]' value='<?php echo $uname ?>'></td><td><input type='text' name='amount[]' value='"+
                            dis_amount[i]+
                          "'></td><td><input type='text' name='totcost[]' value='"+
                            dis_itotcost[i]+
                          "'></td><td><button type='button' onclick='delElement("+ i + ")'> Delete</button></td></tr>";
        }

        cartdata +='<tr><td></td><td></td><td>'+total+ '</td></tr></table>';
        cartdata +='<button type="submit" name="cartOrderAddBtn" onclick="return loginCheck()">Order Items</button>';
        //loginCheck() is in poplogin.js (include navigation.php)
        document.getElementById('cart').innerHTML = cartdata;
      }
  }


  function delElement(a){
    dis_Tid.splice(a,1);
    dis_amount.splice(a,1);
    dis_itotcost.splice(a,1);

    window.sessionStorage.setItem("added_iTid", JSON.stringify(dis_Tid));
    window.sessionStorage.setItem("added_iamount", JSON.stringify(dis_amount));
    window.sessionStorage.setItem("added_itotcost", JSON.stringify(dis_itotcost));

    location.reload();
    displayCart();
  }

  window.addEventListener("load", cartSuccess);

  function cartSuccess(){
    var cartSuccess = "<?php echo $cartSuccess; ?>";

    if (cartSuccess=="success") {
      alert("Your order has been added successfully.!");
      dis_Tid=[];
      dis_amount=[];
      dis_itotcost=[];

      window.sessionStorage.setItem("added_iTid", JSON.stringify(dis_Tid));
      window.sessionStorage.setItem("added_iamount", JSON.stringify(dis_amount));
      window.sessionStorage.setItem("added_itotcost", JSON.stringify(dis_itotcost));

      location.reload();
   }
  }
  </script>
  <script type="text/javascript">

  //window.addEventListener("load", setImg);

  function setImg(x){
    //  for (var i = 0; i < dis_Tid.length; i++) {
      //  var x = dis_Tid[i];
        <?php
            $current_tid= 2 ;
            $result3=$mysqli->query("select * from product_imgs where Tid='$current_tid' ") or die($mysqli->error);

            $data = $result3->fetch_assoc();
            //echo "<a href='Order_item.php?Tid=$current_tid'><img src='{$data['img_dir']}' /></a>" ;
         ?>
         document.getElementById("img_"+x).src = '<?php echo $data['img_dir'] ?>' ;
    //  }
    }
  </script>
</html>
