<?php
  session_start();

  $mysqli = new mysqli('localhost','root','','wholesaledb') or die(mysqli_error($mysqli));


  if (isset($_POST['ItemAddBtn'])) {
          $sellerId=$_POST['sellerId'];
          $itemName=$_POST['itemName'];
          //$itemImg=$_POST['itemImg'];
          //$itemImg=$_POST['userfile'];
          $itemType=$_POST['itemType'];
          $itemQuantity=$_POST['itemQuantity'];
          $cashdelivery=false;

          if (isset($_POST['cashdelivery'])) {
            $cashdelivery=true;
          }else {
            $cashdelivery=false;
          }


          $itemPrice_1=$_POST['itemPrice_1'];
          $itemPrice_2=$_POST['itemPrice_2'];
          $itemPrice_3=$_POST['itemPrice_3'];
          $itemPrice_4=$_POST['itemPrice_4'];

          $itemPrice_array=array($itemPrice_1,$itemPrice_2,$itemPrice_3,$itemPrice_4);
          $itemPrice=implode(',',$itemPrice_array);

          $itemRange_1=$_POST['itemRange_1'];
          $itemRange_2=$_POST['itemRange_2'];
          $itemRange_3=$_POST['itemRange_3'];
          $itemRange_4=$_POST['itemRange_4'];

          $itemRange_array=array($itemRange_1,$itemRange_2,$itemRange_3,$itemRange_4);
          $itemRange=implode(',',$itemRange_array);


          $mysqli->query("insert into wholesaleitem (sellerId,itemName,itemType,itemPrice,itemRange,itemQuantity,itemSold,cashdelivery) values('$sellerId','$itemName','$itemType','$itemPrice','$itemRange','$itemQuantity',0,'$cashdelivery')")
                         or die($mysqli->error());

          $result =  $mysqli->query("SELECT MAX(Tid) as maxTid FROM wholesaleitem") or die($mysqli->error());

          $row=$result->fetch_array();
          $maxTid=$row['maxTid'];

          //img uploading
          $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
          );

          function reArrayFiles( $file_post ){
            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for( $i=0;$i<$file_count;$i++){
              foreach ($file_keys as $key ) {
                $file_ary[$i][$key] = $file_post[$key][$i];
              }
            }

            return $file_ary;
          }

          if (isset($_FILES['userfile'])) {
              $file_array = reArrayFiles($_FILES['userfile']);

              for ($i=0; $i < count($file_array) ; $i++) {
                if ($file_array[$i]['error']) {

                }else {
                  $extentions = array('jpg','png','jpeg','jfif');
                  $file_ext = explode('.',$file_array[$i]['name']);

                  $name = $file_ext[0];
                  $name = preg_replace("!-!"," ",$name);
                  $name = ucwords($name);

                  $file_ext = end($file_ext);
                 // echo $file_ext;

                  if (!in_array($file_ext,$extentions)) {
                    ?><div class="">
                      <?php echo "{$file_array[$i]['name']} - Invalid file extentions!"; ?>
                      </div>
                    <?php
                  }else {
                    $img_dir = "img/products_img/".$file_array[$i]['name'];

                    move_uploaded_file($file_array[$i]['tmp_name'],$img_dir);

                    $sql= "insert ignore into product_imgs (Tid,img_name,img_dir) values('$maxTid','$name','$img_dir')";
                    $mysqli->query($sql) or die($mysqli->error);




                  }
                }
              }
          }



          function pre_r( $array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
          }

          // $mysqli->query("insert into wholeSaleItem (sellerId,itemName,itemImg,itemType,itemPrice,itemRange,itemQuantity,itemSold) values('$sellerId','$itemName','$itemImg','$itemType','$itemPrice','$itemRange','$itemQuantity',0)")
          //                 or die($mysqli->error());

          header("Location: item_list.php");
    }

    if (isset($_POST['ItemEditBtn'])) {
              $Tid=$_POST['Tid'];
              //$sellerId=$_POST['sellerId'];
              $itemName=$_POST['itemName'];
              $itemType=$_POST['itemType'];
              $itemQuantity=$_POST['itemQuantity'];
              $itemDiscount=$_POST['itemDiscount'];

              $itemPrice_1=$_POST['itemPrice_1'];
              $itemPrice_2=$_POST['itemPrice_2'];
              $itemPrice_3=$_POST['itemPrice_3'];
              $itemPrice_4=$_POST['itemPrice_4'];

              $itemPrice_array=array($itemPrice_1,$itemPrice_2,$itemPrice_3,$itemPrice_4);
              $itemPrice=implode(',',$itemPrice_array);

              $itemRange_1=$_POST['itemRange_1'];
              $itemRange_2=$_POST['itemRange_2'];
              $itemRange_3=$_POST['itemRange_3'];
              $itemRange_4=$_POST['itemRange_4'];

              $itemRange_array=array($itemRange_1,$itemRange_2,$itemRange_3,$itemRange_4);
              $itemRange=implode(',',$itemRange_array);

              $mysqli->query("update wholesaleitem set itemName='$itemName',itemType='$itemType',itemPrice='$itemPrice',itemRange='$itemRange',itemQuantity='$itemQuantity',itemDiscount='$itemDiscount' where Tid='$Tid'")
                              or die($mysqli->error());

              header("Location: item_list.php");

      }

      if(isset($_GET['ItemDelete'])){
              $Tid=$_GET['ItemDelete'];

              $mysqli->query("delete from wholesaleitem where Tid='$Tid' ") or die ($mysqli->error());
              $mysqli->query("delete from product_imgs where Tid='$Tid' ") or die ($mysqli->error());
              header("Location: item_list.php");
      }

      //in order_item page
      if (isset($_POST['OrderAddBtn'])) {
              $remainingQuantity=0;
              $tot_sold=0;
              $before_sold=0;
              $quantity=0;
              $Tid=$_POST['Tid'];
              $uid=$_POST['uid'];
              $amount=$_POST['amount'];
              $totcost=$_POST['totcost'];

              $date=date("Y/m/d");
              $time=date("h:i:sa");

              $status="pending";

              $result=$mysqli->query("select * from wholesaleitem where Tid='$Tid'") or die($mysqli->error);
                while ($row=$result->fetch_assoc()) {
                  $quantity=$row['itemQuantity'];
                  $before_sold=$row['itemSold'];
                }

              $tot_sold=$before_sold+$amount;
              $remainingQuantity=$quantity-$amount;

              $mysqli->query("update wholesaleitem set itemQuantity='$remainingQuantity',itemSold='$tot_sold' where Tid='$Tid'")
                              or die($mysqli->error());

              $mysqli->query("insert into product_sold (Tid,uid,amount,date,time,price,status) values('$Tid','$uid','$amount','$date','$time',$totcost,'$status')")
                              or die($mysqli->error());


              header("Location: Order_item.php?Tid=$Tid");

      }
///php cart function

      if (isset($_POST['addcartBtn'])) {
        $Tid=$_POST['Tid'];
        $amount=$_POST['amount'];
        $totcost=$_POST['totcost'];

        if (isset($_SESSION['shopping_cart'])) {
          $item_array_id = array_column ($_SESSION['shopping_cart'], 'Tid');
          if (!in_array($_POST['Tid'],$item_array_id) ) {
            $count = count($_SESSION['shopping_cart']);

            $itemArray = $arrayName = array(
              'Tid'     => $Tid,
              'amount'  => $amount,
              'totcost' => $totcost
            );
            $_SESSION['shopping_cart'][$count] = $itemArray;
          //  echo "<script>alert('Now added')</script>";
          //  header("Location : cart2.php");
          }else {
          //  echo "<script>alert('already added')</script>";
          //  header("Location : cart2.php");
          }
          header("Location: cart2.php");
        }else {
          $itemArray = array(
            'Tid'     => $Tid,
            'amount'  => $amount,
            'totcost' => $totcost
          );
          $_SESSION['shopping_cart'][0] = $itemArray;
          header("Location: cart2.php");
        }

    }

    if (isset($_POST['DeleteCartItem'])) {
      foreach ($_SESSION['shopping_cart'] as $key => $value) {
        if ($value['Tid'] == $_POST['Tid']) {
          unset($_SESSION['shopping_cart'][$key]);
        }
      }

      header("Location: cart2.php");
    }

////////////////////
      if (isset($_POST['cartOrderAddBtn'])) {

              $fname = $_POST['fname'];
              $lname = $_POST['lname'];
              $country = $_POST['country'];
              $address = $_POST['address'];
              $town = $_POST['town'];
              $province = $_POST['province'];
              $email = $_POST['email'];
              $phone = $_POST['phone'];

              $Tid=$_POST['Tid'];
              $uname=$_POST['uname'];
              $amount=$_POST['amount'];
              $cost=$_POST['cost'];
              $total = $_POST['total'];

              $status="pending";

              $date=date("Y/m/d");
              $time=date("h:i:sa");

              function pre_r( $array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
              }

              $mysqli->query("update users set phone='$phone',fname='$fname',lname='$lname',country='$country',province='$province',town='$town',address='$address' where uname='$uname'")
                              or die($mysqli->error());

              for ($i=0; $i < count($Tid) ; $i++) {
                $before_sold=0;
                $quantity=0;
                $remainingQuantity=0;
                $tot_sold=0;


                $result=$mysqli->query("select * from wholesaleitem where Tid='$Tid[$i]'") or die($mysqli->error);
                  while ($row=$result->fetch_assoc()) {
                    $quantity=$row['itemQuantity'];
                    $before_sold=$row['itemSold'];
                  }

                $tot_sold=$before_sold+$amount[$i];
                $remainingQuantity=$quantity-$amount[$i];

                $mysqli->query("update wholesaleitem set itemQuantity='$remainingQuantity',itemSold='$tot_sold' where Tid='$Tid[$i]'")
                                or die($mysqli->error());


                $mysqli->query("insert into product_sold (Tid,uid,amount,date,time,price,status,fname,lname,email,phone,country,province,town,address) values('$Tid[$i]','$uname','$amount[$i]','$date','$time',$cost[$i],'$status','$fname','$lname','$email','$phone','$country','$province','$town','$address')")
                                or die($mysqli->error());


                if ($mysqli == true) {
                  unset($_SESSION['shopping_cart']);
                }

                header("Location: cart2.php");


                  //$_SESSION['cartSuccess'] = "success";


            }

      }

      if (isset($_POST['addReviewBtn'])) {
              $Tid=$_POST['Tid'];
              $uname=$_POST['username'];
              $newRate=$_POST['newRate'];
              $review=$_POST['review'];

              $mysqli->query("insert into reviewItem (Tid,sellerId,rating,review) values('$Tid','$uname','$newRate','$review')")
                              or die($mysqli->error());

            //  header("Location: Order_item.php?Tid=$Tid");

              $rate=0;
              $tot_rid=0;
              $rate_tot=0;

              $result2=$mysqli->query("select sum(rating) as total_rating,count(Rid) as total_Rid from reviewItem where Tid='$Tid'") or die($mysqli->error);
              while ($row2 = $result2->fetch_assoc()) {
                $rate_tot=$row2['total_rating'];
                $tot_rid=$row2['total_Rid'];
              }
              if($tot_rid!=0){
                $rate=$rate_tot/$tot_rid;
                $rate=round($rate);
              }else {
                $rate=0;
              }

              $mysqli->query("update wholesaleitem set avgRating='$rate' where Tid='$Tid'")
                              or die($mysqli->error());

              header("Location: Order_item.php?Tid=$Tid");
      }


//in item_edit page (delete images)
      if (isset($_GET['action'])) {
        $Tid=$_GET['Tid'];

        if ($_GET['action']=='deleteImg' && isset($_GET['Pid'])) {
          $Pid=$_GET['Pid'];

          $mysqli->query("delete from product_imgs where Pid='$Pid' ") or die ($mysqli->error());
          header("Location: item_edit.php?Tid=$Tid");
        }else{
          header("Location: item_edit.php?Tid=$Tid");
        }
      }

//in item_edit page(add more images)
      if (isset($_POST['addMoreImg_btn'])) {
        $Tid=$_POST['Tid'];

          $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
          );

          function reArrayFiles( $file_post ){
            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for( $i=0;$i<$file_count;$i++){
              foreach ($file_keys as $key ) {
                $file_ary[$i][$key] = $file_post[$key][$i];
              }
            }

            return $file_ary;
          }

          if (isset($_FILES['userfile'])) {
              $file_array = reArrayFiles($_FILES['userfile']);

              for ($i=0; $i < count($file_array) ; $i++) {
                if ($file_array[$i]['error']) {
                  ?><div class="">
                    <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']]; ?>
                    </div>
                  <?php
                }else {
                  $extentions = array('jpg','png','jpeg','jfif');
                  $file_ext = explode('.',$file_array[$i]['name']);

                  $name = $file_ext[0];
                  $name = preg_replace("!-!"," ",$name);
                  $name = ucwords($name);

                  $file_ext = end($file_ext);
                  echo $file_ext;

                  if (!in_array($file_ext,$extentions)) {
                    ?><div class="">
                      <?php echo "{$file_array[$i]['name']} - Invalid file extentions!"; ?>
                      </div>
                    <?php
                  }else {
                    $img_dir = "img/products_img/".$file_array[$i]['name'];

                    move_uploaded_file($file_array[$i]['tmp_name'],$img_dir);

                    $sql= "insert ignore into product_imgs (Tid,img_name,img_dir) values('$Tid','$name','$img_dir')";
                    $mysqli->query($sql) or die($mysqli->error);



                    ?><div class="">
                      <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']]; ?>
                      </div>
                    <?php
                  }
                }
              }
          }



          function pre_r( $array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
          }

          header("Location: item_edit.php?Tid=$Tid");
}

//in admin-order page add track id

      if (isset($_POST['btn_addTrackId'])) {
        $Sid=$_POST['Sid'];
        $addTrackId=$_POST['addTrackId'];
        $status=$_POST['status'];

        if ($status=='delivering') {
          $mysqli->query("update product_sold set trackId='$addTrackId',status='$status' where Sid='$Sid'")
                          or die($mysqli->error());
        }else {
          $mysqli->query("update product_sold set status='$status' where Sid='$Sid'")
                          or die($mysqli->error());
        }

        // $mysqli->query("update product_sold set trackId='$addTrackId',status='$status' where Sid='$Sid'")
        //                 or die($mysqli->error());

        header("Location: Admin-Order.php");
      }

 ?>
