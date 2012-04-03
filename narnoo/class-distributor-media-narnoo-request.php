<?php

// require_once ('narnoo/class-narnoo-request.php');

class DistributorMediaNarnooRequest extends NarnooRequest {
	
	 var $remote_url = "devapi.narnoo.com/dist_xml.php";//Distributor ->
	// Operator Interaction
	//var $remote_url = "devapi.narnoo.com/xml.php"; // Distributor -> Operator
	                                               // Interaction
	/*
	 * Distributor's Own Media Requests
	 */
	

	function getImages() {
		return $this->getResponse ( $this->remote_url, 'getImages' );
	}
	
	/**
	 * get your all albums
	 *
	 * @return array
	 */
	function getAlbums($operator_id) {
		return $this->getResponse ( $this->remote_url, 'getAlbums', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get images of an album
	 *
	 * @param $album_id string       	
	 * @return array
	 */
	function getAlbumImages($operator_id, $album_name) {
		return $this->getResponse ( $this->remote_url, 'getAlbumImages', array ('operator_id' => $operator_id, 'album__name' => $album_name ) );
	}
	
	/**
	 * get your all videos information
	 *
	 * @return array
	 */
	function getVideos($operator_id) {
		return $this->getResponse ( $this->remote_url, 'getVideos', array ('operator_id' => $operator_id ) );
	}
	
	/**
	 * get detail information of the video
	 *
	 * @param $video_id string       	
	 * @return object
	 */
	function getVideoDetails($operator_id, $video_id) {
		return $this->getResponse ( $this->remote_url, 'getVideoDetails', array ('operator_id' => $operator_id, 'video__id' => $video_id ) );
	}
	
	/**
	 * get your all brochures
	 *
	 * @return array
	 */
	function getBrochures($operator_id) {
		return $this->getResponse ( $this->remote_url, 'getBrochures', array ('operator_id' => $operator_id ) );
	}
	
	function getSingleBrochure($operator_id, $brochure_id) {
		return $this->getResponse ( $this->remote_url, 'getSingleBrochure', array ('operator_id' => $operator_id, 'brochure__id' => $brochure_id ) );
	}
	
	// TODO:Not test yet.
	function getChannel() {
	
	}
	
	// TODO:Not test yet.
	function getChannelVideos($channel_name) {
	
	}
	
	/*
	 * Distributor's Own Media Download Requst
	 */
	function searchMedia($media_type, $category, $subcategory, $suburb, $location, $latitude, $longitude, $keywords) {
		$params = array ();
		
		if (is_null ( $media_type ) || empty ( $media_type )) {
			$media_type = "image";
		}
		
		$params = array_merge ( $params, array ("media_type" => $media_type ) );
		
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
		// $message->Error = "Minimum of one search criteria needs to be passed
		// across all possible criteria." ;
		//
		// return $message;
		// }
		
		return $this->getResponse ( $this->remote_url, 'searchMedia', $params );
	}
	
	function downloadImage($operator_id,$image_id) {
		return $this->getResponse ( $this->remote_url, 'downloadImage', array ("operator_id"=>$operator_id,"media_id" => $image_id ) );
	}
	
	function downloadVideo($operator_id,$video_id) {
		return $this->getResponse ( $this->remote_url, 'downloadVideo', array ("operator_id"=>$operator_id,"video__id" => $video_id ) );
	}
	
	function downloadBrochure($operator_id,$brochure_id) {
		return $this->getResponse ( $this->remote_url, 'downloadBrochure', array ("operator_id"=>$operator_id,"brochure__id" => $brochure_id ) );
	}
}

?>