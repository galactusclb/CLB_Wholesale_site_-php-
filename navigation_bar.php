
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/popupLogin.css">
<script src="js/popupLogin.js"></script>
<script src="https://kit.fontawesome.com/6bcee8e3da.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.5.95/css/materialdesignicons.min.css">


<?php
  //session_start();
  $username=null;

  require 'item_process_controller.php';
  include 'popupLogin.php';

  if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
  }
 ?>

 <div id="loading">
   <div class="loading-img">
   </div>
 </div>
<div class="div-navi-bar">
  <div class="div-gg">
    <div class="div-navi-logo">
      <img src="img\salezone-logo-1522230747.jpg" >
    </div>
    <div class="div-at-850px">
      <div class="div-cart">
        <a href="cart2.php">
          <span class="mdi mdi-cart-outline"></span>
          <?php if (!empty($_SESSION['shopping_cart'])) { ?>
            <div class="div-cart-item-count">
              <?php
              $items=count($_SESSION['shopping_cart']);
               echo $items; ?>
            </div>
          <?php }    ?>
        </a>
      </div>
      <div class="div-track-order">
        <i class="far fa-bell"></i>
      </div>
      <div class="div-searchbar">
        <i class="fas fa-search" id="btn-search" ></i>
        <input class="form-control" id="myInput" type="text" placeholder="Search"  >
      </div>
      <div class="navi-line" id="navi-line">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
  </div>
  <div class="div-navi" id="div-navi">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="shopping.php">Sale</a></li>
      <?php if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'admin') { ?>
      <li><a href='Admin-Order.php'>Admin</a></li>
       <?php } } ?>
       <li><a href='sendMail.php'>send</a></li>
    </ul>
    <div class="div-navi-acc">
      <?php
      $ordercount=0;
      $finishedorders=0;
      $unraed=0;

      $result_count=$mysqli->query("select *,
                                    (select count(Sid) from product_sold where uid='$username' and status='finished') as finishedorders,
                                    (select count(Sid) from product_sold where uid='$username' and readRecipe=false) as unreadorders,
                                    count(Sid) as totorders from product_sold where uid='$username' ") or die($mysqli->error);

      $row_count = $result_count->fetch_assoc();
        $ordercount = $row_count['totorders'];
        $finishedorders = $row_count['finishedorders'];
        $unread = $row_count['unreadorders'];

        $remaningorders=$ordercount-$finishedorders;


      if (isset($_SESSION['username'])) { ?>
        <div class="div-acc-img">
          <img src="img/products_img/eminem.jpg" onclick="dropdownAcc()" id="acc-img">
        </div>
        <div class="div-acc-dropdown" id="accDropdown">
          <a href='user_profile.php'><i class="fas fa-user"></i><span> <?php echo $username ?>  </span></a>
          <a href="#"><i class="fas fa-bell"></i> <span>Notification</span> <span class="count"><?php echo $unread ?></span> </a>
          <a href="user_profile.php"><i class="fas fa-shipping-fast"></i> <span>Orders</span><span class="count"><?php echo $remaningorders ?></span></a>
          <a href="#"><i class="fas fa-wallet"></i> <span>Wallet</span></a>
          <?php if (isset($current_url)) {
                  echo "<a href='userConfig.php?action=logout&url=$current_url'><i class='fas fa-power-off'></i>Logout</a>";
                }else {
                  echo "<a href='userConfig.php?action=logout'><i class='fas fa-power-off'></i>Logout</a> ";
                }
                ?>
        </div>
      <?php }else {
        echo "<a onclick='loginCheck()'>Login</a>";
        echo "<a href='register.php'>Register</a>";
        } ?>
    </div>
  </div>
</div>

<!--popuplogin div -->
<div id="div-popup" class="div-popup" onclick="popDivClose()"></div>
<div id="div-popup-login" class="div-popup-loging">
  <!--  <input type="text" id="popScript" name="" value="<?php //if (isset($_SESSION['popLogin'])) {echo $_SESSION['popLogin'];} ?>"> -->
  <div class="div-login-title">
    <h3> Please Login to continue.</h3>
    <span>New member? <a href="register.php">Register here</a></span>
  </div>
  <div class="div-popup-devide">
    <div class="div-popup-devide-left">
      <form class="" action="userConfig.php" method="post">
        <!-- $url is in relative page -->
        <input type="hidden" name="url" value="<?php echo $current_url  ?>">
        <!-- id=='uname' for checking uname,for loginCheck() function; -->
        <input type="hidden" id="uname" name="uid" value="<?php echo $username ?>">
        <label>Username</label>
        <input type="text" name="uname" value="">
        <label>Password</label>
        <input type="password" name="pass" value="">
        <div class="">
          <button type="submit" name="btn_login">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
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
<script type="text/javascript">
//search bar
  $("#btn-search").click(function() {
    var word = document.getElementById('myInput').value
    $(location).attr('href', "shopping.php?search="+word);
  });

  var input = document.getElementById("myInput");

// Execute a function when the user releases a key on the keyboard
  input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
      // Cancel the default action, if needed
      event.preventDefault();
      // Trigger the button element with a click
      document.getElementById("btn-search").click();
    }
  });
//**********
    function dropdownAcc() {
      document.getElementById("accDropdown").classList.toggle("show");
      }
    window.onclick = function(event) {
      if (!event.target.matches('#acc-img')) {
        var dropdowns = document.getElementsByClassName("div-acc-dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }



    var navi_line =document.getElementById("navi-line");
    var div_navi = document.getElementById("div-navi");

    navi_line.addEventListener("click",function(){
      div_navi.classList.toggle("show");
    });


</script>
<script type="text/javascript">
    function hideLoader() {
      $('#loading').hide();
    }

    $(window).ready(hideLoader);
</script>
