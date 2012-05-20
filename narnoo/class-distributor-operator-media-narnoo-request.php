<?php

// require_once ('narnoo/class-narnoo-request.php');

class DistributorOperatorMediaNarnooRequest extends NarnooRequest {
	
	var $remote_url = "devapi.narnoo.com/xml.php"; // Distributor -> Operator
	
	var $live_remote_url = "api.narnoo.com/xml.php"; // Distributor -> Operator
	/*
	 * Distributor's Own Media Requests
	 */
	
	/**
	 * get your all image information
	 *
	 * @return array
	 */
	function getImages($operator_id) {
		return $this->getResponse ( $this->getXmlApi(), 'getImages', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get your all albums
	 *
	 * @return array
	 */
	function getAlbums($operator_id) {
		return $this->getResponse ( $this->getXmlApi(), 'getAlbums', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string       	
	 * @return array
	 */
	function getAlbumImages($operator_id, $album_name) {
		return $this->getResponse ( $this->getXmlApi(), 'getAlbumImages', array ('operator_id' => $operator_id, 'album__name' => $album_name ) );
	}
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos($operator_id) {
		return $this->getResponse ( $this->getXmlApi(), 'getVideos', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string       	
	 * @return object
	 */
	function getVideoDetails($operator_id, $video_id) {
		return $this->getResponse ( $this->getXmlApi(), 'getVideoDetails', array ('operator_id' => $operator_id, 'video_id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures($operator_id) {
		return $this->getResponse ( $this->getXmlApi(), 'getBrochures', array ('operator_id' => $operator_id ) );
	}
	
	function getSingleBrochure($operator_id, $brochure_id) {
		return $this->getResponse ( $this->getXmlApi(), 'getSingleBrochure', array ('operator_id' => $operator_id, 'brochure_id' => $brochure_id ) );
	}
	
	function searchMedia($media_type, $business_name, $country, $state, $category, $subcategory, $suburb, $location, $postal_code, $latitude, $longitude, $keywords) {
		
		$params = array ();
		
		if (is_null ( $media_type ) || empty ( $media_type )) {
			$media_type = "image";
		}
		
		$params = array_merge ( $params, array ("media_type" => $media_type ) );
		
		if (is_null ( $country ) == false && empty ( $country ) == false) {
			$params = array_merge ( $params, array ("country" => $country ) );
		}
		
		if (is_null ( $state ) == false && empty ( $state ) == false) {
			$params = array_merge ( $params, array ("state" => $state ) );
		}
		
		if (is_null ( $category ) == false && empty ( $category ) == false) {
			$params = array_merge ( $params, array ("category" => $category ) );
		}
		
		if (is_null ( $subcategory ) == false && empty ( $subcategory ) == false) {
			$params = array_merge ( $params, array ("subcategory" => $subcategory ) );
		}
		
		if (is_null ( $suburb ) == false && empty ( $suburb ) == false) {
			$params = array_merge ( $params, array ("suburb" => $suburb ) );
		}
		
		if (is_null ( $location ) == false && empty ( $location ) == false) {
			$params = array_merge ( $params, array ("location" => $location ) );
		}
		
		if (is_null ( $postal_code ) == false && empty ( $postal_code ) == false) {
			$params = array_merge ( $params, array ("postal_code" => $postal_code ) );
		}
		
		if (is_null ( $latitude ) == false && empty ( $latitude ) == false) {
			$params = array_merge ( $params, array ("latitude" => $latitude ) );
		}
		
		if (is_null ( $longitude ) == false && empty ( $longitude ) == false) {
			$params = array_merge ( $params, array ("longitude" => $longitude ) );
		}
		
		if (is_null ( $keywords ) == false && empty ( $keywords ) == false) {
			$params = array_merge ( $params, array ("keywords" => $keywords ) );
		}
		
		// if (count ( $params ) < 2) {
		//
		// $message = new NarrooException();
		// $message->error = "Minimum of one search criteria needs to be passed
		// across all possible criteria." ;
		//
		// return $message;
		// }
		
		return $this->getResponse ( $this->getXmlApi(), 'searchMedia', $params );
	}
	
	function downloadImage($operator_id, $image_id) {
		return $this->getResponse ( $this->getXmlApi(), 'downloadImage', array ("operator_id" => $operator_id, "image_id" => $image_id ) );
	}
	
	function downloadVideo($operator_id, $video_id) {
		return $this->getResponse ( $this->getXmlApi(), 'downloadVideo', array ("operator_id" => $operator_id, "video_id" => $video_id ) );
	}
	
	function downloadBrochure($operator_id, $brochure_id) {
		return $this->getResponse ( $this->getXmlApi(), 'downloadBrochure', array ("operator_id" => $operator_id, "brochure_id" => $brochure_id ) );
	}
	
	function getProductText($operator_id) {
		return $this->getResponse ( $this->getXmlApi(), 'getProductText', array ("operator_id" => $operator_id ) );
	}
	
	function getProductTextWords($operator_id, $product_title) {
		return $this->getResponse ( $this->getXmlApi(), 'getProductTextWords', array ("operator_id" => $operator_id, "product_title" => $product_title ) );
	}

}

?>
