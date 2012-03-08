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
	function addOperator($operator_id) {
		return $this->getResponse ( 'addOperator', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * remove the operator from your subscriber list
	 *
	 * @param $operator_id string       	
	 * @return boolean
	 */
	function deleteOperator($operator_id) {
		return $this->getResponse ( 'deleteOperator', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get your all image information
	 *
	 * @return array
	 */
	function getImages($operator_id) {
		return $this->getResponse ( 'getImages', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos($operator_id) {
		return $this->getResponse ( 'getVideos', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string       	
	 * @return object
	 */
	function getVideoDetails($operator_id, $video_id) {
		return $this->getResponse ( 'getVideoDetails', array ('operator_id' => $operator_id, 'video__id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures($operator_id) {
		return $this->getResponse ( 'getBrochures', array ('operator_id' => $operator_id ) );
	}
	
	function getSingleBrochure($operator_id, $brochure_id) {
		return $this->getResponse ( 'getSingleBrochure', array ('operator_id' => $operator_id, 'brochure__id' => $brochure_id ) );
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
		return $this->getResponse ( 'getAlbums', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string       	
	 * @return array
	 */
	function getAlbumImages($operator_id, $album_name) {
		return $this->getResponse ( 'getAlbumImages', array ('operator_id' => $operator_id, 'albumName' => $album_name ) );
	}
	
	/**
	 * get your all products
	 *
	 * @return array
	 */
	function getProducts($operator_id) {
		return $this->getResponse ( 'getProducts', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get descriptions of the product
	 *
	 * @param $product_id string       	
	 * @return object
	 */
	function getProductDescription($operator_id, $product_title) {
		return $this->getResponse ( 'getProductDescription', array ('operator_id' => $operator_id, 'product_title' => $product_title ) );
	}
}

?>