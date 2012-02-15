<?php
namespace narnoo;

require_once ('narnoo/class-narnoo-request.php');

class DistributorNarnooRequest extends NarnooRequest {
	
	function __construct() {
	
	}
	
	function addOperators($operator_id) {
		return $this->getResponse ( 'addOperators', array ('operator_id' => $operator_id ) );
	}
	function deleteOperators($operator_id) {
		return $this->getResponse ( 'deleteOperators', array ('operator_id' => $operator_id ) );
	}
	function getImages() {
		return $this->getResponse ( 'getImages', null );
	}
	function getVideos() {
		return $this->getResponse ( 'getVideos', null );
	}
	function getBrochures() {
		return $this->getResponse ( 'getBrochures', null );
	}
	function getVideoDetails($video_id) {
		return $this->getResponse ( 'getVideoDetails', array ('video_id' => $video_id ) );
	}
	function getBrochureDetails($brochure_id) {
		return $this->getResponse ( 'getBrochureDetails', array ('brochure_id' => $brochure_id ) );
	}
	function getAlbums() {
		return $this->getResponse ( 'getAlbums', null );
	}
	function getAlbumImages($album_id) {
		return $this->getResponse ( 'getAlbumImages', array ('album_id' => $album_id ) );
	}
	function getProducts() {
		return $this->getResponse ( 'getProducts', null );
	}
	function getProductDescriptions($product_id) {
		return $this->getResponse ( 'getProductDescription', array ('product_id' => $product_id ) );
	}
}

?>