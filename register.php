<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/6bcee8e3da.js"></script>
  </head>
  <body>

    <?php include  'navigation_bar.php'?>
    <div class="main">
      <div class="section">
        <form class="form" action="userConfig.php" method="post">
          <label for="">Name</label>
          <input type="text" name="uname"  placeholder="user name" required>
          <label for="">Location</label>
          <input type="text" name="pass" value="" placeholder="password" required>
          <label for="">Email</label>
          <input type="text" name="email"  placeholder="email" required>
            <button type="submit" name="btn_register">Register</button>

        </form>
      </div>
    </div>
  </body>
</html>
