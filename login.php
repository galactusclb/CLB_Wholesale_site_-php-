<?php
  //session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wholesale -login</title>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php
    include  'navigation_bar.php';

    if(isset($_SESSION['username'])){
      header("Location: shopping.php");
    }
     ?>
    <div class="main">
      <div class="section">
        <form class="" action="userConfig.php" method="post">
          <label>Username</label>
          <input type="text" name="uname" value="">
          <label>Password</label>
          <input type="password" name="pass" value="">
          <button type="submit" name="btn_login1">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
