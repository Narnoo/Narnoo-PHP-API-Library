<?php


require_once ('narnoo/class-narnoo-request.php');

/**
 * The narnoo request methods for distributor
 * 
 * @author dayi
 *        
 */
class DistributorNarnooRequest extends NarnooRequest {
	
	/**
	 * add an operator in subscriber list
	 *
	 * @param $operator_id string   
	 * @return boolean    	
	 */
	function addOperators($operator_id) {
		return $this->getResponse ( 'addOperators', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * remove the operator from your subscriber list
	 * 
	 * @param string $operator_id
	 * @return boolean
	 */
	function deleteOperators($operator_id) {
		return $this->getResponse ( 'deleteOperators', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get your all image information
	 * @return array
	 */
	function getImages() {
		return $this->getResponse ( 'getImages', null );
	}
	
	/**
	 * get your all videos information
	 * @return array
	 */
	function getVideos() {
		return $this->getResponse ( 'getVideos', null );
	}
	
	
	/**
	 * get detail information of the video
	 * 
	 * @param string $video_id
	 * @return object
	 */
	function getVideoDetails($video_id) {
		return $this->getResponse ( 'getVideoDetails', array ('video_id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 * 
	 * @return array
	 */
	function getBrochures() {
		return $this->getResponse ( 'getBrochures', null );
	}
	
	/**
	 * get detail information of the brochure
	 * 
	 * @param string $brochure_id
	 * @return Object
	 */
	function getBrochureDetails($brochure_id) {
		return $this->getResponse ( 'getBrochureDetails', array ('brochure_id' => $brochure_id ) );
	}
	
	/**
	 * get your all albums
	 * 
	 * @return array
	 */
	function getAlbums($distributor_id) {
		return $this->getResponse ('getAlbums', array('operator_id'=>$distributor_id) );
	}
	
	/**
	 * get images of an album
	 * 
	 * @param string $album_id
	 * @return array
	 */
	function getAlbumImages($album_id) {
		return $this->getResponse ( 'getAlbumImages', array ('album_id' => $album_id ) );
	}
	
	/**
	 * get your all products
	 * 
	 * @return array
	 */
	function getProducts() {
		return $this->getResponse ( 'getProducts', null );
	}
	
	/**
	 * get descriptions of the product
	 * 
	 * @param string $product_id
	 * @return object
	 */
	function getProductDescriptions($product_id) {
		return $this->getResponse ( 'getProductDescription', array ('product_id' => $product_id ) );
	}
}

?>