<?php
	header('Access-Control-Allow-Origin: *');
	$sProduct = file_get_contents("product.json");
	$oProduct = json_decode( $sProduct );
	$oProduct->price ++;
	// write back to the file
	$sProduct = json_encode( $oProduct );
	file_put_contents( "product.json", $sProduct );
	echo '{"status":"ok", "service":"buy-product", "price":'.$oProduct->price.'}';
?>	