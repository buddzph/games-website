<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

function iPay88_signature($source) {
	return base64_encode(yubi_hex2bin(sha1($source)));
}

function yubi_hex2bin($hexSource)
{
	for ($i=0;$i<strlen($hexSource);$i=$i+2)
	{
		$bin .= chr(hexdec(substr($hexSource,$i,2)));
	}
	return $bin;
}

if(isset($_REQUEST['s']) and $_REQUEST['s'] == 1):
	echo iPay88_signature($_REQUEST['MerchantKey'] . $_REQUEST['MerchantCode'] . $_REQUEST['RefNo'] . $_REQUEST['Amount'] . $_REQUEST['Currency']);
endif;
?>


<!DOCTYPE html>
<html>
<head>
	<title>iPay88 SHA1 Generator</title>
</head>
<body>

<form method="postf" action="">
	
	<input type="hidden" name="s" value="1">
	<input type="hidden" name="MerchantKey" value="pbU3gDGvOr">
	<input type="hidden" name="MerchantCode" value="PH00419">
	<input type="hidden" name="Currency" value="PHP">

	<dl>
		<dt>RefNo</dt>
		<dd><input type="text" name="RefNo" value="<?php echo $_REQUEST['RefNo'] ? $_REQUEST['RefNo'] : '' ?>"></dd>
	</dl>
	<dl>
		<dt>Amount</dt>
		<dd><input type="text" name="Amount" value="<?php echo $_REQUEST['Amount'] ? $_REQUEST['Amount'] : '' ?>"></dd>
	</dl>

	<dl>
		<dt>&nbsp;</dt>
		<dd><input type="submit" name="Submit" value="Generate"></dd>
	</dl>

</form>

</body>
</html>