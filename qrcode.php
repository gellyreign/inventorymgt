<?php 
	require_once('phpqrcode/qrlib.php');
	$qr = $_GET['qr'];
	QRcode::png($qr, false, 'L', 6,2);
?>