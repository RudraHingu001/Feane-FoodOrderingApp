<?php
session_start();

require_once("config.php");
  
require_once("../DB/connect.php");


$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);


function generateSignature($data, $passPhrase = null) {
    // Create parameter string
    $pfOutput = '';
    foreach( $data as $key => $val ) {
        if($val !== '') {
            $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
        }
    }
    // Remove last ampersand
    $getString = substr( $pfOutput, 0, -1 );
    if( $passPhrase !== null ) {
        $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
    }
    return md5( $getString );
}
 
// generate unique payment id
$payment_id = time().uniqid();

$_SESSION['payment_id'] = $payment_id;

$total = 0;
$name = '';
$user_id = $_SESSION['id'];
$products = $_SESSION['cart'];
foreach ($products as $key => $value) {
  $ptotal = $value['price'] * $value['quantity'];
  $total = $total + $ptotal;
}

$query = "INSERT INTO `order`(user_id,total_payment,payment_id,status) VALUES($user_id,$total,'$payment_id','pending')";
if (mysqli_query($db,$query)) {
    $last_id = $db->insert_id;
    foreach ($products as $key => $value) {
        if (count($products) > 1) {
            $name = ','.$value['pname'];
        }else{
            $name = $value['pname'];
        }
        $pid = $value['p_id'];
        $qun = $value['quantity'];
        $price = $value['price'];
        $query_det = "INSERT INTO `order_details`(o_id,p_id,quantity,price) VALUES($last_id,$pid,$qun,$price)";

        if (mysqli_query($db,$query_det)) {
            
        }
        else{
            echo "query does not run".mysqli_error($db);
        }
    }
    
}else{
    echo "query does not run".mysqli_error($db);
}

$data = array(
    // Merchant details
    'merchant_id' => PAYFAST_MERCHANT_ID,
    'merchant_key' => PAYFAST_MERCHANT_KEY,
    'return_url' => PAYFAST_RETURN_URL,
    'cancel_url' => PAYFAST_CANCEL_URL,
    'notify_url' => PAYFAST_NOTIFY_URL,
    // Buyer details
    'name_first' => $_SESSION['name'],
    'email_address'=> $_SESSION['email'],
    // Transaction details
    'm_payment_id' => $payment_id, //Unique payment ID to pass through to notify_url
    'amount' => number_format( sprintf( '%.2f', $total ), 2, '.', '' ),
    'item_name' => 'aaushi'
);
 
$signature = generateSignature($data, PAYFAST_PASSPHRASE);
$data['signature'] = $signature;
 
$pfHost = PAYFAST_SANDBOX_MODE ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
$htmlForm = '<form action="https://'.$pfHost.'/eng/process" method="post" id="frmPayment">';
foreach($data as $key=> $value)
{
    $htmlForm .= '<input name="'.$key.'" type="hidden" value=\''.$value.'\' />';
}
$htmlForm .= '<input type="submit" value="Pay Now" style="display:none;" /></form>';
echo $htmlForm;
?>
 
<h3>Redirecting to a PayFast...</h3>
 
<script>
window.addEventListener('load', (event) => {
    document.getElementById("frmPayment").submit();
});
</script>