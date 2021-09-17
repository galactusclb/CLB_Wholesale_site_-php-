<?php
session_start();

        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
          //$username=$_SESSION['username'];
        }else {
          header('Location: index.php');
          exit;
        }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/admin.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  </head>
  <body>
    <?php //require_once 'item_process_controller.php';

        include  'navigation_bar.php';

        $rowcount=0;

        if (isset($_SESSION['username']) && $_SESSION['role']=='admin') {
          $uname=$_SESSION['username'];
        }else if(!isset($_SESSION['username']) || (isset($_SESSION['username']) && $_SESSION['role'] != 'admin') ){
          header("Location: login.php");
        }

        $result=$mysqli->query("select * from wholesaleitem  ") or die($mysqli->error);




      ?>
  <div class="main">
    <div class="section">
      <div class="admin-pannel-left">
          <div class="inner-admin-left-pannel">
            <div class="admin-pannel-title">
              <i class="fas fa-shipping-fast"></i>
              <a href="Admin-Order.php">Orders</a>
            </div>
            <div class="admin-pannel-title">
              <i class="fas fa-warehouse"></i>
              <a href="Admin-allProduct.php">All Products</a>
            </div>
            <div class="admin-pannel-title">
              <i class="fas fa-chart-line"></i>
              <a href="Admin-allProduct.php">Analytics</a>
            </div>
            <div class="admin-pannel-title">
              <i class="fas fa-mail-bulk"></i>
              <a href="Admin-allProduct.php">Mail</a>
            </div>
          </div>
      </div>
      <div class="admin-pennel-right">
        <div class="div-table">
          <div class="div-search">
            <nav>
              <a href="Admin-Order.php">All</a>
              <a href="Admin-Order.php?status=pending">Pending</a>
              <a href="Admin-Order.php?status=packing">Packing</a>
              <a href="Admin-Order.php?status=delivering">Delivery</a>
              <a href="Admin-Order.php?status=finished">Finished</a>
            </nav>
            <div class="div-table-searchbar">
              <i class="fas fa-search" id="btn-search" ></i>
              <input id="table-search" type="text" placeholder="Search..">
            </div>
          </div>
          <table >
             <thead >
               <th>Item Id</th>
               <th>Name</th>
               <th >Image</th>
               <th>Type</th>
               <th>Price</th>
               <th>Range</th>
               <th>Quantity</th>
               <th>Sold</th>
               <th>Discount</th>
               <th>Rating</th>
               <th>Seller</th>
               <th>Status</th>
             </thead>
             <tbody id="table">
                <?php
                    while ($row=$result->fetch_assoc()) {
                      $current_tid=$row['Tid']; ?>
                      <tr>
                        <td><?php echo $row['Tid'] ?></td>
                        <td style="width:150px;height:50px;overflow:hidden"><?php echo $row['itemName'] ?></td>
                        <td > <?php
                              $result3=$mysqli->query("select * from product_imgs where Tid='$current_tid' ") or die($mysqli->error);

                              $data = $result3->fetch_assoc();
                              echo "<img src='{$data['img_dir']}' />" ;
                             ?>
                        </td>
                        <td><?php echo $row['itemType'] ?></td>
                        <td><?php echo $row['itemPrice'] ?></td>
                        <td><?php echo $row['itemRange'] ?></td>
                        <td><?php echo $row['itemQuantity'] ?></td>
                        <td><?php
                                if($row['itemSold']==''){
                                  echo "0";
                                }else {
                                  echo $row['itemSold'];
                                }
                                ?>
                        </td>
                        <td><?php echo $row['itemDiscount'] ?></td>
                        <td>
                          <?php
                            $rate=0;
                            $tot_rid=0;
                            $rate_tot=0;

                            $result2=$mysqli->query("select sum(rating) as total_rating,count(Rid) as total_Rid from reviewItem where Tid='$current_tid'") or die($mysqli->error);
                            while ($row2 = $result2->fetch_assoc()) {
                              $rate_tot=$row2['total_rating'];
                              $tot_rid=$row2['total_Rid'];
                            }
                            if($tot_rid!=0){
                              $rate=$rate_tot/$tot_rid;
                              $rate=round($rate);
                            }

                            echo $rate; ?>
                        </td>
                        <td><?php echo $row['sellerId'] ?></td>
                        <td><?php echo $row['itemStatus'] ?></td>
                        <td>
                          <a href="item_edit.php?Tid=<?php echo $row['Tid']; ?>">
                            Edit
                          </a>
                        </td>
                        <td>
                          <a href="item_process_controller.php?ItemDelete=<?php echo $row['Tid'] ?>">
                            Delete
                          </a>
                        </td>
                      </tr>
                <?php  }
              ?>
             </tbody>
           </table>
         </div>
      </div>
    </div>
  </div>
  </body>
  <script type="text/javascript">


      $(document).ready(function(){
          $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#table tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
          });
        });
  </script>
</html>
