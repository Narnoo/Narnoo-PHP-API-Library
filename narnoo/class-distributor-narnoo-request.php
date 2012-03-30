<?php

require_once ('narnoo/class-narnoo-request.php');

/**
 * The narnoo request methods for distributor
 *
 * @author dayi
 *        
 */
class DistributorNarnooRequest extends NarnooRequest {
	
	
	var $interaction_url = "http://devapi.narnoo.com/xml.php";//Distributor -> Operator Interaction
	var $dist_url = "http://devapi.narnoo.com/dist_xml.php";//Distributor's own account
	
	/**
	 * add an operator in subscriber list
	 *
	 * @param $operator_id string       	
	 * @return boolean
	 */
	function addOperator($operator_id) {
		return $this->getResponse ($this->interaction_url, 'addOperator', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * remove the operator from your subscriber list
	 *
	 * @param $operator_id string       	
	 * @return boolean
	 */
	function deleteOperator($operator_id) {
		return $this->getResponse ($this->interaction_url,  'deleteOperator', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get your all image information
	 *
	 * @return array
	 */
	function getImages($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getImages', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getVideos', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string       	
	 * @return object
	 */
	function getVideoDetails($operator_id, $video_id) {
		return $this->getResponse ($this->interaction_url,  'getVideoDetails', array ('operator_id' => $operator_id, 'video__id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getBrochures', array ('operator_id' => $operator_id ) );
	}
	
	function getSingleBrochure($operator_id, $brochure_id) {
		return $this->getResponse ($this->interaction_url,  'getSingleBrochure', array ('operator_id' => $operator_id, 'brochure__id' => $brochure_id ) );
	}
	
	/**
	 * get detail information of the brochure
	 *
	 * @param $brochure_id string       	
	 * @return Object
	 */
	//function getBrochureDetails($operator_id,$brochure_id) {
	//	return $this->getResponse ( 'getBrochureDetails', array ('operator_id' => $operator_id, 'brochure_id' => $brochure_id ));
	//}
	
	/**
	 * get your all albums
	 *
	 * @return array
	 */
	function getAlbums($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getAlbums', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string       	
	 * @return array
	 */
	function getAlbumImages($operator_id, $album_name) {
		return $this->getResponse ($this->interaction_url,  'getAlbumImages', array ('operator_id' => $operator_id, 'albumName' => $album_name ) );
	}
	
	/**
	 * get your all products
	 *
	 * @return array
	 */
	function getProducts($operator_id) {
		return $this->getResponse ($this->interaction_url,  'getProducts', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get descriptions of the product
	 *
	 * @param $product_id string       	
	 * @return object
	 */
	function getProductDescription($operator_id, $product_title) {
		return $this->getResponse ($this->interaction_url,  'getProductDescription', array ('operator_id' => $operator_id, 'product_title' => $product_title ) );
	}
	
	/*
	 * find opertators by some criterias 
	 * 
	 */
	function searchOperators($country,$category,$subcategory,$state,$suburb,$postal_code){
	  $params = array();
	  
	  if (is_null($country) == false || empty($country)  == false){
	  	$params = array_merge($params,array("country" => $country));
	  }
	  
	  if (is_null($category) == false || empty($category)  == false){
	  	$params = array_merge($params,array("category" => $category));
	  }
	  
	  if (is_null($subcategory) == false || empty($subcategory)  == false){
	  	$params = array_merge($params,array("subcategory" => $subcategory));
	  }
	  
	  if (is_null($state) == false || empty($state)  == false){
	  	$params = array_merge($params,array("state" => $state));
	  }
	  
	  if (is_null($suburb) == false || empty($suburb)  == false){
	  	$params = array_merge($params,array("suburb" => $suburb));
	  }
	  
	  if (is_null($postal_code) == false || empty($postal_code)  == false){
	  	$params = array_merge($params,array("postal_code" => $postal_code));
	  }
	  
	  return $this->getResponse($this->interaction_url, "searchOperators", $params);

	}
	
	/**
	 * 
	 * 
	 * 
	 */
	 //function getImages(){
	 //	
	// }
}

?>