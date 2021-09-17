<?php
  session_start();
  require('crediantial.php');

  require 'item_process_controller.php';
   //$mysqli = new mysqli('localhost','id11536653_clbwholesale','16InDJ5V2SoODxeHtw!Y','id11536653_wholesale') or die(mysqli_error($mysqli));


  if (isset($_POST['btn_login'])) {
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];

    $result = $mysqli-> query("select * from users where uname='$uname' and pass= '$pass' ") or die ($mysqli->error());



    if($result->num_rows){
       while ($row=$result->fetch_assoc()) {
         $_SESSION['username'] = $uname;
         $_SESSION['role'] = $row['role'];

         if (!isset($_POST['url'])) {
            header("Location: shopping.php");
         }else {
            header("Location: {$_POST['url']}");
          }
       }
    }else {
      //$_SESSION['popLogin'] = "window.addEventListener('load', loginCheck);";
      if (isset($_POST['url'])) {
        header("Location: {$_POST['url']}");
      }else {
        header("Location: login.php");
       }
     }

  }

  if (isset($_POST['btn_register'])) {
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];

    $token = md5(rand('10000','99999'));
    $status = 'Inactive';

    $mysqli->query("insert into users (uname,pass,email,role,token,status) values('$uname','$pass','$email','user','$token','$status')") or die ($mysqli->error());

    // $last_id = mysqli_insert_id($mysqli);
    // $url = 'http:///Wholesale/verify.php?id='.$last_id.'&token='.$token;

    // $output = '<div>Thank for registration with us.<br>'.$url.'</div>';

    // if($mysqli==true){

    //   $mail = new PHPMailer;

    //     //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //     $mail->isSMTP();                                      // Set mailer to use SMTP
    //     $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //     $mail->Username = 'clbtrollwarlord@gmail.com';                 // SMTP username
    //     $mail->Password = 'Chanaka123@';                           // SMTP password
    //     $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //     $mail->Port = 587;                                    // TCP port to connect to

    //     $mail->setFrom('clbtrollwarlord@gmail.com', 'gg');
    //     $mail->addAddress('cocclb123@gmail.com', 'Joe User');     // Add a recipient

    //     $mail->isHTML(true);                                  // Set email format to HTML

    //     $mail->Subject = 'Here is the subject';
    //     $mail->Body    = 'wade hari';
    //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //     if(!$mail->send()) {
    //         echo 'Message could not be sent.';
    //         echo 'Mailer Error: ' . $mail->ErrorInfo;
    //     } else {
    //         echo 'Message has been sent';
    //     }

    // }
    if($result->num_rows){
      header("Location: login.php");
    }else{
      header("Location: asd.php");
    }
  }


  if (isset($_GET['action'])) {
    if ($_GET['action']=='logout') {
      //session_destroy();
      unset($_SESSION['username']);
      unset($_SESSION['role']);

      if (isset($_GET['url'])) {
        header("Location: {$_GET['url']}");
      }else {
        header("Location: login.php");
      }
    }else{
      header("Location: shopping.php");
    }
  }
 ?>
