<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css\user_profile.css">

    <?php
        $current_url="user_profile.php";
        include 'navigation_bar.php';
        require_once 'item_process_controller.php';
    ?>
  </head>
  <body>
    <?php

    //$uname=null;

    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
      $username=$_SESSION['username'];
    }else if (!isset($_SESSION['username']) || empty($_SESSION['username'])){
      header("Location: index.php");
    }else{
      header("Location: index.php");
    }

    $result=$mysqli->query("select * from product_sold where uid='$username'") or die($mysqli->error);
     ?>

     <div class="main">
       <div class="section">
         <a href="item_list.php">Your shop</a>
         <table>
           <thead>
             <th>Transaction Id</th>
             <th>Product</th>
             <th>Amount</th>
             <th>Purchased date</th>
             <th>Price</th>
             <th>Status</th>
             <th>Track Package</th>
           </thead>
           <tbody>
             <?php while ($row=$result->fetch_assoc()) { ?>
             <tr>
               <td><?php echo $row['Sid'] ?></td>
               <td><?php //echo $row['Tid'] ;
                       $current_tid=$row['Tid'] ;
                       $result3=$mysqli->query("select * from product_imgs where Tid='$current_tid' ") or die($mysqli->error);

                       $data = $result3->fetch_assoc();
                       echo "<a href='Order_item.php?Tid=$current_tid'><img src='{$data['img_dir']}' /></a>" ;
                    ?>
               </td>
               <td><?php echo $row['amount'] ?></td>
               <td><?php echo $row['date'] ?></td>
               <td>$<?php echo $row['price'] ?></td>
            <?php if ($row['status']=='pending') { ?>
                <td class="pending-td"><?php echo $row['status'] ?></td>
            <?php }else if ($row['status']=='delivering') { ?>
                <td class="delivering-td"><?php echo $row['status'] ?></td>
            <?php }else if ($row['status']=='finished') { ?>
                <td class="finished-td"><?php echo $row['status'] ?></td>
            <?php }else if ($row['status']=='packing') { ?>
                <td class="finished-td"><?php echo $row['status'] ?></td>
            <?php } ?>
               <td>
                 <?php if ($row['trackId']=='') {
                       echo "No tracking id";
                     }else { $tackId=$row['trackId']; ?>
                      <button onclick="trackingLink('<?php echo $tackId ?>')"><?php echo $tackId ?></button>
                  <?php   } ?>
               </td>
             </tr>
           <?php } ?>
           </tbody>
         </table>
       </div>
     </div>
  </body>
  <script>

    function trackingLink(x) {
      window.open("https://simplexdelivery.com/trackOrder.html?trackID="+x);
    }
</script>
</html>
