<?php

class NarnooRequest {
	var $app_key = ""; // App Key From Portal
	var $secret_key = ""; // Secret Key From Portal
	var $response_type = "json"; // xml / json
	var $requiredSSL = false;
	var $sandbox = true;
	
	// Distributor's own account
	
	// Distributor -> Operator Interaction
	
	var $api_dist_xml = "devapi.narnoo.com/dist_xml.php";
	var $api_live_dist_xml = "api.narnoo.com/dist_xml.php";
	
	var $api_xml = "devapi.narnoo.com/xml.php";
	var $api_live_xml = "api.narnoo.com/xml.php";
	
	var $api_op_xml = "devapi.narnoo.com/op_xml.php";
	var $api_live_op_xml = "api.narnoo.com/op_xml.php";
	
	function getDistXmlApi() {
		if ($this->sandbox == true) {
			return $this->api_dist_xml;
		} else {
			return $this->api_live_dist_xml;
		}
	}
	
	function getXmlApi() {
		if ($this->sandbox == true) {
			return $this->api_xml;
		} else {
			return $this->api_live_xml;
		}
	}
	
	function getOpXmlApi() {
		if ($this->sandbox == true) {
			return $this->api_op_xml;
		} else {
			return $this->api_live_op_xml;
		}
	}
	
	function setAuth($appkey, $secretkey) {
		$this->app_key = $appkey;
		$this->secret_key = $secretkey;
	}
	
	function setRequriedSSL($requried_ssl) {
		$this->requiredSSL = $requried_ssl == true;
	}
	
	function getResponse($remote_url, $method, $params) {
		$config = array ('app_key' => $this->app_key, 'secret_key' => $this->secret_key, 'response_type' => $this->response_type, 'action' => $method );
		if ($params == null) {
			$params = array ();
		}
		$data = array_merge ( $config, $params );
		
		if ($this->requiredSSL == true) {
			$url = "https://" . $remote_url;
		} else {
			$url = "http://" . $remote_url;
		}
		
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_VERBOSE, 1 );
		curl_setopt ( $ch, CURLOPT_HTTPGET, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt ( $ch, CURLOPT_FAILONERROR, 0 );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		$returned = curl_exec ( $ch );
		
		$response = "";
		
		if ($this->response_type == 'json') {
			// startsWith '{"error":{"errorCode":'
			if (substr ( $returned, 0, 22 ) === '{"error":{"errorCode":') {
				$error = json_decode ( $returned )->error;
				$errorCode = $error->errorCode;
				$errorMessage = '[' . $error->errorCode . ']' . $error->errorMessage;
				
				throw new Exception ( $errorMessage );
			}
			
			$response = json_decode ( $returned );
		} else {
			$xml = simplexml_load_string ( $returned );
			
			$error = $xml->xpath ( '//error' );
			
			if (isset ( $error ) && count($error)>0) {
				$errorCodeNodes = $xml->xpath ( '//error/errorCode' );
				$errorMessageNodes = $xml->xpath ( '//error/errorMessage' );
				$errorMessage = '[' . $errorCodeNodes[0] . ']' . $errorMessageNodes[0];
				
				throw new Exception ( $errorMessage );
			}
			$response = $returned;
		}
		curl_close ( $ch );
		
		return $response;
	
	}

}


//class NarrooException{
//	var $Error;
//}