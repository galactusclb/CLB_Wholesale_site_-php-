<?php

  define('PAYPAL_ID', 'info@codexworld.com');
  define('PAYPAL_SANDBOX', TRUE);

  define('PAYPAL_RETURN_URL', 'http://localhost/CLB_Wholesale_site/checkout.php');
  define('PAYPAL_CANCEL_URL', 'http://localhost/CLB_Wholesale_site/checkout.php');
  define('PAYPAL_NOTIFY_URL', 'http://localhost/CLB_Wholesale_site/checkout.php');
  define('PAYPAL_CURRENCY', 'USD');


  define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");
 ?>
