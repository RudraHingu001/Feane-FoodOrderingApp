<?php
session_start();
 
define("PAYFAST_MERCHANT_ID", "10028877");
define("PAYFAST_MERCHANT_KEY", "py1k6ihgrafu4");
define("PAYFAST_PASSPHRASE", "RudraHJH3185");
define("PAYFAST_RETURN_URL", "http://localhost/Rudra/feane-1.0.0/payfast/return.php");
define("PAYFAST_CANCEL_URL", "http://localhost/Rudra/feane-1.0.0/payfast/cancel.php");
define("PAYFAST_NOTIFY_URL", "http://localhost/Rudra/feane-1.0.0/payfast/notify.php");
define("PAYFAST_SANDBOX_MODE", true); // set it to false to make it live