<?php
include("narnoo_config.php");
	
class NarnooAPI {
	
	public $operator_id;
	public $method;
	public $result;
	public $data = array();
	public $APIresponse;
	
	//Add Operators
	function addNarnooOperator($operator_id) {  
	 			$method = 'addOperator';
	 			$this->operator_id = $operator_id;
				$this->RESTcall();
				
				$result = $this->RESTcall($method,$operator_id);
				
				return $result;
				
	
	 }
	 
	 //Delete Operators
	 function deleteNarnooOperator($operator_id) {  
	 			$method = 'deleteOperator';
	 			$this->operator_id = $operator_id;
				$this->RESTcall();
				
				$result = $this->RESTcall($method,$operator_id);
				
	
	 }
	
	 //Get Operator Images
	 function getNarnooImages($operator_id) {  
	 			$method = 'getImages';
	 			$this->operator_id = $operator_id;
				$this->RESTcall();
				
				$result = $this->RESTcall($method,$operator_id);
				
				return $result;
	
	 }
	 
	 // Get Operator Album Names
	 function getNarnooAlbumNames($operator_id){
				$method = 'getAlbums'; 
		 		$this->operator_id = $operator_id;
				$this->RESTcall();
				
				$result = $this->RESTcall($method,$operator_id);
				
				return $result;
	 }
	 
	  //Get Narnoo Videos
	  function getNarnooVideos($operator_id) {  
	 			$method = 'getVideos';
	 			$this->operator_id = $operator_id;
				$this->RESTcall();
				
				$result = $this->RESTcall($method,$operator_id);
				
				return $result;
	

	 }	
		 	
		
		//Make the REST call
public function RESTcall($method,$operator_id){
		$data = array('app_key' => app_key, 'secret_key' => secret_key, 'response_type' => response_type, 'action' => $method, 'operator_id' => $operator_id);
		$xmlUrl = 'http://devapi.narnoo.com/xml.php'; // this link will change once moved to live service.
		$xmlUrl = 'http://devapi.narnoo.com/xml.php'; // XML feed file/URL
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		curl_setopt($ch, CURLOPT_HTTPGET, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_FAILONERROR, 0);
		curl_setopt($ch, CURLOPT_URL, $xmlUrl);
		$returned = curl_exec($ch);
		//parse JSON
		if(response_type == 'json'){	
		$APIresponse = json_decode($returned,true);
			return	$APIresponse;
		} else {
			return	$returned;
		}
		curl_close ($ch);
		
	}




}//class end



?>