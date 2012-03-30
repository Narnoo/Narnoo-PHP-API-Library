<?php



class NarnooRequest{
 var $app_key = ""; //  App Key From Portal
 var $secret_key = ""; // Secret Key From Portal
 var $response_type = "json"; //xml / json
 var $requiredSSL = false;
 
 function setAuth($appkey,$secretkey){
 	$this->app_key = $appkey;
 	$this->secret_key = $secretkey;
 }
 
 function  setRequriedSSL($requried_ssl){
 	$this->requiredSSL = $requried_ssl == true;
 }

 
 function getResponse($remote_url, $method,$params){
 	$config = array('app_key' => $this->app_key, 'secret_key' => $this->secret_key, 'response_type' => $this->response_type, 'action' => $method);
 	if($params == null){
 		$params = array();
 	}
    $data=array_merge($config,$params);
 	
    if($this->requiredSSL == true){
    	$url = "https://"+$remote_url;
    }else{
    	$url = "http://"+$remote_url;
    }
    
 	$ch = curl_init();
 	curl_setopt($ch, CURLOPT_HEADER, 0);
 	curl_setopt($ch, CURLOPT_VERBOSE, 1);
 	curl_setopt($ch, CURLOPT_HTTPGET, 0);
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 	curl_setopt($ch, CURLOPT_FAILONERROR, 0);
 	curl_setopt($ch, CURLOPT_URL, $url);
 	$returned = curl_exec($ch);
 	//parse JSON
 	if($this->response_type == 'json'){
 		return json_decode($returned);
 	} else {
 		return	$returned;
 	}
 	curl_close ($ch);
 	
 }
 
 
 
 
}