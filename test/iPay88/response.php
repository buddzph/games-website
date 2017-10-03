<!DOCTYPE html>
<html>
<head>
	<title>iPay88 Response Page</title>
</head>
<body>

<?php

$merchantcode = $_REQUEST["MerchantCode"];
$paymentid = $_REQUEST["PaymentId"];
$refno = $_REQUEST["RefNo"];
$amount = $_REQUEST["Amount"];
$ecurrency = $_REQUEST["Currency"];
$remark = $_REQUEST["Remark"];
$transid = $_REQUEST["TransId"];
$authcode = $_REQUEST["AuthCode"];
$estatus = $_REQUEST["Status"];
$errdesc = $_REQUEST["ErrDesc"];
$signature = $_REQUEST["Signature"];

?>

<pre>
<?php print_r($_REQUEST); ?>
</pre>

</body>
</html>