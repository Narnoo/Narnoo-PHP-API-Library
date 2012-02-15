<?php

namespace narnoo;

class NarnooRequest{
 var $app_key = ""; //  App Key From Portal
 var $secret_key = ""; // Secret Key From Portal
 var $response_type = "json"; //xml / json
 var $remote_url = "http://devapi.narnoo.com/xml.php";//http://devapi.narnoo.com/get_result_from_api.php";
 
 function setAuth($appkey,$secretkey){
 	$this->app_key = $appkey;
 	$this->secret_key = $secretkey;
 }
 
 function setResponseType($type){
 	$this->response_type = $type;
 }
 
 function setRemoteUrl($url){
 	$this->remote_url = $url;
 }
 
 function getResponse($method,$params){
 	$config = array('app_key' => app_key, 'secret_key' => secret_key, 'response_type' => response_type, 'action' => $method);
 	
    $data=array_merge($config,$params);
 	
 	$ch = curl_init();
 	curl_setopt($ch, CURLOPT_HEADER, 0);
 	curl_setopt($ch, CURLOPT_VERBOSE, 1);
 	curl_setopt($ch, CURLOPT_HTTPGET, 0);
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 	curl_setopt($ch, CURLOPT_FAILONERROR, 0);
 	curl_setopt($ch, CURLOPT_URL, $this->remote_url);
 	$returned = curl_exec($ch);
 	//parse JSON
 	if($this->response_type == 'json'){
 		return json_decode($returned,true);
 	} else {
 		return	$returned;
 	}
 	curl_close ($ch);
 	
 }
 
 
}