<?php
/*

Class to handle URL manipulation (shorten & expand) via bitby api
and return json output.

*/
require_once('lib/bitly.php');

class BaseURLEncoder {
	
	 const apiToken = "f88403722eccc654c8f5b09627e286d1b987bdf5";
	 
	//-.method shorten long URL.
	//-.@param $longUrl.
	static function urlHandleEncode($longUrl) {
		
		$params = array();
		$params['access_token'] = self::apiToken;
		$params['longUrl'] = $longUrl;
		$params['domain'] = 'j.mp';
		$results = bitly_get('shorten', $params);

		return json_encode($results);
		
	}
	
	//-.method to expand short URL.
	//-.@param $shortUrl.
	static function urlHandleDecode($shortUrl) {
		
		$params = array();
		$params['access_token'] = self::apiToken;
		$params['shortUrl'] = $shortUrl;
		$results = bitly_get('expand', $params, true);

		return(json_encode($results));
	}	
}
?>