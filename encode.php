<?php 
	function encode($str){
		$encoded = strrev($str);
		$encoded = base64_encode($encoded);
		$encoded = strrev($encoded);
		$encoded = str_rot13($encoded);
		$encoded = strrev($encoded);
		$encoded = base64_encode($encoded);
		return $encoded;
	}

	function decode($str){
		$encoded = base64_decode($str);
		$encoded = strrev($encoded);
		$encoded = str_rot13($encoded);
		$encoded = strrev($encoded);
		$encoded = base64_decode($encoded);
		$encoded = strrev($encoded);

		return $encoded;
	}
 ?>