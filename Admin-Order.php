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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/admin.css">
    <?php
        $cartSuccess=null;
        $current_url="cart.php";
        include  'navigation_bar.php';

        $rowcount=0;

        $result = null;
        $current_status = null;

        if (isset($_GET['status'])) {
          $current_status = $_GET['status'];
        }

        if (!isset($_GET['status'])) {
          $result=$mysqli->query("select * from product_sold ") or die($mysqli->error);
        }else{
          $result=$mysqli->query("select * from product_sold where status='$current_status' ") or die($mysqli->error);
        }





      ?>
  </head>
  <body>
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
            <h3> <?php if ($current_status != null || $current_status !='') {
                    echo $current_status;
                  }else {
                    echo "All Orders";
                  } ?>
           </h3>
           <thead >
             <th>Order Id</th>
             <th>Product Id</th>
             <th>Amount</th>
             <th>Custemer</th>
             <th>Date</th>
             <th>Time</th>
             <th>Price</th>
             <th>Status</th>
             <th>Traking Id</th>
             <th></th>
           </thead>
           <tbody id="table">
              <?php
                  while ($row=$result->fetch_assoc()) {
                    $current_sid=$row['Sid']; ?>
                    <tr>
                      <td><?php echo $row['Sid'] ?></td>
                      <td><?php echo $row['Tid'] ?></td>
                      <td><?php echo $row['amount'] ?></td>
                      <td><?php echo $row['uid'] ?></td>
                      <td><?php echo $row['date'] ?></td>
                      <td><?php echo $row['time'] ?></td>
                      <td><?php echo $row['price'] ?></td>
                      <form class="" action="item_process_controller.php" method="post">
                        <td>
                          <input type="hidden" name="Sid" value="<?php echo $row['Sid'] ?>" >
                          <input type="hidden" name="" value="<?php echo $row['status'] ?>" id="stat<?php echo $row['Sid'] ?>">
                          <select class="" id="test<?php echo $row['Sid'] ?>" name="status" onchange="myFunction('<?php echo $row['Sid'] ?>')">
                            <option value="pending" <?php if ($row['status']=='pending') { echo "selected";  } ?> >pending</option>
                            <option value="packing" <?php if ($row['status']=='packing') { echo "selected";  } ?>>packing</option>
                            <option value="delivering" <?php if ($row['status']=='delivering') { echo "selected";  } ?>>delivering</option>
                            <option value="finished" <?php if ($row['status']=='finished') { echo "selected";  } ?>>finished</option>
                          </select>
                        </td>


                        <td> <input type="text" id="demo<?php echo $row['Sid'] ?>" name="addTrackId"
                                    value="<?php if ($row['trackId']!="") { echo $row['trackId']; } ?>"
                                    placeholder="enter trackid"
                                    <?php if ($row['status']!='delivering'){
                                            echo "readonly";  } ?> >
                        </td>
                        <td> <input type="hidden" id="addTrackId<?php echo $row['Sid'] ?>" name="btn_addTrackId" value="submit"> </td>

                        <script>
                          document.getElementById('demo'+ <?php echo $current_sid ?>).oninput = function() {
                            document.getElementById('addTrackId'+<?php echo $current_sid ?>).type='submit';
                          };
                        </script>
                      </form>
                    </tr>
                  <?php  }  ?>
               </tbody>
             </table>
           </div>
        </div>
      <div class="">
      <!--  <input type="hidden" name="" value="1" id="stat">
        <select class="" id="test" name="" onchange="myFunction()">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <button type="button" id="demo" name="button">see</button> -->
      </div>

    </div>
  </div>
  </body>
  <script type="text/javascript">


      $(document).ready(function(){
          $("#table-search").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#table tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
          });
        });


        function myFunction(z) {
          var y =document.getElementById("stat"+z).value;
          var x = document.getElementById("test"+z).value;
          var addTrackId=document.getElementById("addTrackId"+z).value;

          if (y!=x) {
            if (x=='delivering') {
              document.getElementById("demo"+z).readOnly = false;
            }else {
              document.getElementById("addTrackId"+z).type="submit";
              document.getElementById("demo"+z).readOnly = true;
            }
          }else {
            if (x=='delivering') {
              document.getElementById("demo"+z).readOnly = false;
            }else {
              document.getElementById("addTrackId"+z).type="hidden";
              document.getElementById("demo"+z).readonly = true;
            }

          }
    }

      // document.getElementById("input").oninput = function() {
      //   result.innerHTML = input.value;
      // };
  </script>
</html>
